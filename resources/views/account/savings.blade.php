@extends('layouts.admin')
@section('title', 'Conta Poupança')
@section('content')
<center>
    <div>
        <h1>Deseja abrir uma conta poupança?</h1>
        <x-alert />
        <p>
            <h3>🏦 Conta Poupança:</h3>

            <strong>Finalidade:</strong> Poupança e rendimentos.<br><br>

            <strong>Descrição:</strong> Conta destinada a guardar dinheiro e gerar rendimentos. Ideal para quem deseja economizar e fazer o dinheiro render.<br><br>

            <strong>Características:</strong>
                - Rendimento automático;<br>
                - Isenção de tarifas;<br>
                - Acesso a serviços de internet banking e aplicativos móveis;<br>
                - Possibilidade de realizar transferências e pagamentos de contas;<br>
                - Saques em caixas eletrônicos e correspondentes bancários;<br>
                - Possibilidade de realizar depósitos em dinheiro e cheques.<br><br>

            <strong>Principais funções:</strong>
                - Poupança e rendimentos;<br>
                - Transferências (PIX, TED, DOC);<br>
                - Pagamento de contas e boletos;<br>
                - Saques e uso do cartão de débito;<br>
                - Possibilidade de crédito (cheque especial, empréstimos).<br><br>

            <strong>Rendimento:</strong> Normalmente gera rendimento automático. <br><br>

            <strong>Público:</strong> Ideal para quem deseja economizar e fazer o dinheiro render.
        </p>
        <form action="{{ route('account.savings_create') }}" method="post">
        @csrf
            <button type="submit">Criar Conta Poupança</button><br><br>
            <a href="{{ route('home.index') }}" class="btn btn-secondary">Voltar</a>
    </div>
</center>
@endsection
