<?php

namespace App\Http\Controllers\Wechat;

use App\Models\Button;
use App\Services\WechatService;
use Houdunwang\WeChat\WeChat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ButtonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $buttons = Button::latest()->paginate()->toArray();
//        dd($buttons);
        return view('wechat.button.index',compact('buttons'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){

        return view('wechat.button.create');
    }





//    增加到数据库
    public function store(Request $request)
    {
        Button::create($request->all());
        return redirect()->route('wechat.button.index')->with('success','菜单添加成功');
    }






    public function show(Button $button)
    {
        //
    }






    public function edit(Button $button)
    {
//        dd($button->toArray());
        $button = $button->toArray();
        return view('wechat.button.edit',compact('button'));
    }





    public function update(Request $request, Button $button)
    {
        if (!$request->title){
            return redirect()->back()->with('danger','标题必填');
        }
        $data = $request->all();
        $data['status'] = 0;
        $button->update($data);
        return redirect()->route('wechat.button.index')->with('success','菜单编辑成功');
    }





    public function destroy(Button $button)
    {
        $button->delete();
        return redirect()->route('wechat.button.index')->with('success','菜单删除成功');
    }

    public function push(Button $button,WechatService $wechatService){
        $menu = json_decode($button['data'],true);//dd($menu);
        $res = WeChat::instance('button')->create($menu);
//        dd($res);
        if ($res['errcode'] == 0){
            $button->update(['status'=>1]);
            Button::where('status','!=',$button['id'])->update(['status'=>0]);
            return back()->with('success','菜单推送成功');
        }else{
            return redirect()->back()->with('danger',$res['errmsg']);
        }
    }
}
