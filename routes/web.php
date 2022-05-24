<?php

use Illuminate\Support\Facades\Route;

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

Route::GET('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified'])->group(function () {

    Route::GET('/dashboard', function () {return view('dashboard');})->name('dashboard');

    Route::GET('/reklame','ReklameController@index')->name('reklame.index');
    Route::GET('/reklame/create','ReklameController@create')->name('reklame.create');
    Route::POST('/reklame/create/store','ReklameController@store')->name('reklame.store');
    Route::GET('/reklame/edit/{id}','ReklameController@edit')->name('reklame.edit');
    Route::POST('/reklame/edit/update/{id}','ReklameController@edit')->name('reklame.update');
    Route::GET('/reklame/edit/delete/{id}','ReklameController@destroy')->name('reklame.delete');
    
    Route::GET('/order','OrderController@index')->name('order.index');
    Route::GET('/order/create','OrderController@create')->name('order.create');
    Route::POST('/order/create/store','OrderController@store')->name('order.store');
    Route::GET('/order/edit/{id}','OrderController@edit')->name('order.edit');
    Route::POST('/order/edit/update/{id}','OrderController@edit')->name('order.update');
    Route::GET('/order/edit/delete/{id}','OrderController@destroy')->name('order.delete');

    Route::GET('/brand','BrandController@index')->name('brand.index');
    Route::GET('/brand/create','BrandController@create')->name('brand.create');
    Route::POST('/brand/create/store','BrandController@store')->name('brand.store');
    Route::GET('/brand/edit/{id}','BrandController@edit')->name('brand.edit');
    Route::POST('/brand/edit/update/{id}','BrandController@edit')->name('brand.update');
    Route::GET('/brand/edit/delete/{id}','BrandController@destroy')->name('brand.delete');

});
