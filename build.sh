#!/bin/bash

# Install Composer dependencies
composer install --no-dev --optimize-autoloader --no-interaction

# Install NPM dependencies and build assets
npm install
npm run build

# Create necessary directories
mkdir -p storage/framework/{sessions,views,cache}
mkdir -p storage/logs
mkdir -p storage/app/public/contact-attachments
mkdir -p bootstrap/cache
mkdir -p database

# Create SQLite database
touch database/database.sqlite

# Run migrations and seed (force because we are in production mode)
php artisan migrate:fresh --seed --force

# Set permissions
chmod -R 775 storage bootstrap/cache database

# Create symlink for public storage if not exists
if [ ! -L "public/storage" ]; then
    php artisan storage:link
fi

