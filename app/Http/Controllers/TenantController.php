<?php

namespace App\Http\Controllers;

use App\Models\Tenant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Log;

class TenantController extends Controller
{
    public function create()
    {
        return view('tenant_form');
    }
    // TenantController.php
    public function store(Request $request)
    {

        set_time_limit(300);
        $request->validate([
            'fullname'      => 'required|string|max:255',
            'schoolname'    => 'required|string|max:255',
            'domain'        => 'required|string|unique:tenants,domain',
            'email'         => 'required|email|max:255|unique:users,email',
            'password'      => 'required|string|min:8|confirmed',
        ]);

        // Create the tenant in the default database
        $tenant = Tenant::create([
            'name' => $request->schoolname,
            'domain' => $request->domain,
            'database_name' => 'tenant_' . Str::slug($request->schoolname, '_') . "_" . rand(1, 10), // Ensure unique database name
        ]);

        $user = $tenant->user()->create([
            'name' => $request->fullname,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $user->assignRole(Role::findByName('admin'));

        DB::statement("CREATE DATABASE {$tenant->database_name}");

        Artisan::call('tenants:migrate', [
            'tenant' => $tenant->id,
        ]);

        $this->seedRolesIntoTenantDatabase($tenant); // rols and permission seed

        $this->createUserInTenantDatabase($tenant, $request); // school admin data

        return redirect()->route('enrollment.create')->with('success', 'School created successfully!');
    }

    // rols and permission seed
    protected function seedRolesIntoTenantDatabase($tenant)
    {
        // Set the tenant database connection
        Config::set('database.connections.tenant.database', $tenant->database_name);
        DB::purge('tenant');
        DB::reconnect('tenant');

        // Run the RolesAndPermissionsSeeder
        Artisan::call('db:seed', [
            '--class' => 'RolesAndPermissionsSeeder',
            '--database' => 'tenant',
        ]);
    }

    // school admin data
    protected function createUserInTenantDatabase($tenant, $request)
    {
        // Set the tenant database connection
        Config::set('database.connections.tenant.database', $tenant->database_name);
        DB::purge('tenant');
        DB::reconnect('tenant');

        // Create the user in the tenant database
        DB::connection('tenant')->table('users')->insert([
            'name' => $request->fullname,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Assign the 'admin' role in the tenant database
        $user = DB::connection('tenant')->table('users')->where('email', $request->email)->first();
        DB::connection('tenant')->table('model_has_roles')->insert([
            'role_id' => Role::findByName('admin')->id,
            'model_type' => 'App\Models\User',
            'model_id' => $user->id,
        ]);
    }


    public function allTenants()
    {
        // $tenants = DB::connection('mysql')->table('tenants')->get();
        $tenants = DB::connection('mysql')->table('tenants')->paginate(10);
        foreach ($tenants as $tenant) {
            try {
                DB::purge('tenant');
                Config::set('database.connections.tenant.database', $tenant->database_name);
                DB::reconnect('tenant');
                $tenant->user_count = DB::connection('tenant')->table('users')->count();
            } catch (\Exception $e) {
                // Log error if database is missing or connection fails
                Log::error("Database connection failed for {$tenant->database_name}: " . $e->getMessage());
                $tenant->user_count = "No database";
            }
        }
        return view('backend.setting.all_tenants', compact('tenants'));
    }
}
