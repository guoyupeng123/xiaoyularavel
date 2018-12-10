<?php

namespace App\Http\Middleware;

use Closure;

class AdminAuthMiddLeware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next){

//      dd(!auth()->check());
        //auth()->check()   检测用户是否登录
//      如果用户没有登陆并且不是超级管理员,执行跳转
//        if (!auth()->check() || !auth()->user()->can('Admin-admin-index')){
        if(!auth()->check() || auth()->user()->is_admin != 1){
            return redirect()->route('index');
        }
        return $next($request);
    }
}
