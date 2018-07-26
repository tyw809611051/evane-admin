<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use App\Role;
use App\User;

class RoleController extends Controller
{
    public function add(Request $request)
    {
        // $owner = new Role();
        // $owner->name = 'owner';
        // $owner->display_name = 'Project Owner';
        // $owner->desc = 'User is the owner of a given project';
        // $owner->save();

        // $admin = new Role();
        // $admin->name = 'admin';
        // $admin->display_name = 'User Administrator';
        // $admin->desc = 'User is allowed to manage and edit other users';
        // $admin->save();
        // 赋值权限
       $user =  User::where('name', '=', 'evane')->first();
       $rs = $user->roles()->attach(1);

    }

}