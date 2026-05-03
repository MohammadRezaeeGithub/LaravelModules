<?php

namespace App\Modules\AccessControl\Traits;

use App\Modules\AccessControl\Models\Role;
use App\Modules\AccessControl\Services\RoleManager;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * @mixin \Illuminate\Database\Eloquent\Model
 */
trait HasRoles
{
    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Role::class);
    }

    public function hasRole(string $role): bool
    {
        $this->loadMissing('roles');

        return $this->roles
            ->pluck('name')
            ->contains($role);
    }

    public function giveRolesTo(...$roles)
    {
        return app(RoleManager::class)
            ->giveRoles($this, ...$roles);
    }

    public function syncRoles(...$roles)
    {
        return app(RoleManager::class)
            ->syncRoles($this, ...$roles);
    }

    public function revokeRoles(...$roles)
    {
        return app(RoleManager::class)
            ->revokeRoles($this, ...$roles);
    }
}
