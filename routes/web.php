<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;

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

Route::get('/', [MainController::class, 'index'])->name('main');

Route::get('profile', [App\Http\Controllers\ProfileController::class, 'edit'])->name('profile.edit');

Route::put('profile', [App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');

//Route::resource('products', 'App\Http\Controllers\ProductController');

//Route::get('products', [ProductController::class, 'index'])->name('products.index');

//Route::get('products/create', [ProductController::class, 'create'])->name('products.create');

//Route::post('products', [ProductController::class, 'store'])->name('products.store');

//Route::get('products/{product}', [ProductController::class, 'show'])->name('products.show');

//Route::get('products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');

//Route::match(['put', 'patch'], 'products/{product}', [ProductController::class, 'update'])->name('products.update');

//Route::delete('products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');

Route::resource('products.carts', 'ProductCartController')->only(['store', 'destroy']);

Route::resource('carts', 'CartController')
    ->only(['index'])
    ->middleware(['verified']);

Route::resource('orders', 'OrderController')
    ->only(['create', 'store'])
    ->middleware(['verified']);

Route::resource('orders.payments', 'OrderPaymentController')->only(['create', 'store']);

Auth::routes([
    'verify' => true,
    //'reset' => false,
]);

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
