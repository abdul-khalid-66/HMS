<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Salary extends Model
{
    protected $fillable = ['teacher_id', 'amount', 'paid', 'payment_date'];
    public function teacher()
    {
        return $this->belongsTo(User::class, 'teacher_id');
    }
}
