#!/bin/sh

# Install Composer dependencies
composer install --no-dev --optimize-autoloader --no-interaction

# Install NPM dependencies and build assets
npm install
npm run build

# Create necessary directories
mkdir -p storage/framework/sessions
mkdir -p storage/framework/views
mkdir -p storage/framework/cache
mkdir -p storage/logs
mkdir -p storage/app/public/contact-attachments
mkdir -p bootstrap/cache
mkdir -p database

# Create SQLite database
touch database/database.sqlite

# Run migrations (force for production)
php artisan migrate:fresh --seed --force

# Set permissions
chmod -R 775 storage bootstrap/cache database

# Create symlink for public storage
php artisan storage:link

echo "Build completed successfully!"