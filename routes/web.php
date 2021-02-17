<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('{module}/{filename}', 'NewsController@index');
Route::get('{module}/list/{filename}', 'NewsController@list');
Route::get('{module}/detail/{filename}', 'NewsController@detail');
