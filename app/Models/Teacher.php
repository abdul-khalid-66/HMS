<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Teacher extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'fullname',
        'email',
        'phone',
        'address',
        'date_of_birth',
        'postcode',
        'department',
        'gender',
        'state',
        'city',
        'password',
        'website',
        'facebook_url',
        'twitter_url',
        'linkedin_url',
        'description',
        'subject',
        'education',
        'profile',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }


    protected function casts(): array
    {
        return [
            'subject'   => 'array',  // Cast 'subject' to array
            'education' => 'array', // Cast 'education' to array
        ];
    }
}
