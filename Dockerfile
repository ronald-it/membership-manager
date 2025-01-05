FROM php:8.2-fpm-buster

# Installeer benodigde pakketten
RUN apt-get update && apt-get install -y curl gnupg nginx && \
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

# Nginx configuratie kopiëren
COPY conf/nginx/nginx-site.conf /etc/nginx/sites-available/default
RUN ln -sf /etc/nginx/sites-available/default /etc/nginx/sites-enabled/default

# Exposeer poort 80
EXPOSE 80

# Start Nginx en PHP-FPM via een startscript
CMD service php8.2-fpm start && nginx -g "daemon off;"
