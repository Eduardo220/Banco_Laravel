<div>
<header>
        <h4>Faça seu login para acessar sua conta</h4>
        <form method="POST" action=" ">
            @csrf
            <div>
                <label for="email">Email</label>
                <input type="email" name="email" id="email" required autofocus>
            </div>
            <div>
                <label for="password">Senha</label>
                <input type="password" name="password" id="password" required>
            </div>
            <button type="submit">Entrar</button>
    </header>
</div>
