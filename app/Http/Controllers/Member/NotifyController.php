<?php

namespace App\Http\Controllers\Member;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Notifications\DatabaseNotification;

class NotifyController extends Controller
{
    public function __construct(){
//        未登陆的用户不可以访问index
        $this->middleware('auth',[
            'only'=>['index'],
        ]);
    }

    public function index(User $user){
//      判断当前查看的是不是登录的用户
        $this->authorize('isMine',$user);
//        获得当前用户里面的所有通知
        $notifications = $user->notifications()->paginate(5);
//        在列表里面用户循环
        return view('member.notify.notify',compact('user','notifications'));
    }

    public function show(DatabaseNotification $notify){
//      标记已读通知
        $notify->markAsRead();
        //跳转到文章详情页,页面自动滚动到对应的评论
        return redirect($notify['data']['link']);
    }
}
