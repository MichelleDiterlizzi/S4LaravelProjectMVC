#!/bin/bash

# Railway Database Check Script
echo "🔍 Checking database configuration..."

# Check if database variables are set
if [ -z "$DB_HOST" ] || [ -z "$DB_DATABASE" ] || [ -z "$DB_USERNAME" ] || [ -z "$DB_PASSWORD" ]; then
    echo "❌ Database environment variables are not set!"
    echo "DB_HOST: $DB_HOST"
    echo "DB_DATABASE: $DB_DATABASE"
    echo "DB_USERNAME: $DB_USERNAME"
    echo "DB_PASSWORD: [hidden]"
    exit 1
fi

echo "✅ Database variables are set"

# Test database connection
echo "🔌 Testing database connection..."
php artisan tinker --execute="
try {
    DB::connection()->getPdo();
    echo '✅ Database connection successful';
} catch (Exception \$e) {
    echo '❌ Database connection failed: ' . \$e->getMessage();
    exit(1);
}
"

if [ $? -eq 0 ]; then
    echo "✅ Database connection test passed"
else
    echo "❌ Database connection test failed"
    exit 1
fi

echo "🎉 Database configuration is ready!" 