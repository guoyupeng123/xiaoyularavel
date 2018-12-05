<?php

namespace App\Http\Controllers\Wechat;

use App\Models\ResponseBase;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ResponseBaseController extends Controller
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
//      找到该条数据
        if (ResponseBase::find(1)){
            $data = ResponseBase::find(1);
//        dd($data['data']);
            $data = $data['data'];
            return view('wechat.response_base.cretate',compact('data'));
        }else{
            return view('wechat.response_base.cretate');
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        dd($request->toArray());
//        返回模型数据，要么添加要么更新
        $responseBase = ResponseBase::firstOrNew(['id'=>1]);
//        添加数据
        $responseBase['data'] = $request->all();
//      数据增加
        $responseBase->save();
//      返回结果
        return back()->with('success','操作成功');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ResponseBase  $responseBase
     * @return \Illuminate\Http\Response
     */
    public function show(ResponseBase $responseBase)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ResponseBase  $responseBase
     * @return \Illuminate\Http\Response
     */
    public function edit(ResponseBase $responseBase)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ResponseBase  $responseBase
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ResponseBase $responseBase)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ResponseBase  $responseBase
     * @return \Illuminate\Http\Response
     */
    public function destroy(ResponseBase $responseBase)
    {
        //
    }
}
