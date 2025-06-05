<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;

//Tela de boas-vindas
Route::get('/', [WelcomeController::class, 'index'])->name('welcome'); 
Route::get('/logout', [AuthenticationController::class, 'logout'])->name('logout');

// Tela de autenticação
Route::prefix('authentication')
    ->group(function () 
    {
        Route::get('/login', [AuthenticationController::class, 'auth_login'])->name('authentication.login');
        Route::get('/register', [AuthenticationController::class, 'auth_register'])->name('authentication.register');
        Route::post('/store', [AuthenticationController::class, 'store'])->name('authentication.store');
        Route::post('/login', [AuthenticationController::class, 'login_post'])->name('authentication.login.post');
    });

// Grupo de rotas restritas a usuários autenticados
Route::group(['middleware' => 'auth'], function () 
{
    // Rota para a página inicial após o login
    Route::get('/home', [HomeController::class, 'index'])->name('home.index');


    Route::prefix('account')
    ->group(function ()
    {
        Route::get('/current', [AccountController::class, 'current'])->name('account.current');
        Route::post('/current_create', [AccountController::class, 'current_create'])->name('account.current_create');
        
        Route::get('/savings', [AccountController::class, 'savings'])->name('account.savings');
        Route::post('/savings_create', [AccountController::class, 'savings_create'])->name('account.savings_create');

        Route::get('/index', [AccountController::class, 'index'])->name('account.index');
        Route::get('/index_current', [AccountController::class, 'index_current'])->name('account.index_current');
        Route::get('/index_savings', [AccountController::class, 'index_savings'])->name('account.index_savings');
    });
    
    // Rota para o perfil do usuário
    Route::prefix('profile')
    ->group(function () 
    {
        Route::get('/', [ProfileController::class, 'profile'])->name('profile.index');   
        Route::get('/edit', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::put('/', [ProfileController::class, 'update'])->name('profile.update');
    });

    Route::prefix('transaction')
    ->group(function () 
    {
        Route::get('/deposit/{type_account}', [TransactionController::class, 'deposit'])->name('transaction.deposit');
        Route::post('/deposit_create/{type_account}', [TransactionController::class, 'deposit_create'])->name('transaction.deposit.create');
        Route::get('/withdraw/{type_account}', [TransactionController::class, 'withdraw'])->name('transaction.withdraw');
        Route::post('/withdraw_create/{type_account}', [TransactionController::class, 'withdraw_create'])->name('transaction.withdraw.create');
        Route::get('/transfer', [TransactionController::class, 'transfer'])->name('transaction.transfer');
        Route::post('/transfer_create', [TransactionController::class, 'transfer_create'])->name('transaction.transfer.create');
    });
});