FROM php:8.2-fpm
RUN apt-get update && apt-get install -y \
    redis-server \
    && pecl install redis \
    && docker-php-ext-enable redis
