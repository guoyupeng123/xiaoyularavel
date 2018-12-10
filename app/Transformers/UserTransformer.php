<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/12/8 0008
 * Time: 13:34
 */

namespace App\Transformers;


use App\Models\Category;
use App\User;
use League\Fractal\TransformerAbstract;
//继承TransformerAbstract
class UserTransformer extends TransformerAbstract{

//  返回单个数据的栏目数据
    public function transform(User $user)
    {
        return [
            'id' => $user['id'],
            'name' => $user['name'],
            'email' => $user['email'],
            'icon' => $user['icon'],
        ];
    }

}