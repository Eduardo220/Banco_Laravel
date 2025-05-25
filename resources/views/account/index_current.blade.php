@extends('layouts.admin')
@section('title', 'Conta Corrente')
@section('content')
<center>
    <x-alert />
    <div>
        <h1>Olá {{  $user->name  }} - Conta Corrente</h1>
        <p><strong>Número da conta: </strong> {{  $account->number_account }}</p>
        <p><strong>Agência: </strong> {{  $account->agency_account }}</p>
        <p><strong>Saldo: </strong> R$ {{  number_format($account->balance_account, 2, ',', '.') }}</p>
        <p><strong>Data de abertura: </strong> {{  date('d/m/Y', strtotime($account->created_at)) }}</p>
    </div>
    <div>

    </div>