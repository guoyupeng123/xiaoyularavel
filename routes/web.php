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
    return view('welcome');
});
//加载首页
Route::get('/','HomeController@index')->name('index');
//加载注册页面
Route::get('/register','UserController@register')->name('register');
//用户提交注册//因为不是git请求所以可以使用形同路径和别名
Route::post('/register','UserController@store')->name('register');

//工具类  any() get和post都可以
Route::any('/code','Util\CodeController@send')->name('code.sent');


Route::get('/login','UserController@login')->name('login');



