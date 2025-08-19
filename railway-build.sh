#!/bin/bash

# Railway Build Script
echo "🔨 Starting Railway build process..."

# Install system dependencies
echo "📦 Installing system dependencies..."
apt-get update -qq
apt-get install -y -qq \
    default-mysql-client \
    libmysqlclient-dev \
    pkg-config

# Install PHP extensions
echo "🔌 Installing PHP extensions..."
docker-php-ext-install pdo_mysql mysqli

# Install Composer dependencies
echo "📚 Installing Composer dependencies..."
composer install --no-dev --optimize-autoloader --no-interaction

# Install Node.js dependencies
echo "📦 Installing Node.js dependencies..."
npm ci --only=production

# Build frontend assets
echo "🎨 Building frontend assets..."
npm run build

# Set permissions
echo "🔐 Setting permissions..."
chmod +x railway-start.sh
chmod +x railway-post-deploy.sh
chmod +x railway-db-check.sh

echo "✅ Build completed successfully!" 