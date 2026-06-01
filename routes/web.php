<?php

use App\Http\Controllers\backend\categoryController;
use App\Http\Controllers\backend\orderController;
use App\Http\Controllers\backend\productController;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\frontendController;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', [frontendController::class, 'index']);
Route::get('/category/{id}', [frontendController::class, 'category']);
Route::get('/cart', [frontendController::class, 'cart']);
Route::get('/checkout', [frontendController::class, 'checkout']);
Route::get('/contact', [frontendController::class, 'contact']);
Route::get('/product', [frontendController::class, 'product']);
Route::get('/test/{id}', [frontendController::class, 'test']);  //ekhane test product details er jonno
Route::get('add-to-cart/{id}', [frontendController::class, 'addToCart']);
Route::post('add-to-cart-details/{id}', [frontendController::class, 'addToCartDetails']);
Route::get('remove-from-cart/{id}', [frontendController::class, 'removeFromCart']);
Route::get('/search-products', [frontendController::class, 'searchProducts']);

//order rutes
Route::post('/confirm-order', [frontendController::class, 'comfirmOrder']);
Route::get('/confirmed-orders/{invoice_no}', [frontendController::class, 'thankYou']);

Auth::routes();

Route::middleware(['auth'])->prefix('admin')->group(function () {

    // Admin Dashboard
    Route::get('/dashboard', [dashboardController::class, 'dashboard']);

    // Category Routes
    Route::get('/category/list', [categoryController::class, 'categoryList']);
    Route::get('/category/add', [categoryController::class, 'categoryAdd']);
    Route::post('/category/store', [categoryController::class, 'categoryStore']);
    Route::get('/category/edit/{slug}', [categoryController::class, 'categoryEdit']);
    Route::post('/category/update/{slug}', [categoryController::class, 'categoryUpdate']);
    Route::get('/category/delete/{slug}', [categoryController::class, 'categoryDelete']);

    // Product Routes
    Route::get('/product/list', [productController::class, 'productList']);
    Route::get('/product/add', [productController::class, 'productAdd']);
    Route::post('/product/store', [productController::class, 'productStore']);
    Route::get('/product/edit/{id}', [productController::class, 'productEdit']);
    Route::post('/product/update/{id}', [productController::class, 'productUpdate']);
    Route::get('/product/delete/{id}', [productController::class, 'productDelete']);

    // Order Routes
    Route::get('/all-orders/list', [orderController::class, 'allOrdersList']);
    Route::get('/order/edit/{id}', [orderController::class, 'orderEdit']);
    Route::get('/order/update-status/{status}/{id}', [orderController::class, 'orderUpdateStatus']);
    Route::post('/order/update/{id}', [orderController::class, 'orderUpdate']);
    Route::get('/status-wise-order/{status}', [orderController::class, 'statusWiseOrder']);

});

