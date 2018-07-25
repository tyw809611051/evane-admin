<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
			var_dump($data);die;
		} else 
		{
			return view('article.add');
		}
    }
}
