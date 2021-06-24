<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Panel Routes
|--------------------------------------------------------------------------
*/

Route::get('/', [App\Http\Controllers\Panel\PanelController::class, 'index'])->name('panel');  // /panel

Route::resource('products', 'ProductController');

