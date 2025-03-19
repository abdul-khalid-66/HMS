<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use App\Models\Tenant;
use Spatie\Permission\Models\Role;

class ProcessTenantSetup implements ShouldQueue
{
    use InteractsWithQueue, Queueable, SerializesModels;
    protected $tenant;
    /**
     * Create a new job instance.
     */
    public function __construct(Tenant $tenant)
    {
        $this->tenant = $tenant;
    }


    /**
     * Execute the job.
     */
    public function handle(): void
    {
        // Set the tenant database connection
        Config::set('database.connections.tenant.database', $this->tenant->database_name);
        DB::purge('tenant');
        DB::reconnect('tenant');

        Artisan::call('tenants:migrate', [
            'tenant' => $this->tenant->id,
        ]);
        // Seed roles and permissions
        Artisan::call('db:seed', [
            '--class' => 'RolesAndPermissionsSeeder',
            '--database' => 'tenant',
        ]);

        // Create the admin user in the tenant database
        DB::connection('tenant')->table('users')->insert([
            'name' => $this->tenant->user->name,
            'email' => $this->tenant->user->email,
            'password' => $this->tenant->user->password,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Assign the 'admin' role
        $user = DB::connection('tenant')->table('users')->where('email', $this->tenant->user->email)->first();
        DB::connection('tenant')->table('model_has_roles')->insert([
            'role_id' => Role::findByName('admin')->id,
            'model_type' => 'App\Models\User',
            'model_id' => $user->id,
        ]);
    }
}
