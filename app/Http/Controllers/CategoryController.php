<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Feature;

class CategoryController extends Controller
{
	public function index(Request $request)
	{
		return view('category.index');
	}

	public function add(Request $request)
	{
		if ($request->isMethod('post'))
		{

		} else 
		{
			return view('category.add');
		}
	}

	
}