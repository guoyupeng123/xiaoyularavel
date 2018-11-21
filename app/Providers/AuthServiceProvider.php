<?php

namespace App\Providers;

use App\Models\Article;
use App\Policies\ArticlePoilcy;
use App\Policies\UserPolicy;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
        应用程序的策略映射。
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
//      注册策略
        User::class => UserPolicy::class,
//      注册文章验证策略
        Article::class => ArticlePoilcy::class,
    ];

    /**
     * 注册任何身份验证/授权服务。
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        //Carbon 中文时间
        Carbon::setLocale('zh');

    }
}
