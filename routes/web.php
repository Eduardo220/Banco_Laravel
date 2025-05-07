<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Usuarios:
Route::get('/index-register', [RegisterController::class, 'index'])->name('register.index');
Route::get('/index-login', [LoginController::class, 'index'])->name('login.index');
Route::post('/store-register', [RegisterController::class, 'store'])->name('register.store');

 