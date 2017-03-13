<?php

Route::group(['middleware' => 'web', 'prefix' => 'cart', 'namespace' => 'Modules\Cart\Http\Controllers'], function()
{
    Route::get('/', 'CartController@index');
    Route::get('widget', 'CartController@widget');

    Route::post('/add', ['as'=>'cart.add', 'uses'=>'CartController@add']);
    Route::get('/remove/{key}', ['as'=>'cart.remove', 'uses'=>'CartController@remove']);
});
