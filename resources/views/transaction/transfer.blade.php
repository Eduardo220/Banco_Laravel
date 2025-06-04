@extends('layouts.admin')
@section('title', 'Transferência')
@section('content')
    <center>
        <div class="container">
            <h1>Transferencia</h1>
            <form method="POST" action="{{ route('transaction.transfer.create') }}">
                <x-alert />
            @csrf
                <label for="name">Nome da conta: </label>
                <input type="text" name="name_account" id="name_account" placeholder="Insira o nome da conta" value="{{ old('name') }}" required><br><br>
                <label for="number_account">Número da conta: </label>
                <input type="text" name="number_account" id="number_account" placeholder="Insira o número da conta" value="{{ old('number_account') }}" required><br><br>
                <label for="agency_account">Agência: </label>
                <input type="text" name="agency_account" id="agency_account" placeholder="Insira a agência" value="{{ old('agency_account') }}" required><br><br>
                <label for="amount">Valor da transferencia: </label>
                <input type="number" name="amount" id="amount" placeholder="Insira o valor do transferencia" value="{{ old('amount') }}" step="0.01" min="0.01" required><br><br>
                <button type="submit">Transferir</button>
            </form><br>
            <div>
                <button type="button" onclick="window.history.back()" class="btn btn-primary">Voltar</button>
            </div>
        </div>
    </center>
@endsection
@section('footer')
@endsection