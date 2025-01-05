FROM php:8.2-fpm-buster

# Installeer curl, gnupg en de laatste stabiele Node.js en npm
RUN apt-get update && apt-get install -y curl gnupg && \
    curl -fsSL https://deb.nodesource.com/setup_current.x | bash - && \
    apt-get install -y nodejs zip unzip git && \
    npm install -g npm@latest && \
    apt-get clean && rm -rf /var/lib/apt/lists/*

# Installeer Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

WORKDIR /var/www/html

COPY . .

# Laravel dependencies installeren en assets bouwen
RUN composer install --no-dev --optimize-autoloader
RUN npm ci && npm run build

# Laravel optimalisaties
RUN php artisan config:cache
RUN php artisan route:cache
RUN php artisan view:cache

# Correcte permissies voor Laravel
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Environment variabelen instellen
ENV APP_ENV=production
ENV APP_DEBUG=false
ENV LOG_CHANNEL=stderr

CMD ["php-fpm"]
