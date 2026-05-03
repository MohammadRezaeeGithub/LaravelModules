<?php

namespace App\Http\Controllers;

use App\Modules\AccessControl\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index(){

    $roles = Role::all();
        return view('AccessControl.rolelist',compact('roles'));
    }
}
