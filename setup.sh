#!/bin/bash

echo "🐳 Starting Docker Laravel Setup..."

docker-compose down -v
docker-compose build
docker-compose up -d

echo "⏳ Waiting for MySQL to be ready..."
sleep 15

echo "🗄 Running migrations..."
docker-compose exec app php artisan migrate --force

echo "🎉 Docker Laravel is running!"
echo "🌐 Visit: http://localhost:8080"
