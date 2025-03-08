<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Exam;
use App\Models\User;
use App\Models\Subject;

class ExamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    public function run()
    {
        $student = User::where('email', 'student@school.com')->first();
        $subject = Subject::first();
        Exam::create([
            'student_id' => $student->id,
            'subject_id' => $subject->id,
            'marks' => 95,
        ]);
    }
}
