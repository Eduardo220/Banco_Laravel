<?php

use App\Http\Controllers\AuthenticationController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Usuarios:
Route::get('/login-authentication', [AuthenticationController::class, 'auth_login'])->name('authentication.login');
Route::get('/register-authentication', [AuthenticationController::class, 'auth_register'])->name('authentication.register');
Route::post('/store-register', [AuthenticationController::class, 'store'])->name('authentication.store');
 