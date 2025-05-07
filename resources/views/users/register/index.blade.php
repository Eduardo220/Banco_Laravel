<center>
    <div>
        <h1>Faça seu cadastro para acessar sua conta</h1>
        <form method="POST" action="{{ route('register.store')}}">
            @csrf
            <div>
                <label for="name">Nome: </label>
                <input type="text" name="name" id="name" placeholder="Insira seu nome" required><br><br>
            </div>
            <div>
                <label for="email">Email: </label>
                <input type="email" name="email" id="email" placeholder="Insira seu email" required><br><br>
            </div>
            <div>
                <label for="phone">Celular: </label>
                <input type="text" name="phone" id="phone" placeholder="Insira seu número" required><br><br>
            </div>
            <div>
                <label for="address">Endereço: </label>
                <input type="text" name="address" id="address" placeholder="Insira seu endereço" required><br><br>
            </div>
            <div>
                <label for="CPF">CPF: </label>
                <input type="int" name="CPF" id="CPF" maxlength="14" placeholder="Insira seu CPF" required><br><br>
            </div>
            <div>
                <label for="birth_date">Data de Nascimento: </label>
                <input type="date" name="birth_date" id="birth_date" required><br><br>
            </div>
            <div>
                <label for="password">Senha: </label>
                <input type="password" name="password" id="password" minlength="8" placeholder="Insira sua senha" required><br><br>
            </div>
            <button type="submit">Cadastrar</button>
        </form>
    </div>
</center>