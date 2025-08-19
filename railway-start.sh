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
    
    # Check PHP extensions
    echo "🔍 Checking PHP extensions..."
    php -m | grep -E "(pdo_mysql|mysqli)" || {
        echo "❌ MySQL extensions not found!"
        echo "Installed extensions:"
        php -m
        exit 1
    }
    echo "✅ MySQL extensions found"
    
    # Check database configuration
    echo "🔍 Checking database configuration..."
    ./railway-db-check.sh
    
    # Run migrations with error handling
    echo "🗄️ Running database migrations..."
    php artisan migrate --force || {
        echo "⚠️ Migration failed, trying to reset and migrate..."
        php artisan migrate:fresh --force
    }
    
    # Run seeders
    echo "🌱 Running database seeders..."
    php artisan db:seed --force || echo "⚠️ Seeding failed, continuing..."
    
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