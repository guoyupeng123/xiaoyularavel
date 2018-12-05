<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ResponseNews extends Model
{
    protected $fillable = [
        'data','rule_id'
    ];

    public function rule(){
       return $this->belongsTo(Rule::class);
    }
}
