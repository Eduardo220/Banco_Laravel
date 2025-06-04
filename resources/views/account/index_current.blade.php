@extends('layouts.admin')
@section('title', 'Conta Corrente')
@section('header')
@endsection
@section('content')
<center>
    <x-alert />
    <div>
        <h1>Conta Corrente</h1>
        <p><strong>Nome da conta: </strong> {{  $account->name_account }}</p>
        <p><strong>Número da conta: </strong> {{  $account->number_account }}</p>
        <p><strong>Agência: </strong> {{  $account->agency_account }}</p>
        <p><strong>Saldo: </strong> R$ {{  number_format($account->balance_account, 2, ',', '.') }}</p>
        <p><strong>Data de abertura: </strong> {{  date('d/m/Y', strtotime($account->created_at)) }}</p>
    </div>
    <div>
        <a href="{{ route('transaction.withdraw') }}"><button type="button">Saque</button></a>
        <a href="{{ route('transaction.deposit') }}"><button type="button">Depósito</button></a>
        <a href="{{ route('transaction.transfer') }}"><button type="button">Transferência</button></a>
    </div><br>
    <div>
        <a href="{{ route('home.index') }}"><button type="button">Voltar</button></a>
    </div>
@endsection
@section('footer')
@endsection
