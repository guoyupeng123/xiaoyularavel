<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AuthController extends CommentController
{
    public function __construct(){
//      除了login都需要验证
//      auth:api  判断用户是否登录
        return $this->middleware('auth:api',[
            'except'=>['login']
        ]);
    }

    public function login(){
//        only() 仅接受 email以及password
//        dd(\request()->only(['email','password']));
//        attempt : 手动用户登录
        if(!$token = auth('api')->attempt(request()->only(['email', 'password']))){
            //登录失败
            return $this->response->errorUnauthorized('帐号或密码错误');
        }
        //登陆成功
        return $this->respondWithToken($token);
    }

//    响应tokey
    public function  respondWithToken($token){
        //获取 jwt.php 配置文件中 token 有效期 60
        //dd(auth('api')->factory()->getTTL());
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth('api')->factory()->getTTL() * 60
        ]);
    }
    //获取⽤用户资料料
    public function me() {
        return response()->json(auth('api')->user());
    }

    //注销登录
    public function logout(){
        auth('api')->logout();
        return response()->json(['message' => 'Successfully logged out']);
    }

}
