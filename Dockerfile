# Use official PHP 8.2 FPM image
FROM php:8.2-fpm

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    libzip-dev \
    zip \
    unzip \
    default-mysql-client \
    libmariadb-dev \
    pkg-config \
    && rm -rf /var/lib/apt/lists/*

# Install PHP extensions
RUN docker-php-ext-install pdo_mysql mysqli mbstring exif pcntl bcmath gd zip

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Install Node.js
RUN curl -fsSL https://deb.nodesource.com/setup_18.x | bash - \
    && apt-get install -y nodejs

# Set working directory
WORKDIR /app

# Copy composer files
COPY composer.json composer.lock ./

# Copy artisan file (needed for composer scripts)
COPY artisan ./

# Install PHP dependencies
RUN composer install --no-dev --optimize-autoloader --no-interaction --no-scripts

# Copy package files
COPY package.json package-lock.json ./

# Install Node.js dependencies (including dev dependencies for build)
RUN npm ci

# Copy application code
COPY . .

# Build frontend assets
RUN npm run build

# Remove dev dependencies to reduce image size
RUN npm prune --production

# Run composer scripts after all files are copied
RUN composer dump-autoload --optimize

# Set permissions
RUN chmod +x railway-start.sh railway-post-deploy.sh railway-db-check.sh

# Create storage directory and set permissions
RUN mkdir -p storage/framework/{sessions,views,cache} \
    && chmod -R 775 storage \
    && chmod -R 775 bootstrap/cache

# Expose port
EXPOSE 8000

# Start the application
CMD ["./railway-start.sh"] 