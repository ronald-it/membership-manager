FROM richarvey/nginx-php-fpm:3.1.6

# Copy all project files
COPY . .

# Laravel environment configuration
ENV APP_ENV production
ENV APP_DEBUG false
ENV LOG_CHANNEL stderr
ENV WEBROOT /var/www/html/public

# Install missing PHP extensions (for Supabase PostgreSQL)
RUN apt-get update && apt-get install -y libpq-dev && docker-php-ext-install pdo_pgsql

# Allow composer to run as a superuser (if needed for updates)
ENV COMPOSER_ALLOW_SUPERUSER 1

# Cache Laravel configurations for production
RUN php artisan config:cache
RUN php artisan route:cache
RUN php artisan view:cache

# Start Laravel with Nginx and PHP-FPM
CMD ["/start.sh"]
