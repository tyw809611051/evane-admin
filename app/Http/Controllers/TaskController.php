<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Messages;
use App\Events\NewMessageNotification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Queue;
use App\Jobs\TestQueue;
use App\Notifications\LoginNotice;
use Elasticsearch\Client;
use Elasticsearch\ClientBuilder;

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
    
    /*
      * 队列测试
      * */
    public function notice()
    {
        $msg = new Messages();
        $notice = (new LoginNotice())->delay(5);
        $msg->notify($notice);
    }

    public function es()
    {
//        \Overtrue\LaravelWeChat\Middleware\OAuthAuthenticate::class
        set_time_limit(0);
        $client = ClientBuilder::create()->build();
        DB::table('gb_log_quexin')->orderBy('id')->chunk(100,function ($quexin) use($client){
           foreach ($quexin as $qu) {
               $params['body'][] = [
                   'index' => [
                       '_index' => 'log_quexin',
                   ]
               ];

               $params['body'][] = [
                   'id'     => $qu->id,
                   'level'  => $qu->level,
                   'category' => $qu->category,
                   'log_time' => $qu->log_time,
                   'prefix'   => $qu->prefix,
                   'message'  => $qu->message,
               ];
           }

            $client->bulk($params);
        });

        return success('good');
    }
}
