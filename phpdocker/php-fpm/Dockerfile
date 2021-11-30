FROM php:8-fpm
WORKDIR "/var/www/site"

RUN apt-get update; \
    apt-get -y --no-install-recommends install \
        git \
        php8.0-mysql; \
    apt-get clean; \
    rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* /usr/share/doc/*
RUN docker-php-ext-install pdo pdo_mysql