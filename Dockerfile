FROM php:8.1-fpm-buster

# Installeer curl, gnupg en een specifieke Node.js versie
RUN apt-get update && apt-get install -y curl gnupg && \
    curl -fsSL https://deb.nodesource.com/setup_20.x | bash - && \
    apt-get install -y nodejs && \
    npm install -g npm@11.0.0 && \
    apt-get clean && rm -rf /var/lib/apt/lists/*

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
