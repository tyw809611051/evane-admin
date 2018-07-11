<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;

class UserController extends Controller
{
    public function ver(Request $request)
    {
        $a = $request->post('username');
        var_dump($a);
    }
}