<?php

namespace App\Http\Controllers\Api;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends CommentController
{
    //    获取所有的栏目数据
    public function categories(){
//        睡眠3s
//        sleep(3);
        $limit = \request()->query('limit',5);

//        返回缴纳数据
        return $this->response->array(Category::limit($limit)->get());
    }
}
