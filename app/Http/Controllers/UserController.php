<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
//  用户注册页面
    public function register(){
//        dd('dd');//测试
            return view('user.register');
    }

    public function store(UserRequest $request){
//        将数据存储到数据表
        $data = $request->all();
//        加密数据
        $data['password'] = bcrypt($data['password']);
//        存储到数据库
        User::create($data);
//        提示并且跳转
        return redirect()->route('login')->with('success','注册成功');
    }

    public function login(){
        dd('这是登陆页面');
    }
}
