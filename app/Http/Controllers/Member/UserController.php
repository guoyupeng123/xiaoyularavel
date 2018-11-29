<?php

namespace App\Http\Controllers\Member;

use App\Models\Article;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller{

    public function __construct(){
//        调用中间件 未登录用户不得访问这几个控制器方法
        $this->middleware('auth',[
            'only' => ['edit','update','attention']
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user){
//        dd($user->id);//打印成功
        $article = Article::latest()->where('user_id',$user->id)->paginate(10);
        return view('member.user.show',compact('article','user'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user,Request $request){
//        调用策略
        $this->authorize('isMine',$user);
//        接收提交的数据
        $type = $request->query('type');

        return view('member.user.edit_'.$type,compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user){

//      dd($user);
        $date = $request->all();//dd($date);
//      调用策略
        $this->authorize('isMine',$user);
//      验证
//      sometimes:手册->表单验证->有条件的添加关于规则
//      这里指单独操作提交password或者name是不受其影响
        $this->validate($request,[
            'password'=>'sometimes|required|min:3|confirmed',
            'name'=>'sometimes|required'
        ],[
            'password.required'=>'请输入密码',
            'password.min'=>'密码不得小于3位',
            'password.confirmed'=>'两次密码不一致',
            'name.required'=>'请输入昵称'
        ]);

//      如果有密码字段，则加密密码
        if ($request->password){
            $date['password']=bcrypt($date['password']);
        }
//      更新数据
        $user->update($date);
        return back()->with('success','操作成功');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
//  用户关注
    public function attention(User $user){
//        dd($user);
//        toggle($user)//如果数据库里面有就取消，没有就写入
//        auth()->user()->following()->toggle($user);
        $user->fans()->toggle(auth()->user());
        return back();
    }
//  粉丝列表
    public function myFans(User $user){

        $fans = $user->fans()->paginate(6);
//        dd($fans->toArray());接受成功
        return view('member.user.my_fans',compact('user','fans'));
    }
//  我关注了谁
    public function myFollowing(User $user){
        $fans = $user->following()->paginate(6);
        return view('member.user.my_Following',compact('user','fans'));
    }
//  我的收藏
    public function collect(User $user){
//      dd($user->collect);
        $articles = [];
        foreach ($user->collect as $collect){
            //dump($collect->article);//打印成功
            $articles[] = $collect->article;
        }
//        $articles = $articles->paginate(6);
        return view('member.user.collect',compact('user','articles'));
    }
//    我的点赞
    public function myZan( User $user , Request $request){
        //dd($user->zan);//通过模型关联找出赞表的数据
//        $art = [];
//        foreach ($user->zan as $zan){
//            $art[] = $zan->belongsModel;
//        }
        $type=$request->query( 'type' );

        $class = 'App\Models\\'.ucfirst($type);
//      组合路径
        $zansData = $user->zan->where('zan_type',$class)->all();

        return view('member.user.my_zan_'.$type,compact('user','zansData'));
    }
}
