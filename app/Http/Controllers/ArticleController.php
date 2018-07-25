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
			$data = $request->all();
			$rs = $request->file('picture')->storeAs('picture','tangyiwen.jpg');
			var_dump($rs);die;
		} else 
		{
			$feature = Feature::with('category')->get();
			return view('article.add',['features'=>$feature]);
		}
    }
}
