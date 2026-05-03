<?php

namespace App\Modules\AccessControl\Services;

use Illuminate\Support\Facades\Cache;

class PermissionChecker
{
    public function hasPermission($user, string $permission): bool
    {
        $permissions = $this->getUserPermissions($user);

        return in_array($permission, $permissions);
    }

    protected function getUserPermissions($user)
    {
        return Cache::remember(
            "user_permissions_{$user->id}",
            60,
            function () use ($user) {
                $user->loadMissing('permissions', 'roles.permissions');

                $direct = $user->permissions->pluck('name');

                $viaRoles = $user->roles
                    ->flatMap(fn ($role) => $role->permissions)
                    ->pluck('name');

                return $direct->merge($viaRoles)->unique()->values()->toArray();
            }
        );
    }

    public function forgetCache($user): void
    {
        Cache::forget("user_permissions_{$user->id}");
    }
}
