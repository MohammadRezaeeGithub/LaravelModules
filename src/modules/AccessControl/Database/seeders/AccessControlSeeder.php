<?php

namespace App\Modules\AccessControl\Database\seeders;


use Illuminate\Database\Seeder;
use App\Modules\AccessControl\Models\Role;
use App\Modules\AccessControl\Models\Permission;
use App\Models\User;

class AccessControlSeeder extends Seeder
{
    public function run(): void
    {

        $permissions = collect([
            'view_dashboard',
            'create_post',
            'edit_post',
            'delete_post',
        ])->map(fn ($name) =>
            Permission::factory()->predefined($name)->create()
        );


        $admin  = Role::factory()->predefined('admin')->create();
        $editor = Role::factory()->predefined('editor')->create();
        $user   = Role::factory()->predefined('user')->create();


        $admin->permissions()->sync($permissions->pluck('id'));

        $editor->permissions()->sync(
            $permissions->whereIn('name', ['create_post', 'edit_post'])->pluck('id')
        );

        $user->permissions()->sync(
            $permissions->where('name', 'view_dashboard')->pluck('id')
        );
    }
}
