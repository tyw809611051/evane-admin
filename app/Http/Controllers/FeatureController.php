<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FeatureController extends Controller
{
	public function index(Request $request)
	{
		return view('feature.index');
	}
	
    //
    public function add(Request $request)
    {
    	if ($request->isMethod('post')) 
    	{
		    
		} else 
		{
			return view('feature.add');
		}
    }
}
