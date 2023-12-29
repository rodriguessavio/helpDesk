# Helpdesk
Projeto desenvolvido com o intuito de facilitar a criação de chamadas técnicas.

## Instalação

Clone o repositório

```bash
  git clone https://github.com/seu-usuario/seu-projeto.git
```

Instale as depências

```bash
cd helpdesk
composer install
```

Copie o arquivo de configuração

```bash
cp .env.example .env
```

Configure o Arquivo .env

```bash
php artisan key:generate
```

Crie o banco de dados e inicialize o servidor

```bash
php artisan migrate
php artisan serve
```

Execute e acesse o projeto

```bash
php artisan serve
http://127.0.0.1:8000 
```

## Diagrama entidade relacionamento

  

![Diagrama entidade relacionamento](/public/img/DER.png)
