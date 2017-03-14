<?php

Route::group(['middleware' => 'web', 'prefix' => 'cart', 'namespace' => 'Modules\Cart\Http\Controllers'], function()
{
    // Go to cart page
    Route::get('/', ['as'=>'cart','uses'=>'CartController@index']);

    // Go to checkout page
    Route::get('checkout', ['as'=>'cart.checkout','uses'=>'CartController@index']);

    // Route for cart widget list
    Route::get('widget', ['as'=>'cart.widget','uses'=>'CartController@widget']);

    // Add an item to cart
    Route::post('/add', ['as'=>'cart.add', 'uses'=>'CartController@add']);

    // Remove an item from cart
    Route::get('/remove/{key}', ['as'=>'cart.remove', 'uses'=>'CartController@remove']);
});
