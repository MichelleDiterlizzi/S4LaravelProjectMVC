#!/bin/bash

# Railway Start Script for Laravel
echo "🚀 Starting Event Organizer Laravel application..."

# Check if we need to run setup
if [ ! -f ".railway-setup-complete" ]; then
    echo "🔧 Running initial setup..."
    
    # Generate app key if not exists
    if [ -z "$APP_KEY" ]; then
        php artisan key:generate
    fi
    
    # Run migrations
    php artisan migrate --force
    
    # Run seeders
    php artisan db:seed --force
    
    # Create storage link
    php artisan storage:link
    
    # Cache everything for production
    php artisan config:cache
    php artisan route:cache
    php artisan view:cache
    
    # Mark setup as complete
    touch .railway-setup-complete
    echo "✅ Setup completed!"
fi

# Start the application
echo "🌐 Starting Laravel server on port $PORT..."
php artisan serve --host=0.0.0.0 --port=$PORT 