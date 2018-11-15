<?php

namespace App\Http\Controllers;

use App\Http\Requests\PasswordResetRequest;
use App\Http\Requests\UserRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller{
//  构造方法
    public function __construct(){
//      调用中间件保护注册登陆(已经登陆用户不可以再次登录注册)
        $this->middleware('guest',[
            'only'=>['login','loginForm','register','store','passwordReset','passwordResetForm'],
        ]);
    }
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

//  用户登录页面
    public function login(){
//      加载登录模板
        return view('user.login');
    }
//  用户登录提交页面
    public function loginFrom(Request $request){
//        dd($request->all());//接收数据
//      验证提交  --测试正常
        $this->validate($request,[
            'email'=>'email',
            'password'=>'required|min:3'
        ],[
            'email.email'=>'请输入邮箱',
            'password.required'=>'密码不得为空',
            'password.min'=>'密码不得少于三位数'
        ]);
//        执行登陆
//        手册->用户登录->手动用户登录
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->route('index')->with('success','登录成功');
        }
        return redirect()->back()->with('danger','用户名密码不正确');
    }

//      用户注销
        public function logout(){
//          手册->用户登陆->注销
            Auth::logout();
            return redirect()->route('index');
        }

//      更改密码
        public function passwordReset(){
//          模板
            return view('user.passwordReset');
        }

 //      更改密码处理
        public function passwordResetForm(PasswordResetRequest $request){

//            根据用户提交的邮箱去数据库查找数据
            $user = User::where('email',$request->email)->first();
//            dd($user);//接收成功
            if ($user){
//              加密数据
                $user->password = bcrypt($request->password);
//              更新数据
                $user->save();
//              成功提示
                return redirect()->route('login')->with('success','修改成功');
            }
            return redirect()->back()->with('danger','改邮箱未注册');

        }







}
