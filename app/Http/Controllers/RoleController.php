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

    public function index(Request $request)
    {
        $list = Role::paginate(10);
        return view('role.index',['lists'=> $list]);
    }
    public function add(Request $request)
    {
        if ($request->isMethod('post')) 
        {
            $data = $request->all();

            $list = [
                'name' => $data['name'],
                'display_name' => $data['display'],
                'desc'   => $data['desc']
            ];

            $rs = Role::create($list);
            if ($rs == false)
            {
                return error(44001,'添加失败');
            }

            return success('','添加成功');
        } else 
        {
            return view('role.add');
        }
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
       // $user =  User::where('name', '=', 'evane')->first();
       // $rs = $user->roles()->attach(1);

    }

    public function edit($id,Request $request)
    {
        if ($request->isMethod('post')) 
        {
            $role    = $request->all();
            $list    = [];

            $list    = [
                'name' => $role['name'],
                'display_name' => $role['display'],
                'desc' => $role['desc'],
                'status' => $role['status']
            ];
            $rs = Role::where('id',$id)->update($list);

            if ($rs === false)
            {
                return error('55001','更新失败');
            }
            return success($id,'更新成功');
        } else 
        {
            $data = Role::where('id',$id)->first();

            return view('role.edit',['data'=>$data]);
        }
    
    }

    public function delete($id,Request $request)
    {
        $rs = Role::where('id',$id)->delete();

        if ($rs === false)
        {
            return error('44002','删除失败');
        }

        return success('','删除成功');
    }

    public function changeStatus(Request $request)
    {
        $status = $request->get('status');
        $id     = $request->get('id');

        if (empty($id))
        {
            return error('44001','无ID参数');
        }

        $rs = Role::where('id',$id)->update(['status'=>$status]);

        if ($rs === false)
        {
            return error('55001','修改失败');
        }
        return success($rs,'修改成功');
    }
}