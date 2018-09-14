<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Messages;
use App\Events\NewMessageNotification;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{

    public function index(Request $request)
    {
        $user_id = Auth::user();
        $data    = ['user_id'=>$user_id];
        return view('task.index',$data);
    }

    public function send()
    {
        //创建消息
        $message = new Messages();
        $message->from = 1;
        $message->to   = 2;
        $message->message = 'Demo message from user 1 to user 2';
        $message->save();
        event(new NewMessageNotification($message));
    }
}
