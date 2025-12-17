<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductsController;

Route::get('/',[HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'products'], function() {
    Route::get('/', [ProductsController::class, 'index'])->name('products');
    Route::get('create',[ProductsController::class, 'create'])->name('productsCreate');
    Route::post('store', [ProductsController::class, 'store'])->name('productsStore');
    Route::get('edit/{id}', [ProductsController::class, 'edit']) ->name('productsEdit');
    Route::put('update/{id}', [ProductsController::class, 'update'])->name('productsUpdate');
});