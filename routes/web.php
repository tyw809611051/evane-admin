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
	],function(){
	Route::get('index','ArticleController@index');
	Route::match(['get', 'post'], 'add','ArticleController@add');
	Route::match(['get', 'post'], 'edit/{id}','ArticleController@edit');
	Route::get('delete/{id}','ArticleController@delete');
	Route::get('changeStatus','ArticleController@changeStatus');
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
    return view('layouts.404');
})->where('path','.*');

