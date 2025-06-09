# Sistema de Conta Bancária — PHP + Laravel + MySQL

### 📋 Descrição:
Projeto de uma aplicação bancária desenvolvida em PHP utilizando o framework Laravel, com arquitetura baseada no padrão MVC (Model-View-Controller) e princípios de Programação Orientada a Objetos (OOP). O sistema permite o gerenciamento de contas bancárias, autenticação de usuários, consultas de saldo e operações financeiras, com foco em segurança, escalabilidade e boas práticas de desenvolvimento.

-----

### ⚙️ Funcionalidades:

- [x] Logs e Debug: Utilização de logs no Laravel para registro de eventos e erros, facilitando a análise e manutenção do sistema.

- [x] Segurança de Dados: Proteção de informações sensíveis com criptografia, validações robustas e políticas de acesso.

- [x] Rotas e Controllers: Organização clara do fluxo da aplicação com as facilidades do sistema de rotas do Laravel.

- [x] Migrations e Seeders: Estrutura de banco de dados gerenciada com migrations e geração de dados de teste automatizada com seeders.

- [x] Validações: Regras centralizadas e reutilizáveis para garantir a integridade dos dados em todas as operações.

- [x] Cadastro/Login:  Páginas de cadastro e login funcionais, com as rotas corretas.

- [x] Consulta de Saldo: Visualização de informações como nome do banco, número da agência, número da conta e titular da conta.

- [x] Saque e Depósito: Operações de movimentação de saldo com validações de segurança e registro de transações.

- [x] Transferencia: Operações de movimentação de saldo entre usuários, através de transferencias com validações de segurança e registro de transações.
    
- [x] Conta Corrente e Conta Poupança: Comportamentos distintos para diferentes tipos de contas, com regras específicas de operação.

-----

### 📜 Como rodar o projeto:
1- Duplicar o arquivo ".env.example" e renomear para ".env";

2- Alterar as credenciais do banco de dados:

> DB_CONNECTION=mysql

> DB_HOST=127.0.0.1

> DB_PORT=3306

> DB_DATABASE=banco_laravel

> DB_USERNAME=root

> DB_PASSWORD=

3- Instalar as dependências do PHP:
> composer install

4- Instalar as dependências do Node.js.
> npm install

5- Gerar a chave no arquivo ".env"
> php artisan key:generate 

6- Executar as migrations para criar as tabelas e as colunas:
> php artisan migrate

7- Executar seed com php artisan para cadastrar registros de testes:
> php artisan db:seed

8- Iniciar o projeto criado com Laravel:
> php artisan serve

9- Executar as bibliotecas Node.js:
> npm run dev

10- Acessar o conteúdo do Banco:
* [http://127.0.0.1:8000](http://127.0.0.1:8000)

-----

### 🖋️ Autor:

Esse projeto foi desenvolvido por [Eduardo Weissheimer](https://github.com/Eduardo220), e está hospedado no repositório [Banco-Laravel](https://github.com/Eduardo220/Banco_Laravel).

-----

### 🧾 Licença

Este projeto está licenciado sob a licença MIT - veja o arquivo [LICENSE](LICENSE) para mais detalhes.

-----

### 🛠️ Tecnologias utilizadas:
![PHP](https://img.shields.io/badge/%E3%85%A4%E3%85%A4PHP%E3%85%A4%E3%85%A4-%238993be?style=for-the-badge&logo=php&logoColor=white) 
![Laravel](https://img.shields.io/badge/%E3%85%A4LARAVEL%E3%85%A4-%23fb503b?style=for-the-badge&logo=laravel&logoColor=white) 
![MYSQL](https://img.shields.io/badge/%E3%85%A4MYSQL%E3%85%A4-%2300758f?style=for-the-badge&logo=mysql&logoColor=white) 
![GIT](https://img.shields.io/badge/%E3%85%A4%E3%85%A4GIT%E3%85%A4%E3%85%A4-%23f34f29?style=for-the-badge&logo=git&logoColor=white) 
![COMPOSER](https://img.shields.io/badge/%E3%85%A4composer%E3%85%A4-%23ac865a?style=for-the-badge&logo=composer&logoColor=white) 
