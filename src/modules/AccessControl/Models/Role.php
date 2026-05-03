<?php

namespace App\Modules\AccessControl\Models;

use App\Modules\AccessControl\Database\Factories\RoleFactory;
use App\Modules\AccessControl\Traits\HasPermissions;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Override;

class Role extends Model
{
    use HasPermissions,HasFactory;

    protected static function newFactory(){
        return RoleFactory::new();
    }

    protected $fillable = ['name'];

}
