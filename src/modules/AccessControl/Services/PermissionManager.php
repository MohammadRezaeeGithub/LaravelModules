<?php

namespace App\Modules\AccessControl\Services;

use App\Modules\AccessControl\Models\Permission;
use Illuminate\Support\Arr;

class PermissionManager
{
    public function givePermissions($model, ...$permissions)
    {
        $permissions = $this->resolvePermissions($permissions);

        $model->permissions()->syncWithoutDetaching($permissions);

        app(PermissionChecker::class)->forgetCache($model);

        return $model;
    }

    public function syncPermissions($model, ...$permissions)
    {
        $permissions = $this->resolvePermissions($permissions);

        $model->permissions()->sync($permissions);

        app(PermissionChecker::class)->forgetCache($model);

        return $model;
    }

    public function revokePermissions($model, ...$permissions)
    {
        $permissions = $this->resolvePermissions($permissions);

        $model->permissions()->detach($permissions);

        app(PermissionChecker::class)->forgetCache($model);

        return $model;
    }

    protected function resolvePermissions(array $permissions)
    {
        $names = Arr::flatten($permissions);

        return Permission::whereIn('name', $names)->pluck('id');
    }
}
