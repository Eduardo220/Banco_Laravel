@extends('layouts.admin')
@section('title', 'Saque')
@section('content')
    <center>
        <div class="container">
            <h1>Saque - Conta {{ ($account->type_account) }}</h1>
            <p>Saldo atual: R$ {{ number_format($account->balance_account, 2, ',', '.') }}</p>
            <form method="POST" action="{{ route('transaction.withdraw.create', ['type_account' => $account->type_account]) }}">
                <x-alert />
            @csrf
                <label for="amount">Valor do saque: </label>
                <input type="number" name="amount" id="amount" placeholder="Insira o valor do saque" step="0.01" min="0.01" required><br><br>
                <button type="submit">Sacar</button>
            </form><br>
            <div>
                <a href="{{ route('home.index') }}"><button type="button">Voltar</button></a>
            </div>
        </div>
    </center>
@endsection
@section('footer')
@endsection