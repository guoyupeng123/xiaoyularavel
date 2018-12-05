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

//Route::get('/', function () {
//    return view('welcome');
//});

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

//设置路由组
//设置资源路由----文章的增删改查
Route::group(['prefix'=>'home','namespace'=>'Home','as'=>'home.'],function (){
    //加载首页
    Route::get('/','HomeController@index')->name('index');
    //加载搜索
    Route::get('search','HomeController@search')->name('search');
//  资源路由  文章
    Route::resource('article','ArticleController');
//  资源路由  评论
    Route::resource('comment','CommentController');
//  点赞 和 取消赞
    Route::get('zan/make','ZanController@make')->name('zan.make');
//  收藏和取消收藏
    Route::get('collect/make','CollectController@make')->name('collect.make');
});


//会员中心路由组
Route::group(['prefix'=>'member','namespace'=>'Member','as'=>'member.'],function (){
//  资源路由
    Route::resource('user','UserController');
//  文章关注
    Route::get('attention/{user}','UserController@attention')->name('attention');
//  粉丝列表
    Route::get('get_fans/{user}','UserController@myFans')->name('my_fans');
    Route::get('get_following/{user}','UserController@myFollowing')->name('my_following');
//  我的收藏
    Route::get('collect/{user}','UserController@collect')->name('collect');
//  我的点赞
    Route::get('my_zan/{user}','UserController@myZan')->name('my_zan');
//  我的所有通知
    Route::get('notify/{user}','NotifyController@index')->name('notify');
//  显示所有通知
    Route::get('notify/show/{notify}','NotifyController@show')->name('notify.show');
});


Route::group(['prefix'=>'util','namespace'=>'Util','as'=>'util.'],function (){
    //工具类  any() get和post都可以
    Route::any('/code/sent','CodeController@send')->name('code.sent');
//  上传
    Route::any('/upload','UploadController@uploader')->name('upload');
    Route::any('/filesLists','UploadController@filesLists')->name('filesLists');
});




//后台M
//模板 --路由组
//['middleware'=>['admin.auth']  自定义的中间件
//['prefix'=>'admin','namespace'=>'Admin','as'=>'admin.']  缩减声明路由
Route::group(['middleware'=>['admin.auth'],'prefix'=>'admin','namespace'=>'Admin','as'=>'admin.'],function(){
    Route::get('index','IndexController@index')->name('index');
    //创建模型同时创建迁移文件和工厂
    //artisan make:model --migration --factory Models/Category
    //创建控制器指定模型
    //artisan make:controller --model=Models/Category Admin/CategoryController
    Route::resource('category','CategoryController');//后台栏目管理的编写
//  加载手台配置型模板路由
    Route::get('config/edit/{name}','ConfigController@edit')->name('config.edit');
//  后台配置项增加更新数据
    Route::post('config/update/{name}','ConfigController@update')->name('config.update');
});


//微信路由组
Route::group(['prefix'=>'wechat','namespace'=>'Wechat','as'=>'wechat.'],function (){
//  微信资源路由
    Route::resource('button','ButtonController');
//  微信通信地址
    Route::any('api/handler','ApiController@handler')->name('api.handler');
    Route::get('button/push/{button}','ButtonController@push')->name('button.push');
//  基本文本回复
    Route::resource('response_text','ResponseTextController');
//  图文回复
    Route::resource('response_news','ResponseNewsController');
//  基本回复数据
    Route::resource('response_base','ResponseBaseController');
});

//轮播图路由组
Route::group(['prefix'=>'banner','namespace'=>'Banner','as'=>'banner.'],function (){
//  资源路由
    Route::resource('banner','BannerController');
});








