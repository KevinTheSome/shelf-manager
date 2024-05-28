<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ShelfController;
use App\Http\Controllers\ShelfStorageController;


Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => 'guest'], function () {
    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/registerUser', [AuthController::class, 'registerUser'])->name('registerUser');
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/loginUser', [AuthController::class, 'loginUser'])->name('loginUser');
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    //reports
    Route::get('/report', [ReportController::class, 'report'])->name('report');

    //7 restul aciones for products
    Route::get('/products/index', [ProductController::class, 'index']);
    // Route::get('/products/{id}', [ProductController::class, 'show']);
    Route::get('/products/create', [ProductController::class, 'create']);
    Route::post('/products/store', [ProductController::class, 'store']);
    Route::get('/products/{id}/edit', [ProductController::class, 'edit']);
    Route::put('/products/{id]', [ProductController::class, 'update'])->name('products.update');
    Route::delete('/products/{id}', [ProductController::class, 'destroy']);

    //orders
    Route::get('/orders', [OrdersController::class, 'orders'])->name('orders');
    Route::get('/orders/create', [OrdersController::class, 'create'])->name('create');
    Route::post('/orders/store', [OrdersController::class, 'store']);
    Route::post('/orders/{id}/edit', [OrdersController::class, 'edit']);
    Route::post('/orders/{id}/update', [OrdersController::class, 'update']);
    Route::delete('/orders/{id}/delete', [OrdersController::class, 'delete']);

    //admin
    Route::get('/admin', [OrdersController::class, 'admin'])->name('admin');
    Route::get('/admin/users', [OrdersController::class, 'store']);
    Route::post('/admin/{id}/edit', [OrdersController::class, 'edit']);
    Route::delete('/admin/{id}/delete', [OrdersController::class, 'delete']);

    // shelf
    Route::get('/shelf/index', [ShelfController::class, 'index']);
    Route::post('/shelf/store', [ShelfController::class, 'store']);
    Route::get('/shelf/create', [ShelfController::class, 'create']);
    Route::put('/shelf/{id]', [ShelfController::class, 'update'])->name('shelves.update');
    Route::get('/shelf/{id}/edit', [ShelfController::class, 'edit']);
    Route::delete('/shelf/{id}/delete', [ShelfController::class, 'delete']);

    // shelf storage
    Route::get('/shelf_storage/index', [ShelfStorageController::class, 'index']);
    Route::post('/shelf_storage/new', [ShelfStorageController::class, 'new']);
    Route::get('/shelf_storage/{id}/edit', [ShelfStorageController::class, 'edit'])->name('shelf_storage.edit');
    Route::put('/shelf_storage/{id}', [ShelfStorageController::class, 'update'])->name('shelf_storage.update');
    Route::delete('/shelf_storage/{id}/delete', [ShelfStorageController::class, 'delete'])->name('shelf_storage.delete');
    Route::get('/shelf_storage/create', [ShelfStorageController::class, 'create']);
});
