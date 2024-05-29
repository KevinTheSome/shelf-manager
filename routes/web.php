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
use App\Http\Controllers\AdminController;

use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\AccountantMiddleware;
use App\Http\Middleware\StockerMiddleware;

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
    Route::get('/report', [ReportController::class, 'report'])->name('report')->middleware(AccountantMiddleware::class);

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
    Route::get('/orders/{id}/edit', [OrdersController::class, 'edit']);
    Route::put('/orders/update', [OrdersController::class, 'update']);
    Route::delete('/orders/{id}/delete', [OrdersController::class, 'delete']);
    Route::post('orders/delivered', [OrdersController::class, 'delivered']);

    //admin
    Route::get('/admin', [AdminController::class, 'admin'])->middleware(AdminMiddleware::class);
    Route::get('/admin/users', [AdminController::class, 'store'])->middleware(AdminMiddleware::class);
    Route::post('/admin/{id}/edit', [AdminController::class, 'edit'])->middleware(AdminMiddleware::class);
    Route::delete('/admin/{id}/delete', [AdminController::class, 'delete'])->middleware(AdminMiddleware::class);

    // shelf
    Route::get('/shelf/index', [ShelfController::class, 'index'])->middleware(StockerMiddleware::class);
    Route::post('/shelf/store', [ShelfController::class, 'store'])->middleware(StockerMiddleware::class);
    Route::get('/shelf/create', [ShelfController::class, 'create'])->middleware(StockerMiddleware::class);
    Route::put('/shelf/{id]', [ShelfController::class, 'update'])->name('shelves.update')->middleware(StockerMiddleware::class);
    Route::get('/shelf/{id}/edit', [ShelfController::class, 'edit'])->middleware(StockerMiddleware::class);
    Route::delete('/shelf/{id}/delete', [ShelfController::class, 'delete'])->middleware(StockerMiddleware::class);

    // shelf storage
    Route::get('/shelf_storage/index', [ShelfStorageController::class, 'index'])->middleware(StockerMiddleware::class);
    Route::post('/shelf_storage/new', [ShelfStorageController::class, 'new'])->middleware(StockerMiddleware::class);
    Route::get('/shelf_storage/{id}/edit', [ShelfStorageController::class, 'edit'])->name('shelf_storage.edit')->middleware(StockerMiddleware::class);
    Route::put('/shelf_storage/{id}', [ShelfStorageController::class, 'update'])->name('shelf_storage.update')->middleware(StockerMiddleware::class);
    Route::delete('/shelf_storage/{id}/delete', [ShelfStorageController::class, 'delete'])->name('shelf_storage.delete')->middleware(StockerMiddleware::class);
    Route::get('/shelf_storage/create', [ShelfStorageController::class, 'create'])->middleware(StockerMiddleware::class);
});
