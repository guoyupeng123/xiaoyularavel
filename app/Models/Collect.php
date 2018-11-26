<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Collect extends Model
{
    public $fillable = [
        'user_id'
    ];

//  反向关联
    public function article(){
//        简写
        return $this->morphTo('collect');
    }
}
