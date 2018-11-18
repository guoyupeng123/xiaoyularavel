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
Route::get('/','Home\HomeController@index')->name('index');
//加载注册页面
Route::get('/register','UserController@register')->name('register');
//用户提交注册//因为不是git请求所以可以使用形同路径和别名
Route::post('/register','UserController@store')->name('register');
//用户登录页面
Route::get('/login','UserController@login')->name('login');
//提交登录验证
Route::post('/login','UserController@loginFrom')->name('login');
//用户注销
Route::get('/logout','UserController@logout')->name('logout');
//用户修改密码页面
Route::get('/password_reset','UserController@passwordReset')->name('password_reset');
//提交修改密码页面
Route::post('/password_reset','UserController@passwordResetForm')->name('password_reset');


//工具类  any() get和post都可以
Route::any('/code','Util\CodeController@send')->name('code.sent');



//后台M模板 --路由组
//['middleware'=>['admin.auth']  自定义的中间件
//['prefix'=>'admin','namespace'=>'Admin','as'=>'admin.']  缩减声明路由
Route::group(['middleware'=>['admin.auth'],'prefix'=>'admin','namespace'=>'Admin','as'=>'admin.'],function(){
    Route::get('index','IndexController@index')->name('index');
    //创建模型同时创建迁移文件和工厂
    //artisan make:model --migration --factory Models/Category
    //创建控制器指定模型
    //artisan make:controller --model=Models/Category Admin/CategoryController
    Route::resource('category','CategoryController');
});






