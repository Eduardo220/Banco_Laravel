<div>
    <h1>Faça seu cadastro para acessar sua conta</h1>
    <form method="POST" action=" ">
        @csrf
        <div>
            <label for="name">Nome</label>
            <input type="text" name="name" id="name" required autofocus>
        </div>
        <div>
            <label for="email">Email</label>
            <input type="email" name="email" id="email" required>
        </div>
        <div>
            <label for="password">Senha</label>
            <input type="password" name="password" id="password" required>
        </div>
        <button type="submit">Cadastrar</button>
    </form>
</div>
