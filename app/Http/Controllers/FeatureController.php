<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Feature;
use Illuminate\Support\Facades\Log;
use App\Library\Dingding;

class FeatureController extends Controller
{
	public function index(Request $request)
	{
		$list = Feature::paginate(10);
//        $ding = new Dingding();
//        $ding->sendText('【询价单将到期提醒】');
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
		    // $model   = new Feature();
		    $rs      = Feature::create($list);

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

    public function edit($id,Request $request)
    {
    	if ($request->isMethod('post')) 
    	{
    		$feature = $request->all();
    		$list    = [];

    		$list    = [
    			'name' => $feature['name'],
    			'desc' => $feature['desc'],
    			'status' => $feature['status'],
    			'sort'   => $feature['sort']
    		];
    		
    		$model = Feature::find($id);
             $rs   =  $model->update($list);

    		if ($rs == false)
    		{
    			return error('55001','更新失败');
    		}
    		return success($id,'更新成功');
    	} else 
    	{
    		$data = Feature::where('id',$id)->first();

    		return view('feature.edit',['data'=>$data]);
    	}
    
    }

    public function delete($id,Request $request)
    {
    	$rs = Feature::where('id',$id)->delete();

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

    	$rs = Feature::where('id',$id)->update(['status'=>$status]);

    	if ($rs === false)
    	{
    		return error('55001','修改失败');
    	}
    	return success($rs,'修改成功');
    }

    public function get(Request $request)
    {
        $data['status'] = $request->get('status',0);
        $list = Feature::when($data['status'],function($query) use($data){
            return $query->where('status',$data['status']);
        })
        ->get();

        return success($list);
    }
}
