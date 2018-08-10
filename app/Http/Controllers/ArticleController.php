<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Category;
use App\Model\Feature;
use App\Model\Article;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
	public function index(Request $request)
	{
		$list = Article::with('users')->paginate(10);
		return view('article.index',['lists'=> $list]);
	}

    //
    public function add(Request $request)
    {
        if ($request->isMethod('post'))
		{
			$data = $request->all();
			$list = [];

			$list = [
				'title' => $data['title'],
				'content' => $data['content'],
				'excerpt' => empty($data['excerpt']) ? '' : $data['excerpt'],
				'users_id' => Auth::id(),
				'status'   => -1,
				'author'   => $data['author'],
				'category_id' => $data['category']
			];

			$file = $request->file('picture');
			if ($file->isValid())
			{
				//获取文件扩展名
				$ext = $file->getClientOriginalExtension();
				//获取文件绝对路径
				$originPath = md5_file($file->getRealPath());

				//定义文件名
				$fileName   = $originPath. '.' . $ext;
				$fileRes = $file->storeAs('banner',$fileName,'public');
				$list['picture'] = $fileRes;

			}
			$res = Article::create($list);
			if ($res == false)
			{
				return redirect()->action('ArticleController@add');
			}
			
			return redirect()->action('ArticleController@index');
		} else 
		{
			$feature = Feature::with('category')->get();
			return view('article.add',['features'=>$feature]);
		}
    }

}
