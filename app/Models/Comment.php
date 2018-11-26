<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
//    关联用户表
    public function user(){
//        由于一个用户可以发表多个评论，在这里是多对一，也就是一对多反向
        return $this->belongsTo(User::class);
    }
}
