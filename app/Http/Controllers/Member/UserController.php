<?php

namespace App\Http\Controllers\Member;

use App\Models\Article;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
//        dd($user);//打印成功
        $article = Article::latest()->where('user_id',$user->id)->paginate(10);
        return view('member.user.show',compact('article','user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user,Request $request)
    {
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
}
