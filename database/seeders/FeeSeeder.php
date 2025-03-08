<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Fee;
use App\Models\User;


class FeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    // database/seeders/FeeSeeder.php
    public function run()
    {
        $student = User::where('email', 'student@school.com')->first();
        Fee::create([
            'student_id' => $student->id,
            'total_fees' => 10000,
            'paid_fees' => 8000,
            'due_fees' => 2000,
            'payment_date' => now(),
        ]);
    }
}
