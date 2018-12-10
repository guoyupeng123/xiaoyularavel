<?php

namespace App\Http\Controllers\Api;

use App\Models\Banner;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BannerController extends CommentController
{
//  获取轮播数据
    public function banner(){

        return $this->response->array(Banner::all());
    }
}
