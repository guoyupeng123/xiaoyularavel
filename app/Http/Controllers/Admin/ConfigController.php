<?php

namespace App\Http\Controllers\Admin;

use App\Models\Config;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ConfigController extends Controller
{
//    加载模板页面
    public function edit($name){
        hdcon('Admin-config');
        //测试 hd_config函数
        //dd(hd_config('uploasasdad.size'));
        //获取配置项数据
        //firstOrNew手册位置: Eloquent ORM-->入门
        $config = Config::firstOrNew(
            ['name'=>$name]
        );
        //dd($config['data']);

//      由参数指定引入哪个模板
        return view('admin.config.edit_'.$name,compact('name','config'));
    }
//    执行数据添加更新
    public function update($name,Request $request){
        hdcon('Admin-config');
//      updateOrCreate  执行添加或者更新
//      updateOrCreate 在手册的  Eloquent ORM->入门->其他创作方法->updateOrCreate
        Config::updateOrCreate(
            ['name' => $name],//执行条件
//            因为$request->all()是个数据,而我们存入数据库里面的数据是个json数据,直接使用会报错
//            需要借助模型属性 cates  在config模型里面
            ['name' => $name,'data'=>$request->all()]
        );
//      本函数用于修改.env配置文件，更新的配置项必须在.env文件中存在。
        hd_edit_env($request->all());
        //跳转
        return back()->with('success','配置项更新成功');
    }
}
