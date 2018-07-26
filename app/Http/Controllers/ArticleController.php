<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Category;
use App\Model\Feature;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
	public function index(Request $request)
	{
		return view('article.index');
	}
    //
    public function add(Request $request)
    {
        if ($request->isMethod('post'))
		{
			$data = $request->all();return error('',$request->all());

			$file = $request->file('picture');
			// if ($file->isValid())
			// {
			// 	//获取文件扩展名
			// 	$ext = $file->getClientOriginalExtension();
			// 	//获取文件绝对路径
			// 	$originPath = md5_file($file->getRealPath());

			// 	//定义文件名
			// 	$fileName   = $originPath. '.' . $ext;
			// 	$file->storeAs('banner',$fileName,'public');

			// }
			var_dump($data);
		} else 
		{
			$feature = Feature::with('category')->get();
			return view('article.add',['features'=>$feature]);
		}
    }
}
