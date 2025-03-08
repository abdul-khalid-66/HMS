<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Create Super Admin
        $superAdmin = User::create([
            'name' => 'Super Admin',
            'email' => 'superadmin@school.com',
            'password' => bcrypt('password'),
        ]);
        $superAdminRole = Role::create(['name' => 'super-admin']);
        $superAdmin->assignRole($superAdminRole);

        // Create Admin
        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@school.com',
            'password' => bcrypt('password'),
        ]);
        $adminRole = Role::create(['name' => 'admin']);
        $admin->assignRole($adminRole);

        // Create Teacher
        $teacher = User::create([
            'name' => 'Teacher',
            'email' => 'teacher@school.com',
            'password' => bcrypt('password'),
        ]);
        $teacherRole = Role::create(['name' => 'teacher']);
        $teacher->assignRole($teacherRole);

        // Create Student
        $student = User::create([
            'name' => 'Student',
            'email' => 'student@school.com',
            'password' => bcrypt('password'),
        ]);
        $studentRole = Role::create(['name' => 'student']);
        $student->assignRole($studentRole);
    }
}
