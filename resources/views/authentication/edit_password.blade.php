@extends('layouts.admin')

@section('content')
    <h1>Editar senha</h1>
    <x-alert />
    <form action="{{ route('authentication.update_password', ['user' => $user->id]) }}" method="POST">
        @csrf
        @method('PUT')        

        <label>Senha: </label>
        <input type="password" name="password" id="password" placeholder="Senha do usuário" value="{{ old('password') }}" required><br><br>

        <button type="submit">Salvar</button>
    </form>
@endsection
    