<?php

namespace App\Providers;

use App\Models\News;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // 添加.html模板后缀支持
        View::addExtension('html','blade');
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::directive('list', function ($expression) {
            print_r($expression);
            $newsList = json_decode($expression, true);
            return \view($newsList['template'], ['newslist' => $newsList]);
        });

    }
}
