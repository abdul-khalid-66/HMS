<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ClassModel extends Model
{
    use SoftDeletes;
    protected $table = 'classes';
    protected $fillable = ['class_name', 'section'];

    // Relationships
    public function timetables()
    {
        return $this->hasMany(Timetable::class, 'class_id');
    }
}
