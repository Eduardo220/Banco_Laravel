<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () 
{
    return view('welcome');
});

// Usuarios:
Route::prefix('authentication')
    ->group(function () 
    {
        Route::get('/login', [AuthenticationController::class, 'auth_login'])->name('authentication.login');
        Route::get('/register', [AuthenticationController::class, 'auth_register'])->name('authentication.register');
        Route::post('/store', [AuthenticationController::class, 'store'])->name('authentication.store');
        
        Route::get('/edit_password', [AuthenticationController::class, 'edit_password'])->name('authentication.edit_password');
        Route::put('/{user}/update_password', [AuthenticationController::class, 'update_password'])->name('authentication.update_password');
        Route::post('/login', [AuthenticationController::class, 'login'])->name('authentication.login.post');
    });

Route::get('/home', [HomeController::class, 'index'])->name('home.index');

Route::middleware('auth')->prefix('account')->group(function () {
    Route::get('/current', [AccountController::class, 'current'])->name('account.current');
    Route::post('/current_create', [AccountController::class, 'current_create'])->name('account.current_create');

    Route::get('/savings', [AccountController::class, 'savings'])->name('account.savings');
    Route::post('/savings_create', [AccountController::class, 'savings_create'])->name('account.savings_create');
});
