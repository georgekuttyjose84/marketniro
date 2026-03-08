FROM php:8.2-fpm

WORKDIR /var/www

RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libzip-dev \
    libonig-dev \
    libxml2-dev \
    curl

RUN docker-php-ext-install \
    pdo \
    pdo_mysql \
    mbstring \
    zip \
    xml

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

CMD ["php-fpm"]
