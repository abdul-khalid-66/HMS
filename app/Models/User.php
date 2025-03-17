<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, HasRoles, Notifiable;
    use SoftDeletes;
    protected $connection = 'mysql';
    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'first_name',
        'name',
        'last_name',
        'email',
        'password',
        'tenant_id'
    ];

    public function tenant()
    {
        return $this->belongsTo(Tenant::class);
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }



    public function attendances()
    {
        return $this->hasMany(Attendance::class, 'student_id');
    }

    public function fees()
    {
        return $this->hasMany(Fee::class, 'student_id');
    }

    public function exams()
    {
        return $this->hasMany(Exam::class, 'student_id');
    }

    public function salaries()
    {
        return $this->hasMany(Salary::class, 'teacher_id');
    }

    public function timetables()
    {
        return $this->hasMany(Timetable::class, 'teacher_id');
    }

    public function teacher(): HasOne
    {
        return $this->hasOne(Teacher::class);
    }
}
