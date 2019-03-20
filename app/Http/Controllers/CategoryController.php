<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Feature;
use App\Model\Category;

class CategoryController extends Controller
{
	public function index(Request $request)
	{echo bcrypt(123456);die;
		$feature = $request->get('feature','');
		$list    = Category::when($feature,function($query) use($feature) {
			return $query->where('feature_id',$feature);
		})->paginate(10);
		$featureList = Feature::where('status',1)->get();

		return view('category.index',['lists'=>$list,'features'=>$featureList])->with('fId',$feature);
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

	public function edit($id,Request $request)
    {
    	if ($request->isMethod('post')) 
    	{
    		$category = $request->all();
    		
    		$list    = [];

    		$list    = [
    			'name' 		 => $category['name'],
    			'feature_id' => $category['feature'],
    			'parent_id'  => (int)$category['parent'],
    			'sort'   	 => $category['sort'],
    			'status' 	 => $category['status']
    		];
    		$rs = Category::where('id',$id)->update($list);

    		if ($rs === false)
    		{
    			return error('55001','更新失败');
    		}
    		return success($id,'更新成功');
    	} else 
    	{
    		$data = Category::where('id',$id)->first();
			$parentCate = Category::where('parent_id',0)->get();
			$feature = Feature::where('status',1)->get();
    		return view('category.edit',['data'=>$data,'parentCate'=>$parentCate,'features'=>$feature]);
    	}
    
    }

    public function delete($id,Request $request)
    {
    	$rs = Category::where('id',$id)->delete();

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

    	$rs = Category::where('id',$id)->update(['status'=>$status]);

    	if ($rs === false)
    	{
    		return error('55001','修改失败');
    	}
    	return success($rs,'修改成功');
    }
	
}