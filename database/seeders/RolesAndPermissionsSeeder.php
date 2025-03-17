<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{

    public function run(): void
    {
        $superAdmin = Role::create(['name' => 'super-admin']);
        $admin = Role::create(['name' => 'admin']);
        $teacher = Role::create(['name' => 'teacher']);
        $student = Role::create(['name' => 'student']);

        // Create Permissions
        Permission::create(['name' => 'view-student']);
        Permission::create(['name' => 'edit-student']);
        Permission::create(['name' => 'delete-student']);

        // Create Role-Specific Permissions
        Permission::create(['name' => 'admin']);
        Permission::create(['name' => 'teacher']);
        Permission::create(['name' => 'student']);

        // Assign Permissions to Roles
        $superAdmin->givePermissionTo(Permission::all()); // Super Admin has all permissions
        $admin->givePermissionTo(['admin', 'view-student', 'edit-student', 'delete-student']);
        $teacher->givePermissionTo(['teacher', 'view-student', 'edit-student']);
        $student->givePermissionTo(['student', 'view-student']);
    }
}
