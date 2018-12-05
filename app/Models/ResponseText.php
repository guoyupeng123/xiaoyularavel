<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ResponseText extends Model
{
    protected $fillable = [
      'content','rule_id'
    ];

//    关联规则表
    public function rule(){
        return $this->belongsTo(Rule::class);
    }
}
