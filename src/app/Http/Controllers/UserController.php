<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Modules\AccessControl\Models\Permission;
use App\Modules\AccessControl\Models\Role;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){

        $users = User::with('roles')->get();

        return view('AccessControl::userlist', compact('users'));
    }

    public function edit(User $user){

        $roles = Role::all();
        $permissions = Permission::all();

        return view('AccessControl::useredit', compact('user','roles','permissions'));

    }

    public function update(Request $request, User $user){

        $user->syncRoles($request->roles)->roles();
        $user->syncPermissions($request->permissions);

       return redirect()->route('users.index');
    }
}
