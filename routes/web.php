<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => 'guest'], function () {
    Route::get('/login',[AuthController::class, 'login'])->name('login');
    Route::get('/register',[AuthController::class, 'register'])->name('register');
});
 
Route::group(['middleware' => 'auth'], function () {
    Route::get('/logout',[AuthController::class, 'logout'])->name('logout');
});
