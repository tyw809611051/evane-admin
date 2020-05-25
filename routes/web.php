<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
});

//版块管理
Route::group([
	'prefix' => '/feature',
	'middleware' => 'auth'
	],function(){
	Route::get('index','FeatureController@index');
	Route::match(['get', 'post'], 'add','FeatureController@add');
	Route::match(['get', 'post'], 'edit/{id}','FeatureController@edit');
	Route::get('delete/{id}','FeatureController@delete');
	Route::get('changeStatus','FeatureController@changeStatus');
	Route::get('get','FeatureController@get');
});
//分类管理
Route::group([
	'prefix' => '/category',
	'middleware' => 'auth'
	],function(){
	Route::get('index','CategoryController@index');
	Route::match(['get', 'post'], 'add','CategoryController@add');
	Route::match(['get', 'post'], 'edit/{id}','CategoryController@edit');
	Route::get('delete/{id}','CategoryController@delete');
	Route::get('changeStatus','CategoryController@changeStatus');
});

//文章管理
Route::group([
	'prefix' => '/article',
	'middleware' => 'auth'
	],function(){
	Route::get('index','ArticleController@index');
	Route::match(['get', 'post'], 'add','ArticleController@add');
	Route::match(['get', 'post'], 'edit/{id}','ArticleController@edit');
	Route::get('delete/{id}','ArticleController@delete');
	Route::get('changeStatus','ArticleController@changeStatus');
});

//留言管理
Route::group([
	'prefix' => '/message',
	'middleware' => 'auth'
	],function(){
	Route::get('index','MessageController@index');
	Route::get('delete/{id}','MessageController@delete');
});

//评论管理
Route::group([
	'prefix' => '/comment',
	'middleware' => 'auth'
	],function(){
	Route::get('index','CommentController@index');
	Route::get('delete/{id}','CommentController@delete');
});

//用户管理
Route::group([
	'prefix' => '/member',
	'middleware' => 'auth'
	],function(){
	Route::get('index','MemberController@index');
	Route::get('delete/{id}','MemberController@delete');
});

//角色管理
Route::group([
	'prefix' => '/role',
	'middleware' => 'auth'
	],function(){
	Route::get('index','RoleController@index');
	Route::match(['get', 'post'], 'add','RoleController@add');
	Route::match(['get', 'post'], 'edit/{id}','RoleController@edit');
	Route::get('delete/{id}','RoleController@delete');
	Route::get('changeStatus','RoleController@changeStatus');
	Route::get('permission/{id}','RoleController@permission');
	Route::post('assignPermissions/{id}','UserController@assignPermissions');
});

//权限管理
Route::group([
	'prefix' => '/permission',
	'middleware' => 'auth'
	],function(){
	Route::get('index','PermissionController@index');
	Route::match(['get', 'post'], 'add','PermissionController@add');
	Route::match(['get', 'post'], 'edit/{id}','PermissionController@edit');
	Route::get('delete/{id}','PermissionController@delete');
	Route::get('changeStatus','PermissionController@changeStatus');
});

//用户管理
Route::group([
	'prefix' => '/user',
	'middleware' => ['auth']
	],function(){
	Route::get('index','UserController@index');
	Route::match(['get', 'post'], 'add','UserController@add');
	Route::match(['get', 'post'], 'edit/{id}','UserController@edit');
	Route::get('delete/{id}','UserController@delete');
	Route::get('changeStatus','UserController@changeStatus');
	Route::get('role/{id}','UserController@role');
	Route::post('assignRoles/{id}','UserController@assignRoles');
	Route::get('checkPassword/{id}','UserController@checkPassword');
});

//测试
Route::group([
                 'prefix' => '/task',
             ],function(){
    //广播系统
    Route::get('index','TaskController@index');
    Route::get('send','TaskController@send');
    //集合
    Route::get('collect','TaskController@collect');
    //队列
    Route::get('queue','TaskController@queueRabbitmq');
    //通知
    Route::get('notice','TaskController@notice');
    //es
    Route::get('es','TaskController@es');
});

//app
Route::get('/chat/index','ChatController@index');
Route::match(['get', 'post'], '/login','UserController@login')->name('login');
Route::get('/logout','UserController@logout')->name('logout');

Route::any('/{path?}',function ($path='/'){
    return view('layouts.404');
})->where('path','.*');

