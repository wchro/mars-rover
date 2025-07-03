FROM php:8.4.8-cli

RUN apt-get update && apt-get install -y \
    unzip \
    libzip-dev \
    zip \
    curl \
    && docker-php-ext-install zip

RUN apt-get install nodejs npm -y

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

COPY . /var/www

RUN composer install

RUN npm install && npm run build

EXPOSE 8000
