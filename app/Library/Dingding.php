<?php

namespace App\Library;

use Illuminate\Support\Facades\Log;

class Dingding
{
    /** @var string 钉钉机器人 */
    private $access_token = '';
    
    /** 钉钉AccessToken列表 */
    const TokenList=[
        //casmart监控群
        'casmart-monitor'=>'084e999914c80b243babf8451c5d16feff41d45565da23f1414a354646a919d0',
        'exception-monitor'=>'b8cf44a0bddef8000c55aaf2de6c6997f2b70c082db45735da968582e9173887',
        'es-monitor'=>'b26e392bbb8dd42f93b22a1b50c81639b0338bb38fbc65865f326bc4f358119c'
    ];

    function __construct($token='')
    {
        if(!$token)
        {
            if (env('APP_ENV') != 'production')
            {
                $this->access_token = 'b26e392bbb8dd42f93b22a1b50c81639b0338bb38fbc65865f326bc4f358119c';
            }
        } else 
        {
            $this->access_token = $token;
        }
        
    }
    
    private function request_by_curl($remote_server,$post_string)
    {
        try {
            $ch = curl_init();
            curl_setopt($ch,CURLOPT_URL,$remote_server);
            curl_setopt($ch,CURLOPT_POST,1);
            curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,5);
            curl_setopt($ch,CURLOPT_HTTPHEADER,['Content-Type: application/json;charset=utf-8']);
            curl_setopt($ch,CURLOPT_POSTFIELDS,$post_string);
            curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
            $data = curl_exec($ch);
            curl_close($ch);
        } catch (Exception $e) {
            Log::error($e->getTraceAsString());
            return false;
        }
        return $data;
    }
    
    private function send($data)
    {
        $data_string = json_encode($data);
        $apiUrl      = 'https://oapi.dingtalk.com/robot/send?access_token=' . $this->access_token;
        $result      = $this->request_by_curl($apiUrl,$data_string);
        
        return $result;
    }
    
    /**
     * 文本消息
     */
    public function sendText($content,$at=[])
    {
        $data = [
            'msgtype' => 'text',
            'text'    => [
                'content' => $content,
                'at'      => [
                    "isAtAll"   => false,
                    "atMobiles" => $at
                ]
            ]
        ];
        
        return $this->send($data);
    }
    
    /**
     * markDown通知
     * @param $title
     * @param $text
     * @param array $at
     * @return bool|mixed
     */
    public function sendMarkdown($title,$text = '',$at = [])
    {
        $data = [
            'msgtype'  => 'markdown',
            'markdown' => [
                'title' => $title,
                'text'  => '### ' . $title . "\n" . $text,
            ],
            'at'       => [
                "isAtAll"   => false,
                "atMobiles" => $at
            ]
        ];
        
        return $this->send($data);
    }
    
    /**
     * 链接消息
     */
    public function sendLink($title,$msg,$link)
    {
        $data = [
            'msgtype' => 'link',
            'link'    => [
                'title'      => $title,
                'text'       => $msg,
                'messageUrl' => $link
            ]
        ];
        
        return $this->send($data);
    }
    
    
    /**
     * 发送卡片
     * @param $title
     * @param string $text
     * @param string $url
     * @return bool|mixed
     */
    public function sendActionCard($title,$text = '',$url = '')
    {
        $data = [
            'msgtype'    => 'actionCard',
            'actionCard' => [
                'title'       => $title,
                'text'        => '# ' . $title . "\n" . $text . "\n",
                'hideAvatar'  => '0',
                "singleTitle" => "查看详情",
                "singleURL"   => $url
            ]
        ];
        
        return $this->send($data);
    }
}