<div>
    <center>
    <h1>Faça seu login para acessar sua conta</h1>
    @if (session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif
        <form method="POST" action="">
            @csrf
            <div>
                <label for="email">Email: </label>
                <input type="email" name="email" id="email" placeholder="Insira seu email" required><br><br>
            </div>
            <div>
                <label for="password">Senha: </label>
                <input type="password" name="password" id="password" placeholder="Insira sua senha" required><br><br>
            </div>
            <button type="submit">Entrar</button>
    </center>
</div>