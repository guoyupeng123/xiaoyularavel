<?php

namespace App\Http\Controllers\Wechat;

use App\Models\ResponseNews;
use App\Services\WechatService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class ResponseNewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public  function __construct(){
        $this->middleware('admin.auth',[
            'except'=>[],
        ]);
    }

    public function index()
    {
        hdcon('Wechat-response-news');
        $field = ResponseNews::all();
        return view('wechat.response_news.index',compact('field'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(WechatService $wechatService)
    {
        hdcon('Wechat-response-news');
        $ruleView = $wechatService->ruleView();
        return view('wechat.response_news.cretate',compact('ruleView'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,WechatService $wechatService)
    {
        hdcon('Wechat-response-news');
//        dd($request->toArray());
        DB::beginTransaction();
        $rule = $wechatService->ruleStore('news');
//        dd($request->toArray());
//        添加回复内容
        ResponseNews::create([
            'data'=>$request['data'],
            'rule_id'=>$rule['id'],
        ]);
        //事务提交
        DB::commit();
        return redirect()->route('wechat.response_news.index')->with('success','操作成功');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ResponseNews  $responseNews
     * @return \Illuminate\Http\Response
     */
    public function show(ResponseNews $responseNews)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ResponseNews  $responseNews
     * @return \Illuminate\Http\Response
     */
    public function edit(ResponseNews $responseNews,WechatService $wechatService)
    {
        hdcon('Wechat-response-news');
        $ruleView = $wechatService->ruleView($responseNews['rule_id']);
        return view('wechat.response_news.edit',compact('responseNews','ruleView'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ResponseNews  $responseNews
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ResponseNews $responseNews,WechatService $wechatService)
    {
        hdcon('Wechat-response-news');
        //开启事务
        DB::beginTransaction();
//        dd($responseText);
        //更新规则表和关键词表
        $wechatService->ruleUpdate();
        //更新回复表
        $responseNews->update([
            'data'=>$request['data'],
            'rule_id'=>$responseNews['rule_id'],
        ]);
        //事务提交
        DB::commit();
        return redirect()->route('wechat.response_news.index')->with('success','操作成功');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ResponseNews  $responseNews
     * @return \Illuminate\Http\Response
     */
    public function destroy(ResponseNews $responseNews)
    {
        hdcon('Wechat-response-news');
        $responseNews->rule()->delete();
        return redirect()->route('wechat.response_news.index')->with('success','操作成功');
    }
}
