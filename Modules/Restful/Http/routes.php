<?php

Route::group(['middleware' => 'web', 'prefix' => 'restful', 'namespace' => 'Modules\Restful\Http\Controllers'], function()
{
    Route::get('/', 'RestfulController@index');
});
