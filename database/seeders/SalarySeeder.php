<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Salary;
use App\Models\User;


class SalarySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    public function run()
    {
        $teacher = User::where('email', 'teacher@school.com')->first();
        Salary::create([
            'teacher_id' => $teacher->id,
            'amount' => 50000,
            'paid' => true,
            'payment_date' => now(),
        ]);
    }
}
