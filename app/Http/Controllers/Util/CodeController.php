<?php

namespace App\Http\Controllers\Util;

use App\Notifications\RegisterNotify;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CodeController extends Controller
{


    public function send(Request $request){
//      获取所有的请求数据
//      dd($request->all());
//      dd($request->username);//获取单条数据
//      获取随机的四位验证码
        $code = $this->random();
//      dd($code);//随机验证码获取成功
        $user = User::firstOrNew(['email'=>$request->username]);
//        dd($user->toArray());
//        user就是用户提交的邮箱



//          需要创建通知类:php artisan make:notification  RegisterNotify
//          验证码传入构造函数内发送给用户
        $user->notify(new RegisterNotify($code));
//      将验证码存储至session中
        session()->put('code',$code);
//        返回hdjs要求的数据
        return ['code' => 1, 'message' => '发送成功'];


    }
    public function random($len=4){
//      设置空字符串，储存随机
        $str  = '';
        for($a=0;$a<$len;$a++){
            $str .= mt_rand(0,9);
        }
//        返回字符
        return $str;
    }
}
