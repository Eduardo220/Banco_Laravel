@extends('layouts.admin')
@section('title', 'Conta Corrente')
@section('content')
<center>
    <div>
        <h1>Deseja abrir uma conta corrente?</h1>
        <x-alert />
        <p>
            <h3>🏦 Conta Corrente:</h3>

            <strong>Finalidade:</strong> Movimentações do dia a dia.<br><br>

            <strong>Descrição:</strong> Conta destinada a movimentações diárias, como recebimento de salário, pagamentos e transferências. Ideal para quem precisa de agilidade e praticidade nas transações financeiras.<br><br>

            <strong>Características:</strong>
                - Acesso a cartão de débito e crédito;<br>
                - Possibilidade de cheque especial;<br>
                - Acesso a serviços de internet banking e aplicativos móveis;<br>
                - Possibilidade de realizar transferências e pagamentos de contas;<br>
                - Saques em caixas eletrônicos e correspondentes bancários;<br>
                - Possibilidade de realizar depósitos em dinheiro e cheques.<br><br>

            <strong>Principais funções:</strong>
                - Recebimento de salário ou pagamentos;<br>
                - Transferências (PIX, TED, DOC);<br>
                - Pagamento de contas e boletos;<br>
                - Saques e uso do cartão de débito;<br>
                - Possibilidade de crédito (cheque especial, empréstimos).<br><br>

            <strong>Rendimento:</strong> Normalmente não gera rendimento automático. <br><br>

            <strong>Público:</strong> Ideal para quem precisa movimentar dinheiro com frequência.
        </p>
        <form action="{{ route('account.current_create') }}" method="POST">
        @csrf
            <button type="submit">Criar Conta Corrente</button><br><br>
        </form>
        <a href="{{ route('home.index') }}" class="btn btn-secondary">Voltar</a>
    </div>
</center>
