<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Feature;

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
    		$feature = $request->all();
		    var_dump($feature);die;
		} else 
		{
			return view('feature.add');
		}
    }
}
