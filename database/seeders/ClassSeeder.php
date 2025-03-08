<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ClassModel;

class ClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */


    public function run()
    {
        ClassModel::create(['class_name' => 'Class 10', 'section' => 'A']);
        ClassModel::create(['class_name' => 'Class 10', 'section' => 'B']);
        ClassModel::create(['class_name' => 'Class 12', 'section' => 'A']);
    }
}
