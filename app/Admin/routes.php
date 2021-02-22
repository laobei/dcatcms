<?php

use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;
use Dcat\Admin\Admin;

Admin::routes();

Route::group([
    'prefix'     => config('admin.route.prefix'),
    'namespace'  => config('admin.route.namespace'),
    'middleware' => config('admin.route.middleware'),
], function (Router $router) {

    $router->get('/', 'HomeController@index');

    $router->resource('auth/banners', 'BannerController');
    $router->resource('auth/categories', 'CategorieController');
    $router->resource('auth/blocks', 'BlockController');
    $router->resource('auth/langs', 'LangController');
    $router->resource('auth/news', 'NewController');

});
