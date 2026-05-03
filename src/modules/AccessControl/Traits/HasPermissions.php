<?php

namespace App\Modules\AccessControl\Traits;

use App\Modules\AccessControl\Models\Permission;
use App\Modules\AccessControl\Services\PermissionChecker;
use App\Modules\AccessControl\Services\PermissionManager;

/**
 * @mixin \Illuminate\Database\Eloquent\Model
 */
trait HasPermissions
{
    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }

    public function hasPermission(string $permission): bool
    {
        return app(PermissionChecker::class)
            ->hasPermission($this, $permission);
    }

    public function givePermissionsTo(...$permissions)
    {
        return app(PermissionManager::class)
            ->givePermissions($this, ...$permissions);
    }

    public function syncPermissions(...$permissions)
    {
        return app(PermissionManager::class)
            ->syncPermissions($this, ...$permissions);
    }

    public function revokePermissions(...$permissions)
    {
        return app(PermissionManager::class)
            ->revokePermissions($this, ...$permissions);
    }
}
