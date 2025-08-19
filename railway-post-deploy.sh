#!/bin/bash

# Railway Post-Deploy Script for Laravel
echo "🚀 Starting post-deploy setup..."

# Generate application key if not exists
if [ -z "$APP_KEY" ]; then
    echo "🔑 Generating application key..."
    php artisan key:generate
fi

# Run database migrations
echo "🗄️ Running database migrations..."
php artisan migrate --force

# Run database seeders (optional - remove if you don't want seed data)
echo "🌱 Running database seeders..."
php artisan db:seed --force

# Create storage link
echo "📁 Creating storage link..."
php artisan storage:link

# Clear and cache config
echo "⚙️ Caching configuration..."
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Set proper permissions
echo "🔐 Setting permissions..."
chmod -R 775 storage bootstrap/cache

echo "✅ Post-deploy setup completed!" 