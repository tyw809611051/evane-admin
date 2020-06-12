<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| WECHAT Routes
|--------------------------------------------------------------------------
|
| Here is where you can register WECHAT routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "WECHAT" middleware group. Enjoy building your API!
|
*/

// 不需要验证的接口
Route::group([
    'namespace' => 'Wechat',
],function () {
    Route::any('/official-account','OfficialAccountController@index');
});
// 需要验证的接口
Route::group([
    'namespace' => 'Wechat',
    'middleware' => ['wechat.oauth']
],function () {

});

Route::any('/{path?}', function ($path = '/') {
    return error(404, '服务接口不存在', ['path' => $path]);
})->where('path', '.*');