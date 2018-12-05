<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rule extends Model
{
    public $fillable = [
        'name','type'
    ];
    //关联关键词
    public function keyword(){
        return $this->hasMany(Keyword::class);
    }
//  关联文字消息表
    public function responseText(){
        return $this->hasMany(ResponseText::class);
    }
//  关联图文消息表
    public function responseNews(){
        return $this->hasMany(ResponseNews::class);
    }
}
