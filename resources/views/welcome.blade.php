<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Banco</title>
    </head>
    <body>
        <center>
            <header>
                <div id="app">
                    <h1>Bem vindo à Parkew's Bank!</h1>
                </div>
                <div id="login">
                    <h3>Faça seu login para acessar sua conta: <a href="{{ route('login.index') }}">Login</a></h3>
                </div>
                <div id="register">
                    <h3>Faça seu cadastro para acessar sua conta: <a href="{{ route('register.index') }}">Cadastro</a></h3>
                </div>
            </header>
        </center>
    </body>
    <footer>
        <center>
        <p>&copy; 2025 Banco. All rights reserved.</p>
        <p>Parkew's Bank é um banco ficticio para testes.</p>
        </center>
    </footer>    
</html>
