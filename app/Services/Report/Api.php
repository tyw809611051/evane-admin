<?php

namespace App\Services\Report;


use App\Services\Report\Contracts\ApiInterface;
use Illuminate\Http\Request;

class Api implements ApiInterface
{
    protected static $HttpClient=NULL;
    protected static $Headers=[];
    /** 默认请求头 */
    const DefaultHeaders=[
        'APP'=>'cadms',
        'Ver'=>'1.0'
    ];


    public function __construct($config)
    {
        if(!@$config['api_root']){
            throw new \Exception('缺少CissData-api配置');
            return NULL;
        }
        $httpConfig=[
            'base_uri'=>$config['api_root'],
            'timeout' =>5,
            'connect_timeout'=>2,
            'http_errors'=>FALSE
        ];
        $request=\Illuminate\Http\Request::capture();
        self::$Headers['User-Agent']=$request->userAgent();
        self::$Headers['Ip']=$request->ip();
        self::$Headers['Router']=$request->route();
        self::$Headers['App_Name']=$config['app_name'];
        self::$Headers['App_Ver']=$config['app_ver'];
        self::$Headers['App_Env']=$config['app_env'];
        self::$Headers['openid']=$config['openid'];
        self::$HttpClient = new \GuzzleHttp\Client($httpConfig);
    }

    protected function request($method,$uri,$options){
        $options['headers']=array_merge(self::DefaultHeaders,self::$Headers);
        $response=self::$HttpClient->request($method,$uri,$options);
        return @json_decode($response->getBody(), true);
    }

    public function GET(string $path,array $query=[]){
        $options=[
            'query' => $query
        ];
        return $this->request('GET',$path,$options);
    }
    public function POST(string $path,array $formData=[],array $query=[]){
        $options=[
            'query'=>$query,
            'form_params' => $formData
        ];
        return $this->request('POST',$path,$options);
    }

    public function PUT(string $path,array $formData=[],array $query=[]){
        $options=[
            'query'=>$query,
            'form_params' => $formData
        ];
        return $this->request('PUT',$path,$options);
    }

    public function HEAD(string $path,$query=[]){
        $options=[
            'query'=>$query,
        ];
        return $this->request('HEAD',$path,$options);
    }

    public function DELETE(string $path,$query=[]){
        $options=[
            'query'=>$query,
        ];
        return $this->request('DELETE',$path,$options);
    }

    public function setHeader(array $Headers=[]){

        self::$Headers=$Headers;
    }
}