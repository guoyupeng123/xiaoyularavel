<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
//      定义文章与用户的的关联
        public function user(){
//            return $this->belongsTo(User::class,'user_id','id');
//            return $this->belongsTo(关联那个表,'依据','本身的id');
//            简写
            return $this->belongsTo(User::class);
        }

//      定义文章与文章栏目的关联
        public function category(){
            return$this->belongsTo(Category::class);
        }
}
