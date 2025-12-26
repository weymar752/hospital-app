# Usa imagen PHP con Apache (versión más estable)
FROM php:8.2-apache-bullseye

# Instala solo lo esencial para Laravel + PostgreSQL
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libpq-dev \
    zip \
    unzip \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install pdo pdo_pgsql gd \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# Instala Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copia el código
COPY . /var/www/html

# Copia configuración de Apache
COPY apache-config.conf /etc/apache2/sites-available/000-default.conf

# Habilita mod_rewrite para Laravel
RUN a2enmod rewrite

# Configura permisos y Laravel (forzar redeploy)
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html/storage \
    && php artisan config:cache \
    && php artisan route:cache \
    && php artisan view:cache \
    && php artisan migrate --force \
    && php artisan db:seed --force \
    && php artisan storage:link

# Expone puerto
EXPOSE 80

# Inicia Apache
CMD ["apache2-foreground"]