<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fee extends Model
{
    protected $fillable = ['student_id', 'total_fees', 'paid_fees', 'due_fees', 'payment_date'];
}
