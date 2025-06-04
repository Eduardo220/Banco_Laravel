@extends('layouts.admin')
@section('title', 'Editar Perfil')
@section('content')
<center>
    <div class="container">
        <h1>Editar Perfil</h1>
        <x-alert />
        <form action="{{ route('profile.update') }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                Nome: {{ $user->name }}
            </div><br>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $user->email) }}" required>
            </div><br>
            <div class="form-group">
                <label for="phone">Telefone:</label>
                <input type="text" name="phone" id="phone" minlength="9" maxlength="11" class="form-control" value="{{ old('phone', $user->phone) }}" required>
            </div><br>
            <div class="form-group">
                <label for="address_street">Endereço:</label>
                <input type="text" name="address_street" id="address_street" class="form-control" value="{{ old('address_street', $user->address_street) }}" required>
            </div><br>
            <div class="form-group">
                <label for="address_number">Número:</label>
                <input type="text" name="address_number" id="address_number" class="form-control" value="{{ old('address_number', $user->address_number) }}" required>
            </div><br>
            <div class="form-group">
                <label for="address_neighborhood">Bairro:</label>
                <input type="text" name="address_neighborhood" id="address_neighborhood" class="form-control" value="{{ old('address_neighborhood', $user->address_neighborhood) }}" required>
            </div><br>
            <div class="form-group">
                <label for="address_city">Cidade:</label>
                <input type="text" name="address_city" id="address_city" class="form-control" value="{{ old('address_city', $user->address_city) }}" required>
            </div><br>
            <div class="form-group">
                <label for="address_state">Estado:</label>
                <input type="text" name="address_state" id="address_state" class="form-control" value="{{ old('address_state', $user->address_state) }}" required>
            </div><br>
            <div class="form-group">
                <label for="address_zip">CEP:</label>
                <input type="text" name="address_zip" id="address_zip" class="form-control" value="{{ old('address_zip', $user->address_zip) }}" required>
            </div><br>
            <div class="form-group">
                CPF: {{ $user->CPF }}
            </div><br>
            <div class="form-group">
                Data de Nascimento: {{ $user->birth_date }}
            </div><br>
            <button type="submit" class="btn btn-primary">Salvar</button>
        </form><br>
        <div>
            <a href="{{ route('home.index') }}"><button type="button">Voltar</button></a>
        </div>
    </div>
</center>
@endsection
@section('footer')
@endsection

