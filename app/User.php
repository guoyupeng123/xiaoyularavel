<?php

namespace App;

use App\Models\Attachment;
use App\Models\Collect;
use App\Models\Zan;
use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Symfony\Component\VarDumper\Cloner\Data;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable,HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','icon'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    protected function getIconAttribute($key){
        return $key?:asset('org/images/user.jpg');
    }
//    关联附件attachment
    public function attachment(){
        return $this->hasMany(Attachment::class);
    }

//  获取指定用户粉丝
    public function fans(){
//      通过第三个参数找第四个参数
        return $this->belongsToMany(User::class,'followers','user_id','following_id');
    }

//  获取关注的人
    public function following(){
        return $this->belongsToMany(User::class,'followers','following_id','user_id');
    }

//    一对多关联收藏模型，指的是一个用户可以收藏很多文章
    public function collect(){
        return $this->hasMany(  Collect::class);
    }

    //用户关联 zan
    public function zan(){
        return $this->hasMany(Zan::class);
    }

//  消息通知排序
    public function notifications()
    {
        return $this->morphMany(DatabaseNotification::class, 'notifiable')->orderBy('read_at', 'asc')->orderBy('created_at', 'desc');
    }



}
