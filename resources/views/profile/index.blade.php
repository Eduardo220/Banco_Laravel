@extends('layouts.admin')

@section('title', 'Perfil')

@section('content')
<center>
    <x-alert />
    <div class="container">
        <h1>Perfil</h1>
        <p><strong>Nome: </strong>{{ $user->name }}</p>
        <p><strong>Email: </strong>{{ $user->email }}</p>
        <p><strong>Telefone: </strong>{{ $user->phone }}</p>
        <p><strong>Endereço: </strong>{{ $user->address_street }}, {{ $user->address_number }} 
                                    - {{ $user->address_neighborhood }}, {{ $user->address_city }} 
                                    - {{ $user->address_state }}, CEP: {{ $user->address_zip }}</p>
        <p><strong>CPF: </strong>{{ $user->CPF }}</p>
        <p><strong>Data de Nascimento: </strong>{{ $user->birth_date }}</p>
        

        <a href="{{ route('profile.edit') }}" class="btn btn-primary">Editar Perfil</a>
        <a href="{{ route('home.index') }}" class="btn btn-secondary">Voltar</a>
    </div>
</center>
