<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Tenant;

class TenantSeeder extends Seeder
{
    public function run()
    {
        Tenant::create([
            'name' => 'Default School',
            'domain' => 'default.yourschool.com',
            'database_name' => 'school_default',
        ]);
    }
}
