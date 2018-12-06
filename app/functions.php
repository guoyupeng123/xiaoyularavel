<?php

//函数助手
//如果  hd_config 函数不存则创建函数
if (!function_exists('hd_config')){
    function hd_config($var){
//      按 '.'截取成数组
        $var = explode('.',$var);
//      设置常量储存缓存文件
        static $cache = [];
//      判断$cache是否为空
        if (!$cache){
            //清空所有缓存
            //Cache::flush();
            //获取观察者里缓存中config_cache数据,如果数据不存在,那么会以第二个参数作为默认值,重新获取一下数据,储存进缓存
//            Cache::get()  手册->缓存系统->从缓存中获取数据
            $cache = Cache::get('config_cache',function (){
                return \App\Models\Config::pluck('data', 'name');
            });
        }
//      返回数据
        return $cache[$var[0]][$var[1]]??'';
    }
}


//判断是否有指定权限
function hdcon($can){
    if (!auth()->user()->can($can)){
        throw  new \App\Exceptions\AuthException('你敢进来打死你');
    }
}