<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Banner;
use Illuminate\Http\Request;
use Spatie\Activitylog\Models\Activity;

class HomeController extends Controller {
// 渲染膜版页面--网站首页
    public function index(){
//      获得所有动态
//        latest  排序
        $artives = Activity::latest()->where('log_name','article')->paginate(5);
//        评论动态
        $pingluns = Activity::latest()->where('log_name','comment')->limit(4)->get();
//        foreach ($artives as $artive){
//            dump($artive);
//        }
//        die();

//      轮播图
        $banner = Banner::all();

        return view('home.home.index',compact('artives','pingluns','banner'));
    }
//    查询
    public function search(Request $request){
//        dd($request->toArray());
        $ss = $request->query('search');
//        dd($request->search);
        $article = Article::search($ss)->paginate(6);;
        return view('home.home.search',compact('article'));
    }
}