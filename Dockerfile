FROM richarvey/nginx-php-fpm:3.1.6

# Copy all project files into the image
COPY . .

# Image configuration
ENV SKIP_COMPOSER 1
ENV WEBROOT /var/www/html/public
ENV PHP_ERRORS_STDERR 1
ENV RUN_SCRIPTS 1
ENV REAL_IP_HEADER 1

# Laravel configuration
ENV APP_ENV production
ENV APP_DEBUG false
ENV LOG_CHANNEL stderr

# Install missing PHP extensions (for Supabase PostgreSQL)
RUN apt-get update && apt-get install -y libpq-dev && docker-php-ext-install pdo_pgsql

# Allow composer to run as superuser (if needed for future updates)
ENV COMPOSER_ALLOW_SUPERUSER 1

# Set correct permissions for storage and cache directories
RUN chmod -R 777 storage bootstrap/cache

# Cache Laravel configurations for production
RUN php artisan config:cache
RUN php artisan route:cache
RUN php artisan view:cache

# Start Laravel using Nginx and PHP-FPM
CMD ["/start.sh"]
