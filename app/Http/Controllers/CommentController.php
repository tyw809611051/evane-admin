<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Comment;

class CommentController extends Controller
{
	public function index(Request $request)
	{
		$list = Comment::with(['parent','article','member'])->paginate(10);

		return view('comment.index',['lists'=>$list]);
	}

    //
    public function add(Request $request)
    {
    	if ($request->isMethod('post')) 
    	{
    		$Comment = $request->all();
    		$list    = [];

    		$list    = [
    			'name' => $Comment['name'],
    			'desc' => $Comment['desc']
    		];
		    $model   = new Comment();
		    $rs      = $model->addAll($list);

		    if ($rs === false)
		    {
		    	return error('44001','添加失败');
		    }

		    return success(0,'添加成功');
		} else 
		{
			return view('Comment.add');
		}
    }

    public function delete($id,Request $request)
    {
    	$rs = Comment::where('id',$id)->delete();

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

    	$rs = Comment::where('id',$id)->update(['status'=>$status]);

    	if ($rs === false)
    	{
    		return error('55001','修改失败');
    	}
    	return success($rs,'修改成功');
    }

}
