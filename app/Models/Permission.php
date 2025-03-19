<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasPermissions;

class Permission extends Model
{
    use HasPermissions;
}
