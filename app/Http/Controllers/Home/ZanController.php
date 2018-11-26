<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ZanController extends Controller{
    //点赞和取消赞
   public function  make(Request $request){
//     dd($request->toArray());
//     接收get参数
       $id = $request->query('id');//dd($id);
       $type = $request->query('type');//dd($type);
//     根据get参数type  组合模型类class名
       $class = 'App\Models\\'.ucfirst($type);//dd($class);

//     相当于
//       $model = article::class;
//       $model = comment::class;
//       $model 文章或者评论
       $model = $class::find($id);
       //dd($model);

//       获得当前文章或者评论，所有的点赞模型的数据
//       也就是说，$model是当前拿到了当前文章数据的模型
//       dd($model->zan->toArray());
//       返回  zan 模型  或者 null
//       也就是所，现在拿到了给当前文章点过赞的所有数据，where判断条件，找出当前文章有没有登录用户一样的id，如果有则返回zan模型，若没有则返回null
//       dd($model->zan->where('user_id',auth()->id())->first());
//       如果有zan模型
       if ($zan = $model->zan->where('user_id',auth()->id())->first()){
//         执行删除
           $zan->delete();
       }else{
//           执行添加
//           $model->zan()->create();
           $model->zan()->create(['user_id'=>auth()->id()]);
       }

//     返回的是指定位置
       return redirect($request->query('url').'#dianzan');

   }
}
