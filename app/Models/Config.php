<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Config extends Model
{
    protected $fillable=[
        'name','data'
    ];

    //应该被转换成原生类型的属性
    //在手册->Eloquent ORM->修改器->数组 & JSON转换
    protected $casts = [
        'data' => 'array',
    ];



}
