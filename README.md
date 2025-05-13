# Requisitos:
* PHP 8.2 ou superior - Conferir a versão: 
> php -v

* Composer - Conferir a instalação:
> composer --version

* Node.js 22 ou superior - Conferir a versão:
> node -v

## Como rodar o projeto:
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

## Autor:

Esse projeto foi desenvolvido por [Eduardo Weissheimer](https://github.com/Eduardo220), e está hospedado no repositório [Banco-Laravel](https://github.com/Eduardo220/Banco_Laravel).

## Licença

Este projeto está licenciado sob a licença MIT - veja o arquivo [LICENSE](LICENSE) para mais detalhes.

## 🛠️ Tecnologias utilizadas:
![PHP](https://img.shields.io/badge/%E3%85%A4%E3%85%A4PHP%E3%85%A4%E3%85%A4-%238993be?style=for-the-badge&logo=php&logoColor=white) 
![Laravel](https://img.shields.io/badge/%E3%85%A4LARAVEL%E3%85%A4-%23fb503b?style=for-the-badge&logo=laravel&logoColor=white) 
![Laravel](https://img.shields.io/badge/%E3%85%A4MYSQL%E3%85%A4-%2300758f?style=for-the-badge&logo=mysql&logoColor=white) 
![Laravel](https://img.shields.io/badge/%E3%85%A4%E3%85%A4GIT%E3%85%A4%E3%85%A4-%23f34f29?style=for-the-badge&logo=git&logoColor=white) 
