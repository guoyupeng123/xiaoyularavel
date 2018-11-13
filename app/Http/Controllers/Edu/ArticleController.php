<?php

namespace App\Http\Controllers\Edu;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArticleController extends Controller
{
//  index首页
    public function index(){
        return view('edu.article.index');
    }
//  数据增加页面
    public function create(){
        return view('edu.article.create');
    }
//  数据保存
    public function store(Request $request){
//        获取请求的所有数据
        dd($request->all());
    }
}