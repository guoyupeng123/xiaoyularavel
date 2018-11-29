<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
class Comment extends Model
{


    use LogsActivity;
    protected $fillable = ['content','article_id'];
    //如果需要记录所有$fillable设置的填充属性，可以使用
    protected static $logFillable = true;
    protected static $recordEvents = ['created'];
    //自定义日志名称
    protected static $logName = 'comment';


//    关联用户表
    public function user(){
//        由于一个用户可以发表多个评论，在这里是多对一，也就是一对多反向
        return $this->belongsTo(User::class);
    }

//  关联article表
//  通过comment评论，找article表
    public function article(){
        return $this->belongsTo(Article::class);
    }


    //定义 zan 多态关联
    public function zan(){
        //第一个参数关联模型,第二个参数跟数据迁移  zan_id  zan_type
        return $this->morphMany(Zan::class,'zan');
    }

}
