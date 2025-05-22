<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Account;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class AccountController extends Controller
{
    public function current()
    {
        return view('account.current'); // Retorna a view de conta corrente
    }

    public function current_create(Account $request)
    {
        if (!Auth::check()) 
        {
            return redirect()->route('authentication.login')->with('error', 'Você precisa estar logado.');
        }

        $userId = Auth::id();

        // Verifica se o usuário já tem conta corrente
        $existingAccount = Account::where('user_id', $userId)
            ->where('type_account', 'corrente')
            ->first();

        if ($existingAccount) {
            return redirect()->route('home.index')->with('error', 'Você já possui uma conta corrente criada.');
        }

        // Se não tem, cria a conta corrente
        $account = Account::create([
            'user_id' => Auth::id(), // ou null se não estiver logado
            'name_account' => 'Conta Corrente',
            'number_account' => rand(1000000000, 9999999999), // Gera um número de conta aleatório
            'type_account' => 'corrente',
            'agency_account' => 1001,   
            'balance_account' => 0,
            'status_account' => 'ativa',
        ]);
        // Salva a log
        Log::info('Conta corrente criada com sucesso!', ['user_id' => $account->id]);

        return redirect()->route('home.index')->with('success', 'Conta corrente criada com sucesso!');
    }

    public function savings()
    {
        return view('account.savings'); // Retorna a view de conta poupança
    }
    
    public function savings_create(Account $request)
    {
        if (!Auth::check()) 
        {
            return redirect()->route('login')->with('error', 'Você precisa estar logado.');
        }

        $userId = Auth::id();

        // Verifica se o usuário já tem conta poupança
        $existingAccount = Account::where('user_id', $userId)
            ->where('type_account', 'poupança')
            ->first();

        if ($existingAccount) {
            return redirect()->route('home.index')->with('error', 'Você já possui uma conta poupança criada.');
        }

        // Se não tem, cria a conta poupança
        $account = Account::create([
            'user_id' => Auth::id(), // ou null se não estiver logado
            'name_account' => 'Conta Poupança',
            'number_account' => rand(1000000000, 9999999999), // Gera um número de conta aleatório
            'type_account' => 'poupança',
            'agency_account' => 1001,
            'balance_account' => 0,
            'status_account' => 'ativa',
        ]);
        // Salva a log
        Log::info('Conta poupança criada com sucesso!', ['user_id' => $account->id]);

        return redirect()->route('home.index')->with('success', 'Conta poupança criada com sucesso!');
    }
}
