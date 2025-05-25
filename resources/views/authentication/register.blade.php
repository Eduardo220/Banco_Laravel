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
                <input type="text" name="name" id="name" placeholder="Insira seu nome" value="{{ old('name') }}" required><br><br>

                <label for="email">Email: </label>
                <input type="email" name="email" id="email" placeholder="Insira seu email" value="{{ old('name') }}" required><br><br>

                <label for="phone">Celular: </label>
                <input type="text" name="phone" id="phone" minlength="9" maxlength="11" placeholder="(55) 99999-9999" value="{{ old('phone') }}" required><br><br>

                <label for="address_street">Rua: </label>
                <input type="text" name="address_street" id="address_street" placeholder="Nome da Rua" value="{{ old('address_street') }}" required><br><br>

                <label for="address_number">Numero: </label>
                <input type="text" name="address_number" id="address_number" placeholder="Número" value="{{ old('address_number') }}" required><br><br>

                <label for="address_neighborhood">Bairro: </label>
                <input type="text" name="address_neighborhood" id="address_neighborhood" placeholder="Nome do Bairro" value="{{ old('address_neighborhood') }}" required><br><br>

                <label for="address_complement">Complemento: </label>
                <input type="text" name="address_complement" id="address_complement" placeholder="Complemento" value="{{ old('address_complement') }}" required><br><br>

                <label for="address_city">Cidade: </label>
                <input type="text" name="address_city" id="address_city" placeholder="Cidade" value="{{ old('address_city') }}" required><br><br>

                <label for="address_state">Estado / UF: </label>
                <input type="text" name="address_state" id="address_state" placeholder="Estado" value="{{ old('address_state') }}" required><br><br>

                <label for="address_zip">CEP: </label>
                <input type="text" name="address_zip" id="address_zip" minlength="8" maxlength="8" placeholder="12345-999" value="{{ old('address_zip') }}" required><br><br>

                <label for="CPF">CPF: </label>
                <input type="int" name="CPF" id="CPF" minlength="11" maxlength="11" placeholder="000.000.000-00" value="{{ old('CPF') }}" required><br><br>

                <label for="birth_date">Data de Nascimento: </label>
                <input type="date" name="birth_date" id="birth_date" value="{{ old('birth_date') }}" required><br><br>

                <label for="password">Senha: </label>
                <input type="password" name="password" id="password" placeholder="Insira sua senha" value="{{ old('password') }}" required><br><br>
                
                <button type="submit">Cadastrar</button>
        </form>
    </div>
</center>