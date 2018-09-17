<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Messages;
use App\Events\NewMessageNotification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Queue;
use App\Jobs\TestQueue;

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
    
    /*
     * 集合测试
     * */
    public function collect()
    {
        //创建新集合
        $collection = collect([1,2,3]);
        //返回底层数组
        $c1         = $collection->all();
        var_dump($c1);
    }
    
    /*
      * 队列测试
      * */
    public function queueRabbitmq()
    {
        $arr = [
            'time' => time()
        ];
        TestQueue::dispatch($arr);
    }
}
