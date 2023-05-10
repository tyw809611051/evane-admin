<?php

if (!function_exists('success')) {

    function success($data = '', $msg = 'ok')
    {
        return response()->json(['error_code' => 0, 'msg' => $msg, 'data' => $data]);
    }

}

if (!function_exists('apiSuccess')) {

    function apiSuccess($data = '', $msg = 'ok',$total = 0)
    {
        return response()->json(['code' => 0, 'msg' => $msg, 'data' => $data,'count'=>$total]);
    }

}

if (!function_exists('error')) {
    function error($erroCode = 500, $msg = 'error', $data = '')
    {
        if (!$erroCode = (int)($erroCode)) {
            $erroCode = 500;
        }

        return response()->json(['error_code' => $erroCode, 'msg' => $msg, 'data' => $data]);
    }
}

if (!function_exists('apiError')) {
    function apiError($erroCode = 500, $msg = 'error', $data = '')
    {
        if (!$erroCode = (int)($erroCode)) {
            $erroCode = 500;
        }

        return response()->json(['error_code' => $erroCode, 'msg' => $msg, 'data' => $data]);
    }
}

use Illuminate\Support\Facades\Crypt;
function getAuthToken($request){
    $token=$request->header('Access-Token');
    if(!$token || strlen($token)<10){
        return FALSE;
    }
    try {
        $tokenJson = Crypt::decrypt($token);
    }catch (\Illuminate\Contracts\Encryption\DecryptException $e){
       return FALSE;
    }
    $tokenData=@json_decode($tokenJson,true);
    if(!$tokenJson){
        return FALSE;
    }
    return [
        'uid'=>@$tokenData['uid'],
        'cid'=>@$tokenData['cid'],
        'role'=>@$tokenData['role'],
    ];
}

/**
 * 把返回的数据集转换成Tree
 * @param array $list 要转换的数据集
 * @param string $pid parent标记字段
 * @param string $root level标记字段
 * @return array
 */
if (!function_exists('listToTree')) {
    
    function listToTree($list, $pk='code', $pid = 'parent_code', $child = 'children', $root = 0) {
        // 创建Tree
        $tree = array();
        if(is_array($list)) {
            // 创建基于主键的数组引用
            $refer = array();
            foreach ($list as $key => $data) {
                $refer[$data[$pk]] =& $list[$key];
            }
            foreach ($list as $key => $data) {
                // 判断是否存在parent
                $parentId =  $data[$pid];
                if ($root == $parentId) {
                    $tree[] =& $list[$key];
                }else{
                    if (isset($refer[$parentId])) {
                        $parent =& $refer[$parentId];
                        $parent[$child][] =& $list[$key];
                    }
                }
            }
        }
        return $tree;
    }
}

/**
 * 判断是否在微信中打开
 * @return array
 * @return bool
 * @author tangyw@sqqmall.com
 */
function is_weixin(){

    if ( strpos($_SERVER['HTTP_USER_AGENT'], 'MicroMessenger') !== false ) {

        return true;

    }

    return false;

}