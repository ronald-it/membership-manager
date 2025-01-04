# Use Nginx + PHP-FPM as the base image
FROM richarvey/nginx-php-fpm:3.1.6

# Set the working directory
WORKDIR /var/www/html

# Copy only the necessary files for Composer
COPY composer.json composer.lock ./

# Install Composer inside the container
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Install Composer dependencies
RUN composer install --no-dev --optimize-autoloader

# Copy the remaining project files into the container
COPY . .

# Set Laravel environment variables
ENV APP_ENV production
ENV APP_DEBUG false
ENV LOG_CHANNEL stderr
ENV WEBROOT /var/www/html/public

# Install required PHP extensions (for Supabase PostgreSQL)
RUN apk update && apk add --no-cache postgresql-dev \
    && docker-php-ext-install pdo_pgsql

# Set permissions for storage and cache directories
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Cache Laravel configuration files for production
RUN php artisan config:cache
RUN php artisan route:cache
RUN php artisan view:cache

# Start Laravel with Nginx and PHP-FPM
CMD ["/start.sh"]
