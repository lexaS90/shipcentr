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

Route::group(['prefix' => 'admin'], function(){
    Route::get('/', 'admin\Index@index')->name('dashboard');
    Route::get('/order', 'admin\Order@get')->name('order_list');
    Route::get('/order/get', 'admin\Order@getOrderJson')->name('order_json');
    
    Route::match(['get','post'],'/order/update/{orderId}','admin\Order@update')
        ->where('orderId', '[0-9]+')
        ->name('order_update');

    Route::match(['get','post'], '/order/remove/{orderId}', 'admin\Order@remove')
        ->where('orderId', '[0-9]+')
        ->name('order_remove');

    Route::match(['get','post'], '/settings', 'admin\Settings@edit')->name('settings');

});

Route::get('/', 'Index@index')->name('home');

Route::post('/upload/add', 'Upload@add');
Route::delete('/upload/remove/{fileName}', 'Upload@remove');
Route::post('/order/add', 'admin\Order@add')->name('order_add');