<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class UserController extends Controller
{
    
    public function login(Request $request)
    {
        if ($request->isMethod('post'))
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
            $authRes = Auth::guard('web')->attempt($validData);
            if (!$authRes)
            {
                return redirect('login');
            }
            return redirect('/');
        } else 
        {
            return view('auth.login');
        }

    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('login');
    }
}