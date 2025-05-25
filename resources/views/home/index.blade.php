@extends('layouts.admin')
@section('title', 'Home')
@section('content')
<center>
<div>
        <h1>Bem vindo {{  $user->name  }}</h1>
        <x-alert />
</div>
<div>
    <h3>Deseja ver seu perfil?</h3>
        <a href="{{ route('profile.index') }}">
            <button type="button">Ver perfil</button>
        </a>
</div>
<div>
    <h3>Deseja ver suas contas?</h3>
        <a href="{{ route('account.index_current') }}">
            <button type="button">Ver conta corrente</button>
        </a>
        <a href="{{ route('account.index_savings') }}">
            <button type="button">Ver conta poupança</button>
        </a>
</div>
<div>
    <h3>Deseja abrir uma conta?</h3>
    <p><strong>Escolha o tipo de conta que deseja abrir:</strong><br><br>
        <a href="{{ route('account.current') }}">
            <button type="button">Conta Corrente</button>
        </a> - Ideal para movimentações do dia a dia.<br><br>
        <a href="{{ route('account.savings') }}">
            <button type="button">Conta Poupança</button>
        </a> - Ideal para guardar dinheiro e gerar rendimentos.
    </p>
</div>
</center>