<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Feature;

class FeatureController extends Controller
{
	public function index(Request $request)
	{
		return view('feature.index');
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
}
