<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    public function current()
    {
        return view('account.current'); // Retorna a view de conta corrente
    }
    public function current_create(Request $request)
    {
        if (!Auth::check()) 
        {
            return redirect()->route('login')->with('error', 'Você precisa estar logado.');
        }
        Account::create([
            'user_id' => Auth::id(), // ou null se não estiver logado
            'name_account' => 'Conta Corrente',
            'number_account' => rand(1000000000, 9999999999), // Gera um número de conta aleatório
            'type_account' => 'corrente',
            'agency_account' => 1001,   
            'balance_account' => 0,
            'status_account' => 'ativa',
        ]);

        return back()->with('success', 'Conta corrente criada com sucesso!');
    }

    public function savings_create(Request $request)
    {
        if (!Auth::check()) 
        {
            return redirect()->route('login')->with('error', 'Você precisa estar logado.');
        }
        Account::create([
            'user_id' => Auth::id(), // ou null se não estiver logado
            'name_account' => 'Conta Poupança',
            'number_account' => rand(1000000000, 9999999999), // Gera um número de conta aleatório
            'type_account' => 'poupança',
            'agency_account' => 1001,
            'balance_account' => 0,
            'status_account' => 'ativa',
        ]);

        return back()->with('success', 'Conta poupança criada com sucesso!');
    }

    public function savings()
    {
        return view('account.savings'); // Retorna a view de conta poupança
    }


}
