<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Feature;
use App\Model\Category;

class CategoryController extends Controller
{
	public function index(Request $request)
	{
		$list = Category::paginate(10);
		return view('category.index',['lists'=>$list]);
	}

	public function add(Request $request)
	{
		if ($request->isMethod('post'))
		{
			$data = $request->all();

			$list = [
				'name' => $data['name'],
				'feature_id' => $data['feature'],
				'parent_id'  => is_null($data['parent']) ? '' : $data['parent']
			];
			
			$rs = Category::create($list);

			if ($rs == false)
			{
				return error('44001','添加分类失败');
			}

			return success('','添加成功');

		} else 
		{
			$parentCate = Category::where('parent_id',0)->get();
			$feature = Feature::where('status',1)->get();
			return view('category.add',['features'=>$feature,'parentCate'=>$parentCate]);
		}
	}

	
}