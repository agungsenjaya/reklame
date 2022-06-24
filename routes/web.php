<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ReklameController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\PortofolioController;

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

// Route::GET('/', function () {
//     return view('welcome');
// });

Route::GET('/',[ClientController::class,'home'])->name('home');
Route::GET('reklame',[ClientController::class,'reklame'])->name('reklame');
Route::GET('reklame/view/{id}',[ClientController::class,'reklame_view'])->name('reklame.view');
Route::GET('about',[ClientController::class,'about'])->name('about');
Route::GET('contact',[ClientController::class,'contact'])->name('contact');
Route::POST('contact/send',[ClientController::class,'contact_send'])->name('contact.send');
Route::GET('client',[ClientController::class,'brand'])->name('client');
Route::GET('portofolio',[ClientController::class,'portofolio'])->name('portofolio');
Route::GET('portofolio/view/{id}',[ClientController::class,'portofolio_view'])->name('portofolio.view');


Route::GROUP(['prefix' => 'admin',  'middleware' => ['auth:sanctum',config('jetstream.auth_session'),'verified','cors']], function(){
    
    Route::GET('/dashboard',[AdminController::class,'index'])->name('dashboard');
    Route::GET('/contact',[AdminController::class,'contact'])->name('contact.index');
    
    Route::GET('/reklame',[ReklameController::class,'index'])->name('reklame.index');
    Route::GET('/reklame/create',[ReklameController::class,'create'])->name('reklame.create');
    Route::POST('/reklame/create/store',[ReklameController::class,'store'])->name('reklame.store');
    Route::GET('/reklame/edit/{id}',[ReklameController::class,'edit'])->name('reklame.edit');
    Route::POST('/reklame/edit/update/{id}',[ReklameController::class,'update'])->name('reklame.update');
    Route::GET('/reklame/edit/delete/{id}',[ReklameController::class,'destroy'])->name('reklame.delete');

    Route::GET('/order',[OrderController::class,'index'])->name('order.index');
    Route::POST('/order/create/store',[OrderController::class,'store'])->name('order.store');
    Route::GET('/order/edit/{id}',[OrderController::class,'edit'])->name('order.edit');
    Route::POST('/order/edit/update/{id}',[OrderController::class,'update'])->name('order.update');
    Route::GET('/order/edit/delete/{id}',[OrderController::class,'destroy'])->name('order.delete');

    Route::GET('/brand',[BrandController::class,'index'])->name('brand.index');
    Route::GET('/brand/create',[BrandController::class,'create'])->name('brand.create');
    Route::POST('/brand/create/store',[BrandController::class,'store'])->name('brand.store');
    Route::GET('/brand/edit/{id}',[BrandController::class,'edit'])->name('brand.edit');
    Route::POST('/brand/edit/update/{id}',[BrandController::class,'update'])->name('brand.update');
    Route::GET('/brand/edit/delete/{id}',[BrandController::class,'destroy'])->name('brand.delete');
    
    Route::GET('/portofolio',[PortofolioController::class,'index'])->name('portofolio.index');
    Route::GET('/portofolio/create',[PortofolioController::class,'create'])->name('portofolio.create');
    Route::POST('/portofolio/create/store',[PortofolioController::class,'store'])->name('portofolio.store');
    Route::GET('/portofolio/edit/{id}',[PortofolioController::class,'edit'])->name('portofolio.edit');
    Route::POST('/portofolio/edit/update/{id}',[PortofolioController::class,'update'])->name('portofolio.update');
    Route::GET('/portofolio/edit/delete/{id}',[PortofolioController::class,'destroy'])->name('portofolio.delete');
    Route::POST('/portofolio/upload',[PortofolioController::class,'upload'])->name('portofolio.upload');

});

require_once __DIR__.'/jetstream.php';