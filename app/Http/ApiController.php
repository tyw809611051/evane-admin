<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
class ApiController extends Controller
{

    /**
     * 获取资源真实路径
     */
    public function getOSSUrl($originName,$pre=''){
        $fileInfo=pathinfo($originName);
        $fileHash=$fileInfo['filename'];
        $basename=$fileInfo['basename'];
        $pre=$pre?$pre:env('APP_NAME','ctest');
        $storePath=$pre.'/'.substr($fileHash, 0, 2) . '/' . substr($fileHash, 2, 2);
        $ossHost=env('OSS_HOST');

        return $ossHost.'/'.$storePath.'/'.$basename;
    }


}