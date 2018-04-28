#!/usr/bin/env bash

git fetch --all
git pull
composer install --no-dev --optimize-autoloader
php artisan migrate
php artisan optimize
php artisan config:cache
php artisan route:cache
php artisan cache:clear
php artisan view:clear

npm install
npm run production
