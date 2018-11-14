<?php

namespace App\Http\Controllers\Edu;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArticleController extends Controller{


    public $sd;
//  index首页
    public function index(){
        return view('edu.article.index');
    }
//  数据增加页面
    public function create(){
        $this->sd = $_POST;
        $sde = $this->sd;
        return view('edu.article.create',compact('sde'));
    }
//  数据保存
    public function store(Request $request){
//        获取请求的所有数据
        dd($request->all());
    }
}