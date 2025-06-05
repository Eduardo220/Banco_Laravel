@extends('layouts.admin')
@section('title', 'Depósito')
@section('content')
    <center>
        <div class="container">
            <h1>Depósito - Conta {{ ($account->type_account) }}</h1>
            <p>Saldo atual: R$ {{ number_format($account->balance_account, 2, ',', '.') }}</p>
            <form method="POST" action="{{ route('transaction.deposit.create', ['type_account' => $account->type_account]) }}">
                <x-alert />
            @csrf
                <label for="amount">Valor do depósito: </label>
                <input type="number" name="amount" id="amount" placeholder="Insira o valor do depósito" step="0.01" min="0.01" required><br><br>
                <button type="submit">Depositar</button>
            </form><br>
            <div>
                <a href="{{ route('home.index') }}"><button type="button">Voltar</button></a>
            </div>
        </div>
    </center>
@endsection
@section('footer')
@endsection