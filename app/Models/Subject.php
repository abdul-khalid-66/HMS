<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $fillable = ['name'];
    // Relationships
    public function exams()
    {
        return $this->hasMany(Exam::class, 'subject_id');
    }

    public function timetables()
    {
        return $this->hasMany(Timetable::class, 'subject_id');
    }
}
