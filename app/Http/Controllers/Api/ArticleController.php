<?php

namespace App\Http\Controllers\Api;

use App\Models\Article;
use Illuminate\Http\Request;
use App\Transformers\ArticleTransformer;


class ArticleController extends CommentController
{
//    获取所有的文章数据
      public function articles(){
//          返回回去的是个数组
//          return Article::all();
//          用了response  返回回去的是json数据
//          return $this->response->array(Article::find(1));
//          在api手册里面,响应结果
//          return response()->json(['error' => 'Unauthorized'], 401);
//          return $this->response->error('This is an error.', 404);
//          截取10个数据,未定义  默认为10个
          //api请求请求文章数据条数
          $limit = \request()->query('limit',10);
          //api请求携带的栏目id
          $category_id = \request()->query('cid');

//          判断栏目id是否存在
          if ($category_id){
//              如果存在则获取当前栏目里的数据
              $articles = Article::latest()->where('category_id',$category_id)->paginate($limit);
          }else{
//              不存在则取出数据条数  $limit 有默认值
              $articles = Article::latest()->paginate($limit);
          }

//         数据返回
//          ArticleTransformer() 里面携带了栏目数据,以及用户数据
          //dingo中的Transformers
//          collection  做分页不能使用
          return $this->response->paginator($articles,new \App\Transformers\ArticleTransformer());

        }
//      获取单个文章的数据
        public function oneArticle($id){
          return $this->response->item(Article::find($id),new \App\Transformers\ArticleTransformer());
        }


}
