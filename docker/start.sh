#!/bin/sh
set -e

: "${PORT:=10000}"

mkdir -p \
    storage/framework/cache/data \
    storage/framework/views \
    storage/framework/sessions \
    bootstrap/cache \
    database

chown -R www-data:www-data storage bootstrap/cache database
chmod -R ug+rwX storage bootstrap/cache database

# Create SQLite database if it doesn't exist
if [ ! -f database/database.sqlite ]; then
    touch database/database.sqlite
    chown www-data:www-data database/database.sqlite
    chmod 664 database/database.sqlite
fi

php artisan config:clear --no-interaction || true
php artisan route:clear --no-interaction || true
php artisan view:clear --no-interaction || true

# Run migrations and seeders for SQLite
php artisan migrate --force --no-interaction
php artisan db:seed --force --no-interaction

php artisan config:cache --no-interaction
php artisan route:cache --no-interaction
php artisan view:cache --no-interaction

envsubst '${PORT}' < /etc/nginx/templates/default.conf.template > /etc/nginx/conf.d/default.conf

php-fpm -D
exec nginx -g 'daemon off;'
