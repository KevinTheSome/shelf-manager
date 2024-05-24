<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => 'guest'], function () {
    Route::get('/register',[AuthController::class, 'register'])->name('register');
    Route::post('/registerUser',[AuthController::class, 'registerUser'])->name('registerUser');
    Route::get('/login',[AuthController::class, 'login'])->name('login');
    Route::post('/loginUser',[AuthController::class, 'loginUser'])->name('loginUser');
});
 
Route::group(['middleware' => 'auth'], function () {
    Route::get('/logout',[AuthController::class, 'logout'])->name('logout');
    Route::get('/dashboard',[DashboardController::class, 'index'])->name('dashboard');

    //reports
    Route::get('/report',[ReportController::class, 'report'])->name('report');

    //7 restul aciones for products
    // Route::get('/products/index', [ProductController::class, 'index']);
    // Route::get('/products/{id}', [ProductController::class, 'show']);
    Route::get('/products/create', [ProductController::class, 'create']);
    Route::post('/products/store', [ProductController::class, 'store']);
    // Route::get('/products/{id}/edit', [ProductController::class, 'edit']);
    // Route::put('/products/{id]', [ProductController::class, 'update']);
    // Route::delete('/products/{id}', [ProductController::class, 'destroy']);

    //orders
    Route::get('/orders',[OrdersController::class, 'orders'])->name('orders');
    Route::get('/orders/new', [OrdersController::class, 'new']);
    Route::post('/orders/create', [OrdersController::class, 'create']);
});
