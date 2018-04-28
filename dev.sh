#!/usr/bin/env bash
cd /app/www/supra

git fetch --all
git pull
composer install
php artisan migrate
php artisan optimize
php artisan config:cache
php artisan route:cache
php artisan cache:clear
php artisan view:clear
npm install
