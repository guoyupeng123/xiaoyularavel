<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/12/8 0008
 * Time: 13:34
 */

namespace App\Transformers;


use App\Models\Category;
use League\Fractal\TransformerAbstract;

class CategoryTransformer extends TransformerAbstract{

//  返回单个数据的栏目数据
    public function transform(Category $category)
    {
        return [
            'id' => $category['id'],
            'title' => $category['title'],
        ];
    }

}