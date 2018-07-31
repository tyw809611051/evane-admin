<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Message;

class MessageController extends Controller
{
	public function index(Request $request)
	{
		$list = Message::with(['users'])->paginate(10);

		return view('message.index',['lists'=>$list]);
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

}
