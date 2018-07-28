<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use App\User;
use App\Role;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $list = User::paginate(10);

        return view('user.index',['lists'=> $list]);
    }

    public function add(Request $request)
    {

        if ($request->isMethod('post')) 
        {
            $data = $request->all();
            $resId = User::insertGetId([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => bcrypt($data['password']),
            ]);

            if ($resId == false)
            {
                return error(44001,'添加失败');
            }
            $user = User::find($resId);
           
            $rs = $user->roles()->attach($data['role']);
            return success('','添加成功');
        } else 
        {
            $roles = Role::get();
            return view('user.add',['roles'=>$roles]);
        }
    }
    public function changeStatus(Request $request)
    {
        $status = $request->get('status');
        $id     = $request->get('id');

        if (empty($id))
        {
            return error('44001','无ID参数');
        }

        $rs = User::where('id',$id)->update(['status'=>$status]);

        if ($rs === false)
        {
            return error('55001','修改失败');
        }
        return success($rs,'修改成功');
    }

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
            $time = date('Y-m-d H:i:s',time());
            $id   = Auth::id();
            User::where('id',$id)->update(['updated_at'=>$time]);
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

    /*
     * 获取权限
    */
    public function role($id, Request $request)
    {
        //用户权限
        $userRole = User::find($id)->roles()->get()->toArray();
        $urId     = array_column($userRole,'id');
        //所有权限
        $role = Role::get();

        foreach($role as $k => $v)
        {
            $role[$k]['checked'] = "-1";

            if (in_array($v['id'], $urId))
            {
                $role[$k]['checked'] = "1";
            }
        }
        return success($role);
    }

    /*
     *分配权限
    */
    public function assignRoles($id, Request $request)
    {
        $roleIds   = $request->post('roleId');
        $userModel = User::find($id);

        $userModel->roles()->detach();
        $rs        = $userModel->roles()->attach($roleIds);

        return success('ok','添加成功');
    } 
}