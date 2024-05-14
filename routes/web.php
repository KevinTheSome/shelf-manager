<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthController;

Route::get('/',[AuthController::class, 'login'])->name('login');
Route::get('/',[AuthController::class, 'register'])->name('register');
Route::get('/',[AuthController::class, 'logout'])->name('logout');


