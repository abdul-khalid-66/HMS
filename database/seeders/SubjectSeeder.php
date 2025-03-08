<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Subject;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    // database/seeders/SubjectSeeder.php

    public function run()
    {
        Subject::create(['name' => 'Maths']);
        Subject::create(['name' => 'Science']);
        Subject::create(['name' => 'English']);
    }
}
