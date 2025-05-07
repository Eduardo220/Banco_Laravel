@extends('layouts.admin')

@section('title', 'Bem-vindo')

@section('content')
<center>
<div id="app">
    <h1>Bem vindo à Parkew's Bank!</h1>
</div>
<div id="login">
    <h3>Faça seu login para acessar sua conta: <a href="{{ route('authentication.login') }}">Login</a></h3>
</div>
<div id="register">
    <h3>Faça seu cadastro para acessar sua conta: <a href="{{ route('authentication.register') }}">Cadastro</a></h3>
</div>
</center>
@endsection