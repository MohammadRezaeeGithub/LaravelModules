<?php

namespace App\Modules\AccessControl\Models;

use App\Modules\AccessControl\Database\Factories\PermissionFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    protected static function newFactory(){
        return PermissionFactory::new();
    }

    public function roles()
     {
        return $this->belongsToMany(Role::class);
     }
}
