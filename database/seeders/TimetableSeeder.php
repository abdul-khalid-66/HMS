<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Timetable;
use App\Models\ClassModel;
use App\Models\Subject;
use App\Models\User;

class TimetableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */


    public function run()
    {
        $class = ClassModel::first();
        $subject = Subject::first();
        $teacher = User::where('email', 'teacher@school.com')->first();
        Timetable::create([
            'class_id' => $class->id,
            'subject_id' => $subject->id,
            'teacher_id' => $teacher->id,
            'day' => 'Monday',
            'start_time' => '09:00:00',
            'end_time' => '10:00:00',
        ]);
    }
}
