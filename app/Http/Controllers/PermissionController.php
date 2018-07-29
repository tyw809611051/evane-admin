<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Auth;
use App\Permission;
use App\Role;

class PermissionController extends Controller
{

	public function index(Request $request)
	{
		$list = Permission::paginate(10);
		return view('permission.index',['lists'=> $list]);
	}

	public function add(Request $request)
	{
		if ($request->isMethod('post')) 
        {
    		$permission = $request->all();
    		$list    = [];

    		$list    = [
    			'name' => $permission['name'],
    			'display_name' => $permission['display'],
    			'desc' => $permission['desc']
    		];
	
		    $rs      = Permission::create($list);

		    if ($rs === false)
		    {
		    	return error('44001','添加失败');
		    }

		    return success(0,'添加成功');
        } else 
        {
        	return view('permission.add');
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

        $rs = Permission::where('id',$id)->update(['status'=>$status]);

        if ($rs === false)
        {
            return error('55001','修改失败');
        }
        return success($rs,'修改成功');
    }
}