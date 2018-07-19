<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Feature;

class FeatureController extends Controller
{
	public function index(Request $request)
	{
		$list = Feature::paginate(2);
// var_dump($list->lastPage());die;
		return view('feature.index',['lists'=>$list]);
	}

    //
    public function add(Request $request)
    {
    	if ($request->isMethod('post')) 
    	{
    		$feature = $request->all();
    		$list    = [];

    		$list    = [
    			'name' => $feature['name'],
    			'desc' => $feature['desc']
    		];
		    $model   = new Feature();
		    $rs      = $model->addAll($list);

		    if ($rs === false)
		    {
		    	return error('44001','添加失败');
		    }

		    return success(0,'添加成功');
		} else 
		{
			return view('feature.add');
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

    	$rs = Feature::where('id',$id)->update(['status'=>$status]);

    	if ($rs === false)
    	{
    		return error('55001','修改失败');
    	}
    	return success($rs,'修改成功');
    }
}
