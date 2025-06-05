@extends('layouts.admin')
@section('title', 'Home')
@section('header')
@endsection
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
</div><br>
<div>
    <a href="{{ route('logout') }}">
        <button type="button">Sair</button>
    </a>
</div>
</center>
@endsection
@section('footer')
@endsection