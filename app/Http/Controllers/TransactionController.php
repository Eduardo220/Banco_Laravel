<?php

namespace App\Http\Controllers;

use App\Enums\TypeAccountEnum;
use App\Models\Account;
use App\Models\Transaction;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class TransactionController extends Controller
{
    public function deposit($type_account)
    {
        $user = Auth::user(); // Usuário autenticado

        // Verifica se o tipo de conta é válido
        if (!in_array($type_account, ['corrente', 'poupança'])) 
        {
            return redirect()->route('home.index')->with('error', 'Tipo de conta inválido.');
        }
        // Busca a conta do usuário
        $account = Account::where('user_id', $user->id)
                       ->where('type_account', $type_account)
                       ->first();

        if (!$account) 
        {
            return redirect()->route('account.index')->with('error', "Você não possui uma conta {$type_account}.");
        }
        Log::info('Entrou no painel de depósito', ['user_id' => $user->id]);
        return view('transaction.deposit', compact('account'));
    }

    public function deposit_create(Account $account, Request $request, $type_account)
    {
       $request->validate([
            'amount' => 'required|numeric|min:1',
        ]);
        $user = Auth::user(); // Usuário autenticado
        $account = Account::where('user_id', $user->id) // Obtém a conta do usuário autenticado
                ->where('type_account', $type_account)
                ->first();
        
        if (!$account) 
        {
            return back()->with('error', 'Conta não encontrada.');
        }
        else {
            $account->balance_account += $request->amount;
            $account->save();
            Transaction::create([
                'account_id' => $account->id,
                'type' => 'deposit',
                'amount' => $request->amount,
                'description' => 'Depósito via app',
            ]);
            Log::info('Efetuou um depósito', [
                'user_id' => $user->id,
                'account_id' => $account->id,
                'amount' => $request->amount
            ]);
            return redirect()->route('home.index')->with('success', 'Depósito realizado com sucesso!');
        }
    }
    
    public function withdraw($type_account)
    {
        $user = Auth::user(); // Usuário autenticado

        // Verifica se o tipo de conta é válido
        if (!in_array($type_account, ['corrente', 'poupança'])) 
        {
            return redirect()->route('home.index')->with('error', 'Tipo de conta inválido.');
        }
        // Busca a conta do usuário
        $account = Account::where('user_id', $user->id)
                       ->where('type_account', $type_account)
                       ->first();

        if (!$account) 
        {
            return redirect()->route('account.index')->with('error', "Você não possui uma conta {$type_account}.");
        }
        Log::info('Entrou no painel de saque', ['user_id' => $user->id]);
        return view('transaction.withdraw', compact('account'));
    }
    
    public function withdraw_create(Request $request, $type_account)
    {
        $request->validate([
            'amount' => 'required|numeric|min:1',
        ]);
        $user = Auth::user(); // Usuário autenticado
        $account = Account::where('user_id', $user->id) // Obtém a conta do usuário autenticado
                ->where('type_account', $type_account)
                ->first();
        
        if (!$account) 
        {
            return back()->with('error', 'Conta não encontrada.');
        }
        if ($account->balance_account < $request->amount) 
        {
            return back()->with('error', 'Saldo insuficiente.');
        }
        else {
            $account->balance_account -= $request->amount;
            $account->save();
            Transaction::create([
                'account_id' => $account->id,
                'type' => 'withdraw',
                'amount' => $request->amount,
                'description' => 'Saque via app',
            ]);
            Log::info('Efetuou um saque', [
                'user_id' => $user->id,
                'account_id' => $account->id,
                'amount' => $request->amount
            ]);
            return redirect()->route('home.index')->with('success', 'Saque realizado com sucesso!');
        }
    }

    public function transfer(Account $account, Request $request)
    {
        Auth::user()->id;
        if (!Auth::check()) {
            return redirect()->route('authentication.login')->with('error', 'Você precisa estar logado.');
        }
        $userId = Auth::id();
        Log::info('Entrou no painel de transferência', ['user_id' => $userId]);
        
        return view('transaction.transfer');
    }

    public function transfer_create(Request $request)
    {
        $request->validate([
            'name_account' => 'required',
            'number_account' => 'required',
            'agency_account' => 'required',
            'amount' => 'required|numeric|min:1',
        ]);

        Auth::user()->id;
        if (!Auth::check()) {
            return redirect()->route('authentication.login')->with('error', 'Você precisa estar logado.');
        }

        $userId = Auth::id();
        
        Log::info('Entrou no painel de transferência', ['user_id' => $userId]);
        
        // Verifica se a conta de origem existe
        $originAccount = Account::where('user_id', $userId)
            ->where('type_account', TypeAccountEnum::cases())
            ->first();
        if (!$originAccount) 
        {
            return redirect()->route('account.index')->withErrors(['error' => 'Conta de origem não encontrada.']);
        }
        
        // Verifica se a conta de destino existe
        $destinationAccount = Account::where('number_account', $request->number_account)->first();
        if (!$destinationAccount) 
        {
            return back()->with('error', 'Conta de destino não encontrada.');
        }

        // Verifica se não está transferindo para a própria conta
        if ($originAccount->id === $destinationAccount->id) 
        {
            return back()->with('error', 'Não é possível transferir para a própria conta.');
        }

        // Verifica se o saldo é suficiente
        if ($originAccount->balance_account < $request->amount) {
            return redirect()->back()->withErrors(['error' => 'Saldo insuficiente para realizar a transferência.']);
        }
        
        //Processa a transferencia
        $originAccount->balance_account -= $request->amount;
        $originAccount->save();

        $destinationAccount->balance_account += $request->amount;
        $destinationAccount->save(); 

        Log::info('Transferência realizada com sucesso', [
            'user_id' => $userId,
            'from_account' => $originAccount->number_account,
            'to_account' => $destinationAccount->number_account,
            'amount' => $request->amount,
            ]);
        return redirect()->route('account.index_current')->with('success', 'Transferencia realizada com sucesso!');
    }   
}
