<?php

namespace App\Modules\AccessControl\Services;

use App\Modules\AccessControl\Models\Role;
use Illuminate\Support\Arr;
use App\Modules\AccessControl\Services\PermissionChecker;

class RoleManager
{
    public function giveRoles($model, ...$roles)
    {
        $roleIds = $this->resolveRoles($roles);

        if ($roleIds->isEmpty()) {
            return $model;
        }

        $model->roles()->syncWithoutDetaching($roleIds);

        app(PermissionChecker::class)->forgetCache($model);

        return $model;
    }

    public function syncRoles($model, ...$roles)
    {

        $roleIds = $this->resolveRoles($roles);

        $model->roles()->sync($roleIds);

        app(PermissionChecker::class)->forgetCache($model);

        return $model;
    }

    public function revokeRoles($model, ...$roles)
    {
        $roleIds = $this->resolveRoles($roles);

        if ($roleIds->isEmpty()) {
            return $model;
        }

        $model->roles()->detach($roleIds);

        app(PermissionChecker::class)->forgetCache($model);

        return $model;
    }

    protected function resolveRoles(array $roles)
    {
        $names = Arr::flatten($roles);

        return Role::whereIn('name', $names)->pluck('id');
    }
}
