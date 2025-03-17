<?php

namespace App\Http\Controllers;

use App\Models\Tenant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class TenantController extends Controller
{
    public function create()
    {
        return view('tenant_form');
    }
    // TenantController.php
    public function store(Request $request)
    {
        $request->validate([
            'fullname'      => 'required|string|max:255',
            'schoolname'    => 'required|string|max:255',
            'domain'        => 'required|string|unique:tenants,domain',
            'email'         => 'required|email|max:255|unique:users,email',
            'password'      => 'required|string|min:8|confirmed',
        ]);


        $tenant = Tenant::create([
            'name' => $request->schoolname,
            'domain' => $request->domain,
            'database_name' => $request->domain,
        ]);

        $tenant->user()->create([
            'name' => $request->fullname,
            'name' => $request->email,
            'name' =>  Hash::make($request->password),

        ]);
        DB::statement("CREATE DATABASE {$tenant->database_name}");

        Artisan::call('tenants:migrate', [
            'tenant' => $tenant->id, // Pass the tenant ID to the command
        ]);

        // Redirect back with success message
        return redirect()->route('tenants.create')->with('success', 'School created successfully!');
    }
}
