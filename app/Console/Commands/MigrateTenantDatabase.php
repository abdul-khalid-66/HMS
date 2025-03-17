<?php

namespace App\Console\Commands;


use Illuminate\Console\Command;
use App\Models\Tenant;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;

class MigrateTenantDatabase extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tenants:migrate {tenant?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Run migrations for tenant databases';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $tenantId = $this->argument('tenant');

        if ($tenantId) {
            // Single tenant ke liye migrate karo
            $tenant = Tenant::find($tenantId);
            if ($tenant) {
                $this->migrateTenant($tenant);
            } else {
                $this->error("Tenant not found!");
            }
        } else {
            // Sabhi tenants ke liye migrate karo
            $tenants = Tenant::all();
            foreach ($tenants as $tenant) {
                $this->migrateTenant($tenant);
            }
        }
    }

    protected function migrateTenant($tenant)
    {
        $this->info("Migrating for tenant: {$tenant->name}");

        // Tenant database connection set karo
        Config::set('database.connections.tenant.database', $tenant->database_name);
        DB::purge('tenant');
        DB::reconnect('tenant');

        // Migrations run karo
        $this->call('migrate', [
            '--database' => 'tenant',
            '--path' => 'database/migrations/tenant',
        ]);
    }
}
