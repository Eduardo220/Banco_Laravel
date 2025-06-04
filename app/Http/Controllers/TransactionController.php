<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Transaction;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class TransactionController extends Controller
{
    public function deposit(Account $account, Request $request)
    {
        $user = Auth::user(); // Usuário autenticado
        Log::info('Entrou no painel de depósito', ['user_id' => $user->id]);
        return view('transaction.deposit');
    }

    public function deposit_create(Account $account, Request $request)
    {
        $user = Auth::user(); // Usuário autenticado
        $request->validate([
            'amount' => 'required|numeric|min:1',
        ]);
        $account = Account::where('user_id', auth()->id())->first();
        // Atualiza saldo
        $account->balance_account += $request->amount;
        $account->save();
        Transaction::create([
            'account_id' => $account->id,
            'type' => 'deposit',
            'amount' => $request->amount,
            'description' => 'Depósito via app',
        ]);
        Log::info('Efetuou um depósito', ['user_id' => $user->id]);
        return redirect()->route('account.index_current')->with('success', 'Depósito realizado com sucesso!');
    }
    
    public function withdraw(Request $request)
    {
        $user = Auth::user(); // Usuário autenticado
        Log::info('Entrou no painel de saque', ['user_id' => $user->id]);
        
        return view('transaction.withdraw');
    }
    
    public function withdraw_create(Request $request)
    {
        $user = Auth::user(); // Usuário autenticado
        $request->validate([
            'amount' => 'required|numeric|min:1',
        ]);
        $account = Account::where('user_id', auth()->id())->first(); // Obtém a conta do usuário autenticado
        if ($account->balance_account < 0) {
            return redirect()->back()->withErrors(['error' => 'Saldo insuficiente para realizar o saque.']);
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
            Log::info('Efetuou um saque', ['user_id' => $user->id]);
            return redirect()->route('account.index_current')->with('success', 'Saque realizado com sucesso!');
        }
    }

    public function transfer(Account $account, Request $request)
    {
        $user = Auth::user(); // Usuário autenticado
        Log::info('Entrou no painel de transferência', ['user_id' => $user->id]);
        
        return view('transaction.transfer');
    }

    public function transfer_create(Account $account, Request $request)
    {
        $user = Auth::user(); // Usuário autenticado
        $request->validate([
            'name_account' => 'required',
            'number_account' => 'required',
            'agency_account' => 'required',
            'amount' => 'required|numeric|min:1',
        ]);
        // Verifica se a conta de destino existe
         $accountExists = Account::where('name_account', $request->name_account)
            ->where('number_account', $request->number_account)
            ->where('agency_account', $request->agency_account)
            ->first();

        if (!$accountExists) {
            return redirect()->back()->withErrors(['error' => 'Conta de destino não encontrada.']);
        }
            
        $sourceAccount = Account::where('user_id', auth()->user()->id)
            ->where('type_account', 'corrente')
            ->first();

        $targetAccount = Account::find($request->target_account_id);

        // Verifica se não é transferência para si mesmo
        if ($sourceAccount->id === $targetAccount->id) {
            return redirect()->back()->with('error', 'Não é possível transferir para a mesma conta.');
        }
        
        // Verifica se o saldo é suficiente
        if ($sourceAccount->balance_account < $request->amount) {
            return redirect()->back()->withErrors(['error' => 'Saldo insuficiente para realizar a transferência.']);
        }
        
        DB::transaction(function () use ($sourceAccount, $targetAccount, $request, $user) 
        {
            $amount = $request->amount;

            // Deduz o valor da conta de origem
            $sourceAccount->balance_account -= $amount;
            $sourceAccount->save();

            // Adiciona o valor à conta de destino
            $targetAccount->balance_account += $amount;
            $targetAccount->save(); 

            Log::info('Efetuou uma transferência', [
            'user_id' => $user->id,
            'from_account' => $sourceAccount->id,
            'to_account' => $targetAccount->id,
            'amount' => $amount,
            ]);
        });
    }
}
