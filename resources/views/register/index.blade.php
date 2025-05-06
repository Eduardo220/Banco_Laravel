<center>
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
            <div>
                <label for="password_confirmation">Confirme sua senha</label>
                <input type="password" name="password_confirmation" id="password_confirmation" required>
            </div>
            <div>
                <label for="phone">Celular:</label>
                <input type="text" name="phone" id="phone" required>
            </div>
            <div>
                <label for="birth_date">Data de Nascimento:</label>
                <input type="date" name="birth_date" id="birth_date" required>
            </div>
            <div>
                <label for="address">Endereço:</label>
                <input type="text" name="address" id="address" required>
            </div>
            <button type="submit">Cadastrar</button>
        </form>
    </div>
</center>