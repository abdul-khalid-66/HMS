<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tenant extends Model
{
    protected $fillable = ['name', 'domain', 'database_name'];

    protected $connection = 'mysql';
    protected $table = 'tenants';


    public function users()
    {
        return $this->hasMany(User::class);
    }


    public function user()
    {
        return $this->hasOne(User::class);
    }
}
