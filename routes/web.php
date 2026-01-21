<?php

use App\Http\Controllers\frontendController;
use Illuminate\Support\Facades\Route;

Route::get('/', [frontendController::class, 'index']);
Route::get('/category', [frontendController::class, 'category']);
Route::get('/cart', [frontendController::class, 'cart']);
Route::get('/checkout', [frontendController::class, 'checkout']);
Route::get('/contact', [frontendController::class, 'contact']);
Route::get('/product', [frontendController::class, 'product']);
Route ::get('/details', [frontendController::class, 'productDetails']);