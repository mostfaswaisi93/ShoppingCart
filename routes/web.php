<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('store');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/store', 'HomeController@store')->name('store');

Route::get('/products', 'ProductController@index')->name('product.index');
Route::delete('/products/{product}', 'ProductController@destroy')->name('product.remove');
Route::put('/products/{product}', 'ProductController@update')->name('product.update');

Route::get('/addToCart/{product}', 'ProductController@addToCart')->name('cart.add');
Route::get('/shopping-cart', 'ProductController@showCart')->name('cart.show');
Route::get('/checkout/{amount}', 'ProductController@checkout')->name('cart.checkout');
Route::post('/charge', 'ProductController@charge')->name('cart.charge');
Route::get('/checkout/{amount}', 'ProductController@checkout')->name('cart.checkout')->middleware('auth');

Route::get('/orders', 'OrderController@index')->name('order.index');

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
