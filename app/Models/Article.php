<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Laravel\Scout\Searchable;
class Article extends Model{
//      new 日志
        use LogsActivity;
//      搜索
        use Searchable;
        protected $fillable = ['title', 'content','id'];
//      设置记录动态的属性
//      protected static $logAttributes = ['name', 'text'];
//      如果需要记录所有$fillable设置的填充属性，可以使用
        protected static $logFillable = true;
//      日志填充的条件 比如删除 更新 增加 和观察者相似
        protected static $recordEvents = ['created','updated'];
//      自定义日志名称
        protected static $logName = 'article';





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

        //定义评论通知  通知 已读之后跳转链接
        public function getLink($param){
//          $this  -> CommentNotify.php 里面
            return route('home.article.show',$this).$param;
        }

}
