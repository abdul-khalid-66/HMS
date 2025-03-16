<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Salary extends Model
{
    use SoftDeletes;
    protected $fillable = ['teacher_id', 'amount', 'paid', 'payment_date'];
    public function teacher()
    {
        return $this->belongsTo(User::class, 'teacher_id');
    }
}
