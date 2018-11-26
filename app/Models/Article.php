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
            return $this->belongsTo(Category::class);
        }

//      定义article多态关联 关联点赞模型
        public function zan(){
//            定义多态关联的模型，第二个参数  数据迁移文件里面的 zan_id  zan_type
            return $this->morphMany(Zan::class,'zan');
        }

    //  定义多态关联
        public function collect(){
    //        定义多态关联的模型,第二个参数 数据迁移的字段 也就是collect_id collect_type
            return $this->morphMany(Collect::class,'collect');
        }

}
