#!/bin/bash

echo "-----------------------------------------"
echo "🚀 Starting Laravel Deployment Script"
echo "-----------------------------------------"

set -e

echo "📦 Running composer install..."
composer install --no-interaction --prefer-dist

if [ ! -f ".env" ]; then
    echo "📄 Copying .env.example to .env"
    cp .env.example .env
fi

echo "🔑 Generating Laravel APP_KEY..."
php artisan key:generate

echo "🗄 Running database migrations..."
php artisan migrate --force

echo "🧹 Clearing caches..."
php artisan config:clear
php artisan cache:clear

echo "🌐 Starting Laravel server at http://127.0.0.1:8000"
php artisan serve --host=127.0.0.1 --port=8000
