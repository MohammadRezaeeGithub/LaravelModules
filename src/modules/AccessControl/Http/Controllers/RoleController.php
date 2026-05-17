<?php

namespace App\Modules\AccessControl\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\AccessControl\Models\Permission;
use App\Modules\AccessControl\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index(){

    $roles = Role::all();
        return view('AccessControl::rolelist',compact('roles'));
    }

    public function store(Request $request){
        $this->validateForm($request);


        Role::create($request->only('name'));

        return redirect()->route('roles.index');
    }

    protected function validateForm($request){
        return $request->validate([
            'name'=>['required']
        ]);
    }

    public function edit(Role $role){

        $permissions = Permission::all();

        $role->load('permissions');

        return view('AccessControl::editrole',compact('permissions','role'));
    }

    public function update(Request $request,Role $role){

            $role->update($request->only('name'));

            $role->syncPermissions($request->permissions);

            return redirect()->route('roles.index');
    }
}
