<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ShippingController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\OfferController;
use App\Http\Controllers\Front\HomeController;
use App\Models\Product;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/', [HomeController::class , 'getProducts'])->name('home');
Route::get('/invoice', [HomeController::class , 'getInvoice'])->name('invoice');

Route::get('/dashboard',[ProductController::class , 'index'])
    ->middleware(['auth','role:administrator'])
    ->name('dashboard');

// Route Shipping
Route::middleware(['auth','role:administrator'])
    ->name('shipping.')
    ->prefix('shipping')
    ->controller(ShippingController::class)
    ->group(function(){
        Route::get('/index','index')->name('index');
        Route::get('/create','create')->name('create');
        Route::post('/store','store')->name('store');
        Route::get('/{id}/edit','edit')->name('edit');
        Route::put('/update/{id}','update')->name('update');
        Route::delete('/delete/{id}','destroy')->name('delete');
        
    });

// Route Product
Route::middleware(['auth','role:administrator'])
    ->name('product.')
    ->prefix('product')
    ->controller(ProductController::class)
    ->group(function(){

        Route::get('/create','create')->name('create');
        Route::post('/store','store')->name('store');
        Route::get('/{id}/edit','edit')->name('edit');
        Route::put('/update/{id}','update')->name('update');
        Route::delete('/delete/{id}','destroy')->name('delete');
        
    });

// Route Offer
Route::middleware(['auth','role:administrator'])
    ->name('offer.')
    ->prefix('offer')
    ->controller(OfferController::class)
    ->group(function(){
        Route::get('/index','index')->name('index');
        Route::get('/create','create')->name('create');
        Route::post('/store','store')->name('store');
        Route::get('/{id}/edit','edit')->name('edit');
        Route::put('/update/{id}','update')->name('update');
        Route::delete('/delete/{id}','destroy')->name('delete');
        
    });

// Route Invoice
Route::get('/index/invoices',[InvoiceController::class , 'index'])->middleware(['auth','role:administrator'])->name('invoice.index');
Route::post('/create/invoice',[InvoiceController::class , 'store'])->name('invoice.store');




Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
