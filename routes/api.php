<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

$api = app(\Dingo\Api\Routing\Router::class);

#默认配置指定的是v1版本，可以直接通过 {host}/api/version 访问
$api->version('v1',['namespace'=>'\App\Http\Controllers\Api'],function ($api) {
//    $api->get('version', function () {
//        return 'v1';
//    });
//  获取文章数据
    $api->get('articles','ArticleController@articles');
//    获取单个文章的数据
    $api->get('oneArticle/{id}','ArticleController@oneArticle');
//  获取栏目数据
    $api->get('categories','CategoryController@categories');
//  获取轮播图数据
    $api->get('banner','BannerController@banner');
//  登录验证
//  $api->post('login','AuthController@login');
    $api->post('login', 'AuthController@login');
    //退出
    $api->get('logout', 'AuthController@logout');
    //我的
    $api->get('me', 'AuthController@me');

//限制请求数
//$api->version('v1', function ($api) {
//    $api->group(['middleware' => 'api.throttle', 'limit' => 2, 'expires' => 1],
//        function ($api) {
//            $api->get('articles', 'App\Http\Controllers\Api\ArticleController@articles');
//        }); });


});




