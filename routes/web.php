<?php

use App\Http\Controllers\backend\categoryController;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\frontendController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', [frontendController::class, 'index']);
Route::get('/category', [frontendController::class, 'category']);
Route::get('/cart', [frontendController::class, 'cart']);
Route::get('/checkout', [frontendController::class, 'checkout']);
Route::get('/contact', [frontendController::class, 'contact']);
Route::get('/product', [frontendController::class, 'product']);
Route ::get('/details', [frontendController::class, 'productDetails']);

Auth::routes();

Route::get('/admin/dashboard', [dashboardController::class, 'dashboard']);


// Category Routes
Route::get('/category/list', [categoryController::class, 'categoryList']);
Route::get('/category/add', [categoryController::class, 'categoryAdd']);
Route::post('/category/store', [categoryController::class, 'categoryStore']);
Route::get('/category/edit/{id}', [categoryController::class, 'categoryEdit']);
Route::post('/category/update/{id}', [categoryController::class, 'categoryUpdate']);
Route::get('/category/delete/{id}', [categoryController::class, 'categoryDelete']);