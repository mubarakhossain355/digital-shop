<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DigitalShopController;
use App\Http\Controllers\SubCategoryController;

Route::get('/', [DigitalShopController::class,'index'])->name('home');
Route::get('/product-category', [DigitalShopController::class,'category'])->name('category');
Route::get('/product-detail', [DigitalShopController::class,'product'])->name('product');



// Backend Routes
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', [DashboardController::class,'dashboard'])->name('dashboard');
    Route::resource('productCategory',CategoryController::class);
    Route::resource('sub-category',SubCategoryController::class);
});
