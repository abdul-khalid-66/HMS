<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Attendance;
use App\Models\User;

class AttendanceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    public function run()
    {
        $student = User::where('email', 'student@school.com')->first();
        Attendance::create([
            'student_id' => $student->id,
            'date' => now(),
            'status' => 'present',
        ]);
    }
}
