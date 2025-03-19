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
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Create Roles
        $superAdmin = Role::create(['name' => 'super-admin']);
        $admin = Role::create(['name' => 'admin']);
        $teacher = Role::create(['name' => 'teacher']);
        $student = Role::create(['name' => 'student']);

        // Create Permissions
        $permissions = [
            // Admin Permissions
            'view-admin',
            'edit-admin',
            'delete-admin',

            // Student Permissions
            'view-student',
            'edit-student',
            'delete-student',

            // Teacher Permissions
            'view-teacher',
            'edit-teacher',
            'delete-teacher',

            // Attendance Permissions
            'view-attendance',
            'edit-attendance',
            'delete-attendance',

            // Class Permissions
            'view-class',
            'edit-class',
            'delete-class',

            // Fees Permissions
            'view-fees',
            'edit-fees',
            'delete-fees',

            // Salary Permissions
            'view-salarie',
            'edit-salarie',
            'delete-salarie',

            // Exam Permissions
            'view-exam',
            'edit-exam',
            'delete-exam',

            // Timetable Permissions
            'view-timetable',
            'edit-timetable',
            'delete-timetable',

            // Subject Permissions
            'view-subject',
            'edit-subject',
            'delete-subject',

            // Event Permissions
            'view-event',
            'edit-event',
            'delete-event',

            // Announcement Permissions
            'view-announcement',
            'edit-announcement',
            'delete-announcement',

            // Mail Permissions
            'view-mail',
            'edit-mail',
            'delete-mail',

            // Message Permissions
            'view-message',
            'edit-message',
            'delete-message',

            // Role-Specific Permissions
            'admin',
            'teacher',
            'student',
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        // Assign Permissions to Roles
        $superAdmin->givePermissionTo(Permission::all()); // Super Admin has all permissions

        $admin->givePermissionTo([
            'admin',
            'view-student',
            'edit-student',
            'delete-student',
            'view-teacher',
            'edit-teacher',
            'delete-teacher',
            'view-attendance',
            'edit-attendance',
            'delete-attendance',
            'view-class',
            'edit-class',
            'delete-class',
            'view-fees',
            'edit-fees',
            'delete-fees',
            'view-exam',
            'edit-exam',
            'delete-exam',
            'view-timetable',
            'edit-timetable',
            'delete-timetable',
            'view-subject',
            'edit-subject',
            'delete-subject',
            'view-event',
            'edit-event',
            'delete-event',
            'view-announcement',
            'edit-announcement',
            'delete-announcement',
            'view-mail',
            'edit-mail',
            'delete-mail',
            'view-message',
            'edit-message',
            'delete-message',
        ]);

        $teacher->givePermissionTo([
            'teacher',
            'view-student',
            'edit-student',
            'view-attendance',
            'edit-attendance',
            'view-class',
            'edit-class',
            'view-exam',
            'edit-exam',
            'view-timetable',
            'edit-timetable',
            'view-subject',
            'edit-subject',
            'view-event',
            'edit-event',
            'view-announcement',
            'edit-announcement',
            'view-mail',
            'edit-mail',
            'view-message',
            'edit-message',
        ]);

        $student->givePermissionTo([
            'student',
            'view-student',
            'view-attendance',
            'view-class',
            'view-exam',
            'view-timetable',
            'view-subject',
            'view-event',
            'view-announcement',
            'view-mail',
            'view-message',
        ]);
    }
}
