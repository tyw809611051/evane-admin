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

// Route::get('/', function () {
//     return view('home');
// });

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
});

Route::get('/test','UserController@test');
// Auth::routes();

Route::post('/verify ','UserController@login');

Route::any('/{path?}',function ($path='/'){
    return error(404,'服务接口不存在',['path'=>$path]);
})->where('path','.*');

