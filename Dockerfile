# Victor Vanguard International - PHP-FPM image (Laravel 13, SQLite)
FROM php:8.4-fpm-alpine

# System deps + PHP extensions (pdo_sqlite for the SQLite database)
RUN apk add --no-cache \
        git \
        unzip \
        libzip-dev \
        icu-dev \
        oniguruma-dev \
        sqlite \
        sqlite-dev \
    && docker-php-ext-install pdo pdo_sqlite zip intl bcmath opcache

# Composer (copied from the official image)
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Custom PHP settings
COPY docker/php/local.ini /usr/local/etc/php/conf.d/local.ini

WORKDIR /var/www/html

# Copy the application (in dev this is overridden by a bind mount in docker-compose)
COPY . .

# Install PHP dependencies (kept in the image for standalone runs)
RUN composer install --no-interaction --prefer-dist --optimize-autoloader --no-scripts

# Writable directories for Laravel
RUN chown -R www-data:www-data storage bootstrap/cache

EXPOSE 9000
CMD ["php-fpm"]
