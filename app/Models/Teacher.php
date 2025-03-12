<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Teacher extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'phone',
        'address',
        'profile',
        'department',
        'gender',
        'date_of_birth',
        'postcode',
        'description',
        'state',
        'city',
        'website',
        'facebook_url',
        'twitter_url',
        'linkedin_url',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
