@extends('layouts.admin')

@section('title', 'Cadastro')

@section('content')
<center>
    <div>
        <h1>Faça seu cadastro para acessar sua conta</h1>
        <x-alert />
        <form method="POST" action="{{ route('authentication.store')}}">
            @csrf
                <label for="name">Nome: </label>
                <input type="text" name="name" id="name" placeholder="Insira seu nome"><br><br>
                
                <label for="email">Email: </label>
                <input type="email" name="email" id="email" placeholder="Insira seu email"><br><br>

                <label for="phone">Celular: </label>
                <input type="text" name="phone" id="phone" placeholder="(55)91234-5678"><br><br>

                <label for="address">Endereço: </label>
                <input type="text" name="address" id="address" placeholder="Insira seu endereço"><br><br>

                <label for="CPF">CPF: </label>
                <input type="int" name="CPF" id="CPF" minlength="11" maxlength="11" placeholder="Insira seu CPF"><br><br>

                <label for="birth_date">Data de Nascimento: </label>
                <input type="date" name="birth_date" id="birth_date"><br><br>

                <label for="password">Senha: </label>
                <input type="password" name="password" id="password" placeholder="Insira sua senha"><br><br>
                
                <button type="submit">Cadastrar</button>
        </form>
    </div>
</center>