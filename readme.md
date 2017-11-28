[![Build Status](https://travis-ci.org/leandrodaf/supra.svg?branch=master)](https://travis-ci.org/leandrodaf/supra)

SUPRA - Gestão escolar
===================


Supra é um projeto open source construído com o intuito de atender as necessidades de pequenas escolas.

----------


Instalação
-------------

Copiar o arquivo de configuração

    $ cp .env.example .env

Configurar conforme os dados do banco de dados, mariadb, SQL Server e postgresql

    DB_CONNECTION=mysql
    DB_HOST=localhost
    DB_PORT=3306
    DB_DATABASE=supra
    DB_USERNAME=root
    DB_PASSWORD=root

Rodar as migrations de requisitos do sistema

    $ php artisan migrate:refresh --seed