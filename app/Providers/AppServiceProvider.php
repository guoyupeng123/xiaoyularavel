<?php

namespace App\Providers;

use App\Models\Comment;
use App\Models\Config;
use App\Observers\CommentObserver;
use App\Observers\Configobserver;
use App\Observers\UserObserver;
use App\User;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        //**************注册观察者************
        User::observe(UserObserver::class);

//      消息通知
        Comment::observe(CommentObserver::class);
//      后台配置项
        Config::observe(Configobserver::class);
        //**************注册观察者************


    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if ($this->app->environment() !== 'production') {
            $this->app->register(\Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class);
        }
    }
}
