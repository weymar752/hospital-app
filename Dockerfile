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

# Directorio de trabajo
WORKDIR /var/www/html

# Instala dependencias PHP
RUN composer install --no-dev --optimize-autoloader

# Copia configuración de Apache
COPY apache-config.conf /etc/apache2/sites-available/000-default.conf

# Habilita mod_rewrite para Laravel
RUN a2enmod rewrite

# --- CAMBIO IMPORTANTE ---
# Configura SOLO permisos aquí.
# Quitamos los comandos 'artisan' de esta parte para evitar que cacheen configuraciones vacías.
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 775 /var/www/html/storage \
    && chmod -R 775 /var/www/html/bootstrap/cache \
    && chmod -R 755 /var/www/html/public

# Expone puerto 80
EXPOSE 80

# --- INICIO DE LA APLICACIÓN ---
# Solo limpia cachés e inicia Apache
# Las migraciones y seeders deben ejecutarse manualmente
CMD sh -c "php artisan storage:link && \
           php artisan config:clear && \
           php artisan route:clear && \
           php artisan view:clear && \
           apache2-foreground"
