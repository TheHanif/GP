<?php

Route::group(['middleware' => 'web', 'prefix' => 'manufacturer', 'namespace' => 'Modules\Manufacturer\Http\Controllers'], function()
{
    Route::get('/', 'ManufacturerController@index');
});
