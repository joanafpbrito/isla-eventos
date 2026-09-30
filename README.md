_________________________

*** Eventos ISLA Gaia ***
_________________________

Aplicação web desenvolvida em Laravel para promoção de eventos do ISLA Gaia. Aplicação académica para o Módulo de Programação Web do Curso de Desenvolvimento Web e Dispositivos Móveis, lecionada pelo docente Mário Amorim, desenvolvida pela aluna Joana Brito.

***************
Funcionalidades
***************

Listagem de eventos;
Filtro dos eventos por tipo e data;
Consultar detalhes de um evento;
Indicação de vagas, inscrições e lotação dos eventos;
Indicação do número de inscritos e vagas disponíveis;

**********
Requisitos
**********

* Preparação de ambiente

PHP 8.5
Composer
Laravel
Xampp - php myAdmin
VSCode


* Passo a passo
1. Clonar o projeto: https://github.com/joanafpbrito/isla-eventos.git
2. No terminal do VSCode entrar na pasta onde se encontra o projeto
cd (...)/pws1-app
3. Instalar as dependências
composer install
4. Iniciar o servidor - a aplicação fica disponível em: http://127.0.0.1:8000 e deve ser aberta no browser
php artisan serve
 

****************************************************
Estrutura alterada/criada durante o desenvolvimento:
****************************************************

.
├── app/
│   └── Http/
│       └── Controllers/
|           └── InicioController.php
│           └── EventoController.php
├── config/
│   └── eventos.php
├── public/
│   └── images.jpg
├── resources/
│   └── views/
|       └── errors/
│           ├── 404.blade.php
│       └── eventos/
│           ├── index.blade.php
│           └── show.blade.php
|       └── inicio.blade.php
├── routes/
│   └── web.php
├── .env.example
├── composer.json
└── README.md

**********
Controller
**********
app/Http/Controllers/EventoController.php

*****************
Dados dos eventos
*****************
config/eventos.php

*****
Views
*****
resources/views/eventos/

*****
Rotas
*****
routes/web.php


**************
Comandos úteis
**************

* Iniciar o servidor de desenvolvimento:
php artisan serve

* Limpar a cache de configuração:
php artisan config:clear

* Limpar as caches da aplicação:
php artisan optimize:clear

* Testar dados e estruturas:
php artisan tinker

* Ver as rotas disponíveis:
php artisan route:list

* Criar novos Controllers:
php artisan make:controller (NOME DO CONTROLLER)

