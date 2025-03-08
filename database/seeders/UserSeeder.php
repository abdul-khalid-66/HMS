<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    public function run()
    {
        $superAdmin = User::create([
            'name' => 'Super Admin',
            'email' => 'superadmin@school.com',
            'password' => bcrypt('password'),
        ]);
        $superAdmin->assignRole('super-admin');

        // Create Admin
        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@school.com',
            'password' => bcrypt('password'),
        ]);
        $admin->assignRole('admin');

        // Create Teacher
        $teacher = User::create([
            'name' => 'Teacher',
            'email' => 'teacher@school.com',
            'password' => bcrypt('password'),
        ]);
        $teacher->assignRole('teacher');

        // Create Student
        $student = User::create([
            'name' => 'Student',
            'email' => 'student@school.com',
            'password' => bcrypt('password'),
        ]);
        $student->assignRole('student');
    }
}
