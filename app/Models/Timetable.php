<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Timetable extends Model
{
    protected $fillable = ['class_id', 'subject_id', 'teacher_id', 'day', 'start_time', 'end_time'];
}
