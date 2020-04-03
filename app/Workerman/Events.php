<?php
namespace App\Workerman;

use GatewayWorker\Lib\Gateway;
use Illuminate\Support\Facades\Log;

class Events
{
    public static function onWorkerStart($businessWorker)
    {
        echo "BusinessWorker    Start\n";
    }

    public static function onConnect($client_id)
    {
        Log::info('onConnect');
        Gateway::sendToClient($client_id, json_encode(['type' => 'init', 'client_id' => $client_id]));
    }
    public static function onWebSocketConnect($client_id, $message)
    {
    }
    public static function onMessage($client_id, $message)
    {
        $response = ['errcode' => 0, 'msg' => 'ok', 'data' => []];
        $message = json_decode($message);

        if (!isset($message->mode)) {
            $response['msg'] = 'missing parameter mode';
            $response['errcode'] = ERROR_CHAT;
            Gateway::sendToClient($client_id, json_encode($response));
            return false;
        }

        switch ($message->mode) {
            case 'say':   #处理发送的聊天
                $response['msg'] = 'Authentication failure';
                $response['data'] = json_encode([$message->order_id, $message->type, $message->content, $message->user_id]);
                $response['errcode'] = ERROR_CHAT;
                break;
            case 'chats':  #获取聊天列表
                $response['data'] = ['chats' => $message->order_id];
                break;
            default:
                $response['errcode'] = ERROR_CHAT;
                $response['msg'] = 'Undefined';
        }

        Gateway::sendToClient($client_id, json_encode($response));
    }


    public static function onClose($client_id)
    {
        Log::info('close connection' . $client_id);
    }
}