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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::namespace('Backend') -> name('backend.') -> middleware('auth')->prefix('backend/')->  group(function() {
    /*route for product controller*/
    Route::resource('product','ProductController');
    Route::resource('sale','SaleController');
    Route::get('product/create','ProductController@create')->name('product.create');
    Route::post('product','ProductController@store')->name('product.store');
    Route::get('product','ProductController@index')->name('product.index');
    Route::delete('product/{id}','ProductController@destroy')->name('product.destroy');
    Route::get('product/{id}','ProductController@show')->name('product.show');
    Route::get('product/{id}/edit','ProductController@edit')->name('product.edit');
    Route::put('product/{id}','ProductController@update')->name('product.update');
    Route::get('sale/create','SaleController@create')->name('sale.create');
    Route::post('sale','SaleController@store')->name('sale.store');
    Route::get('sale','SaleController@index')->name('sale.index');
    Route::delete('sale/{id}','SaleController@destroy')->name('sale.destroy');
    Route::get('sale/{id}','SaleController@show')->name('sale.show');
    Route::get('sale/{id}/edit','SaleController@edit')->name('sale.edit');
    Route::put('sale/{id}','SaleController@update')->name('sale.update');
    Route::get('user/create','UserController@create')->name('user.create');
    Route::post('user','UserController@store')->name('user.store');
    Route::get('user','UserController@index')->name('user.index');
    Route::delete('user/{id}','UserController@destroy')->name('user.destroy');
    Route::get('user/{id}','UserController@show')->name('user.show');
    Route::get('user/{id}/edit','UserController@edit')->name('user.edit');
    Route::put('user/{id}','UserController@update')->name('user.update');
//    Route::get('user/print','SaleController@print')->name('user.print');
});
