<?php

namespace App\Http\Controllers\Home;

use App\Models\Collect;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CollectController extends Controller
{
    public function make(Request $request){
//        dd($request->toArray());//打印接受的数据
//        接收get传过来的参数
        $id = $request->query('id');//dd($id);
        $type = $request->query('type');//dd($type);
//        组合路径
        $class = 'App\Models\\'.ucfirst($type);//dd($class);

//        相当于new 类名
//        $class = Collect::class;
//        $class 文章
        $model = $class::find($id);

//        获得当前文章/评论 的所有点赞模型数据
//        dd($class->collect->all());
//        在collect模型表里面查找有没有这条数据
//        返回collect模型 或者 null
//        dd($class->collect->where('user_id',auth()->id())->first);
        if ($collect = $model->collect->where('user_id',auth()->id())->first()){
//            有就删除
            $collect->delete();
        }else{
//            没有就增加
            $model->collect()->create(['user_id'=>auth()->id()]);
        }
        return back();
    }
}
