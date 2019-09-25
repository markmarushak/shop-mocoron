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




Auth::routes();

Route::group(['namespace' => 'Pages'], function (){

    Route::get('/', 'PagesController@index')->name('home');
    Route::get('product/{id}', 'PagesController@product')->name('show-product');

});

Route::group(['prefix' => 'cabinet', 'namespace' => 'Cabinet', 'middleware' => 'auth'], function (){
    Route::get('/', 'CabinetController@index')->name('cabinet');
    Route::get('product', 'CabinetController@product')->name('cabinet-product');
    Route::post('create', 'CabinetController@createProduct')->name('create-product');
    Route::delete('delete', 'CabinetController@deleteProduct')->name('delete-product');

    Route::get('account', 'CabinetController@edit')->name('edit-account');
});