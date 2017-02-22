<?php
// Display all SQL executed in Eloquent
// DB::listen(function ($event) {
//     dump($event->sql);
//     dump($event->bindings);
// });

// \Debugbar::enable();
// \Debugbar::disable();
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
// lets try a wildcard...

Route::group(['as' => 'site.'], function()
{
	Route::get('/', ['as'=>'home', 'uses'=>'SiteController@index']);

    // Using route model binding and wildcard, access hierarchic URL and parse as eloquent model of the category
    Route::get('/category/{category}', ['as'=>'category', 'uses'=>'SiteController@category'])
        ->where('category', '(.*)');

    // Single product with parent
    // with Category or Branch
    Route::get('{parent}/{product}', ['as'=>'product', 'uses'=>'SiteController@product'])
        ->where('product', '(.*)')->where('parent', '(.*)');


});
