<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Feature;

class CategoryController extends Controller
{
	public function index(Request $request)
	{
		return view('Category.index');
	}
}