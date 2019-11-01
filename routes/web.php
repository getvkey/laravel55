<?php

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

/**
 * resuful模块
 */
// Route::get('/blog', '\Modules\Restful\Http\Controllers\RestfulController@index');

//使用Route的resource()静态方法，你可以创建多个路由来暴露 资源的多种访问操作。这些路由都映射到ContactController的不同 方法上
// Route::resource('restful', '\Modules\Restful\Http\Controllers\RestfulController');