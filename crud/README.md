## Requisitos

* PHP 8.2 ou superior
* MySQL 8 ou superior
* composer

## Como rodar o projeto baixado

Duplicar o arquivo ".env.example" e renomear para ".env" <br>
Alterar no arquivo .env as credenciais do banco de dados <br>

Instalar as dependencias do PHP
```
composer install
```

Gerar a chave no arquivo .env
```
php artisan key:generate

## Sequencia para criar o projeto
Criar o projeto com Laravel
```

composer create-project laravel/laravel .
```

Alterar no arquivo .env as credenciais do banco de dados <br>

Criar o arquivo de rotas para API
```

php artisan install:api
```