@extends('layouts.admin')
@section('title', 'Home')
@section('content')
<div>
        <h1>Bem vindo</h1>
        <x-alert />
</div>
<div>
        <h3>Deseja abrir uma conta?</h3>
        <p>
            <strong>Escolha o tipo de conta que deseja abrir:</strong><br><br>
            <a href="{{ route('account.current') }}">
                <button type="button">Conta Corrente</button>
            </a> Ideal para movimentações do dia a dia.<br><br>
            <a href="{{ route('account.savings') }}">
                <button type="button">Conta Poupança</button>
            </a> Ideal para guardar dinheiro e gerar rendimentos.
        </p>
    </div>
    <div>
        <h3>Deseja ver seu perfil?</h3>
            <a href="{{ route('account.current') }}">
                <button type="button">Ver perfil</button>
            </a>
</div>