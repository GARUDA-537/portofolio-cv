#!/bin/sh

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

# Set permissions
chmod -R 775 storage bootstrap/cache database

echo "Build directories created successfully!"