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
    Route::get('/orders',[OrdersController::class, 'index'])->name('orders');
    Route::get('/report',[ReportController::class, 'index'])->name('report');
    //7 restul aciones for products
    Route::get('/product/index', [ProductController::class, 'index']);
    Route::get('/product/{id}', [ProductController::class, 'show']);
    Route::get('/product/create', [ProductController::class, 'create']);
    Route::get('/product/new', [ProductController::class, 'new']);
    Route::get('/product/{id}/edit', [ProductController::class, 'edit']);
    Route::put('/product/{id]', [ProductController::class, 'update']);
    Route::delete('/product/{id}', [ProductController::class, 'destroy']);

    Route::get('/orders/new', [OrdersController::class, 'new']);
    Route::post('/orders/create', [OrdersController::class, 'create']);
});
