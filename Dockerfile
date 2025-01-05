FROM php:8.1-fpm-buster

RUN apt-get update && apt-get install -y curl gnupg && \
    curl -fsSL https://deb.nodesource.com/setup_18.x | bash - && \
    apt-get install -y nodejs && \
    npm install -g npm@latest && \
    apt-get clean && rm -rf /var/lib/apt/lists/*

WORKDIR /var/www/html

COPY . .

RUN composer install --no-dev --optimize-autoloader
RUN npm ci && npm run build

RUN php artisan config:cache
RUN php artisan route:cache
RUN php artisan view:cache

RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

ENV APP_ENV=production
ENV APP_DEBUG=false
ENV LOG_CHANNEL=stderr

CMD ["php-fpm"]
