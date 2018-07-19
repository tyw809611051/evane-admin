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
Route::get('/article/add', function () {
    return view('article.add');
});

Route::get('/article/index', function () {
    return view('article.index');
});


//版块管理
Route::group([
	'prefix' => '/feature',
	],function(){
	Route::get('index','FeatureController@index');
	Route::match(['get', 'post'], 'add','FeatureController@add');
	Route::get('changeStatus','FeatureController@changeStatus');
});

// Route::get('/home', function () {
//     return view('home');
// });

// Route::get('/reg', function () {
//     return view('register');
// });

// Route::post('/ver',[
//     'uses' => 'UserController@ver'
// ]);
Route::get('/login', function () {
    return view('auth/login');
})->name('login');

// Route::group([
//     'prefix' => 'article',
//     'middleware' => 'auth:web'
// ],function(){
//     Route::get('add','ArticleController@add');
// });

Route::get('/test','UserController@test');
// Auth::routes();

Route::post('/verify ','UserController@login');

Route::any('/{path?}',function ($path='/'){
    return error(404,'服务接口不存在',['path'=>$path]);
})->where('path','.*');

