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

Route::get('/', 'MainController@home');
Route::get('retail-menu', 'MainController@retail_menu');
Route::get('contact', 'MainController@contact');
Route::get('cakegory/{cakegory}', 'MainController@order_online');
Route::get('bakery/{id}', 'BakeController@detail');
Route::post('bakery/order', 'BakeController@order');
Route::post('checkout', 'BakeController@checkout');
Route::get('cart', 'MainController@cart');
Route::get('removecart/{key}', 'MainController@remove_from_cart');

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
