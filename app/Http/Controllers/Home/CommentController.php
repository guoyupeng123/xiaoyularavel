<?php

namespace App\Http\Controllers\Home;

use App\Models\Comment;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request,Comment $comment)
    {
//      dd($request['article_id']);//测试get参数
        $comments = $comment->with('user')->where('article_id',$request->article_id)->get();
//      在每条评论里面增加一条点赞的数据
        foreach($comments as $comment){
            $comment->zan_num = $comment->zan->count();
        }
//        dd($comments->toArray());
        return ['code'=>1,'message'=>'','comments'=>$comments];
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,Comment $comment){
//        dd($request->toArray());//打印传过来的数据
        $comment->user_id = auth()->id();
        $comment->article_id = $request->article_id;
        $comment->content = $request['content'];
//      dd($comment->toArray());//打印模型里面的数据
        $comment->save();
//      关联user表返回数据
        $comment = $comment->with('user')->find($comment->id);
//      增加zan_num字段
        $comment->zan_num = $comment->zan->count();
//      返回数据
        return ['code'=>1,'message'=>'','comment'=>$comment];
    }

}
