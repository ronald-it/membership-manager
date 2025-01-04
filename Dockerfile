# Gebruik de base image
FROM richarvey/nginx-php-fpm:3.1.6

# Stel de werkdirectory in
WORKDIR /var/www/html

# Kopieer de applicatie naar de container
COPY . .

# Laravel omgevingsvariabelen
ENV APP_ENV production
ENV APP_DEBUG false
ENV LOG_CHANNEL stderr
ENV WEBROOT /var/www/html/public

# Installeer Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Installeer PHP-extensies (voor PostgreSQL)
RUN apk update && apk add --no-cache postgresql-dev \
    && docker-php-ext-install pdo_pgsql

# Stel permissies in voor storage en cache directories
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Installeer Composer dependencies zonder development dependencies
RUN composer install --no-dev --optimize-autoloader

# Kopieer aangepaste NGINX-configuratie
COPY nginx-laravel.conf /etc/nginx/sites-available/default

# Schakel de aangepaste configuratie in
RUN ln -s /etc/nginx/sites-available/default /etc/nginx/sites-enabled/default

# Start NGINX en PHP-FPM
CMD ["/start.sh"]
