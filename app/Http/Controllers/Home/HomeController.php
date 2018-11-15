<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;

class HomeController extends Controller {
// 渲染膜版页面--网站首页
    public function index(){
        return view('home.home.index');
    }
}