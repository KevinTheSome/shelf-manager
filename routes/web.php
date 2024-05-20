<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\OrdersControllers;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Product;

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => 'guest'], function () {
    Route::get('/login',[AuthController::class, 'login'])->name('login');
    Route::get('/register',[AuthController::class, 'register'])->name('register');
    Route::post('/login',[AuthController::class, 'loginUser'])->name('loginUser');
    Route::post('/register',[AuthController::class, 'registerUser'])->name('registerUser');
});
 
Route::get('/dashboard',[DashboardController::class, 'index'])->name('dashboard');

Route::get('/orders',[OrdersControllers::class, 'index'])->name('orders');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/logout',[AuthController::class, 'logout'])->name('logout');

    //7 restul aciones for products
    Route::get('/product/index', [Product::class, 'index']);
    Route::get('/product/{id}', [Product::class, 'show']);
    Route::post('/product/create', [Product::class, 'create']);
    Route::get('/product/new', [Product::class, 'new']);
    Route::get('/product/{id}/edit', [Product::class, 'edit']);
    Route::put('/product/{id]', [Product::class, 'update']);
    Route::delete('/product/{id}', [Product::class, 'destroy']);
});
