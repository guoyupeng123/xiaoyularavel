<?php

namespace App\Http\Controllers\Wechat;

use App\Models\ResponseText;
use App\Services\WechatService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class ResponseTextController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $flie = ResponseText::all();
        return view('wechat.response_text.index',compact('flie'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(WechatService $wechatService)
    {
        $ruleView = $wechatService->ruleView();
        return view('wechat.response_text.cretate',compact('ruleView'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,WechatService $wechatService)
    {


        DB::beginTransaction();
        $rule = $wechatService->ruleStore('text');
//        dd($request->toArray());
//        添加回复内容
        ResponseText::create([
            'content'=>$request['data'],
            'rule_id'=>$rule['id'],
        ]);
        //事务提交
        DB::commit();
        return redirect()->route('wechat.response_text.index')->with('success','操作成功');
    }


    public function show(ResponseText $responseText){

    }

    public function edit(ResponseText $responseText,WechatService $wechatService){

        $ruleView = $wechatService->ruleView($responseText['rule_id']);
        return view('wechat.response_text.edit',compact('ruleView','responseText'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ResponseText  $responseText
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ResponseText $responseText,WechatService $wechatService)
    {
        DB::beginTransaction();
        $rule = $wechatService->ruleUpdate($responseText['rule_id']);
//        dd($request->toArray());
//        添加回复内容
        ResponseText::query([
            'content'=>$request['data'],
            'rule_id'=>$responseText['rule_id'],
        ]);
        //事务提交
        DB::commit();
        return redirect()->route('wechat.response_text.index')->with('success','操作成功');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ResponseText  $responseText
     * @return \Illuminate\Http\Response
     */
    public function destroy(ResponseText $responseText)
    {
        $responseText->rule()->delete();
        return redirect()->route('wechat.response_text.index')->with('success', '操作成功');
    }
}
