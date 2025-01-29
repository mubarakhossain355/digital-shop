<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DigitalShopController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\UnitController;

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
    Route::resource('category',CategoryController::class);
    Route::resource('sub-category',SubCategoryController::class);
    Route::resource('brand',BrandController::class);
    Route::resource('unit',UnitController::class);
});
