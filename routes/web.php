<?php

use App\Http\Controllers\AuthenticationController;
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
    });
