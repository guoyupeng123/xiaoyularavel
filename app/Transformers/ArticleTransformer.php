<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/12/8 0008
 * Time: 12:06
 */

namespace App\Transformers;


use App\Models\Article;
use League\Fractal\TransformerAbstract;

class ArticleTransformer extends TransformerAbstract
{
    # 定义可以include可使⽤的字段
//    这里是栏目模型
    protected $availableIncludes = ['category', 'user'];


//    如果没有定义include使用字段,则走这个方法
    public function transform(Article $article)
    {
        $content =$article['content'];

        return [
            'id' => $article['id'],
            'title' => $article['title'],
            'content' => str_limit($content, 110, '... ... '),
            'text' => $article['content'],
            'created_at' => $article->created_at->format('Y-m-d')
        ];
    }

//  若有include参数,则走这个方法,在每个数据中关联一个栏目的模型
//   注意方法的命名 include+参数命名,驼峰命名
    public function includeCategory(Article $article)
    {
        return $this->item($article->category, new CategoryTransformer());
    }

    public function includeUser(Article $article)
    {
        return $this->item($article->user, new UserTransformer());
    }


}