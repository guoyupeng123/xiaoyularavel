<?php

namespace App\Observers;

use App\Models\Config;

class Configobserver
{

    public function created()
    {
//      增加自动调用
        $this->saveConfigToCache();
    }

    public function updated()
    {
//      更新时自动调用
        $this->saveConfigToCache();
    }
    protected function saveConfigToCache(){
//      Cache::forever('key', 'value');  手册地址->缓存系统->永久存储数据
//      config_cache 只是随意起的名字
//      pluck 手册->查询构造器->检索列值列表
        //pluck('data','value') 获取两列数据,data 作为键名  ,value 键值
        \Cache::forever('config_cache',Config::pluck('data', 'name'));
    }
}
