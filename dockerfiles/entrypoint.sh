#!/bin/sh

cd /app

echo "Installing dependencies..."

if [ ! -d "vendor" ]; then
  composer install
fi

if [ ! -d "node_modules" ]; then
  npm install
fi

# optional for dev (if you need assets compiled once)
npm run build

php artisan key:generate --force || true

php-fpm