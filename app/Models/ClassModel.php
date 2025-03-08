<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClassModel extends Model
{
    protected $table = 'classes';
    protected $fillable = ['class_name', 'section'];

    // Relationships
    public function timetables()
    {
        return $this->hasMany(Timetable::class, 'class_id');
    }
}
