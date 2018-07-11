<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class UserController extends Controller
{

    public function test()
    {
        return success('ok');
    }
    public function login(Request $request)
    {
        $username = $request->post('email');
        $password = $request->post('password');

        if(!$username){
            return error(100,'请输入账号');
        }
        if(!$password){
            return error(100,'请输入密码');
        }

        $validData = ['email' => $username, 'password' => $password];
        $authRes = Auth::attempt($validData);

        $user = Auth::user();
        if (!$user) {
            return error(1, '用户不存在或密码不正确');
        }
        
        $exp = time() + (60 * 60 * 24 * 7);
        $tokenData = [
            'uid'  => $user->id,
            'exp'  => $exp,
        ];

        // $roles=[];
        // foreach ($user->roles as $role){
        //     $roles[]=$role->name;
        // }

        $apiToken = Crypt::encrypt(json_encode($tokenData));

        if ($authRes) {
            // 认证通过...
            return success([
                'token'   => $apiToken,
                'roles'   => $roles,
                'uid'     => $user->id,
                'name'    => $user->name,
                'exp' => $exp
            ]);
        }

        return error(1, '密码不正确');
    }
}