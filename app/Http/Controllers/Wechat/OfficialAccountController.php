<?php
/**
 * 微信公众号方法
 * Created on 2020/6/11 7:14 下午
 * Create by devyiwen@gmail.com
 */

namespace App\Http\Controllers\Wechat;


use App\Http\Controllers\Controller;
use EasyWeChat\Factory;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Log;

class OfficialAccountController
{


    public function index(Request $request)
    {
        try {
            if ($request->isMethod('GET'))
            {
                // 微信服务器校验
                $timestamp = $request->get('timestamp');
                $noce      = $request->get('nonce');
                $token     = config('official_account.default.token','evane');
                $signature = $request->get('signature');
                $echostr   = $request->get('echostr');
                $array     = [$timestamp,$noce,$token];

                if (!$echostr) {
                    throw new Exception('校验参数不能为空',60001);
                }

                // 进行token验证
                $tmpstr = sha1(implode('',$array));
                if ($tmpstr != $signature) {
                    throw new Exception('校验参数失败',60002);
                }

                header('content-type:text');
                echo $echostr;
                exit;
            } else {

                // 公众号消息处理
                $app = Factory::officialAccount(config('wechat.official_account.default'));
                $message = $app->server->getMessage();

                // 对消息进行处理
                $app->server->push(function ($message) {
                    $type = strtolower($message['MsgType']);
                    switch ($type) {
                        case 'event':
                            # 事件消息

                            break;
                        case 'text':
                            # 文字消息
                            return $message['Content'];
                            break;
                        case 'image':
                            # 图片消息
                            return '收到图片消息';
                            break;
                        case 'voice':
                            return '收到语音消息';
                            break;
                        case 'video':
                            return '收到视频消息';
                            break;
                        case 'location':
                            return '收到坐标消息';
                            break;
                        case 'link':
                            return '收到链接消息';
                            break;
                        case 'file':
                            return '收到文件消息';
                        // ... 其它消息
                        default:
                            return '收到其它消息';
                            break;
                    }
                });

                $reponse = $app->server->serve();
                return $reponse;
            }
        } catch (Exception $e) {
            Log::info('微信公众号接收消息错误： '.$e->getCode().'-'.$e->getMessage());
            return error($e->getCode(),$e->getMessage());
        }

    }

}