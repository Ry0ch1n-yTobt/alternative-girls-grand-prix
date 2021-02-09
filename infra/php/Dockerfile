FROM php:7.4-fpm-buster
SHELL ["/bin/bash", "-oeux", "pipefail", "-c"]

ENV COMPOSER_ALLOW_SUPERUSER=1 \
    COMPOSER_HOME=/composer

COPY --from=composer:1.10 /usr/bin/composer /usr/bin/composer

RUN apt-get update && \
    apt-get -y install git unzip libzip-dev libicu-dev libonig-dev locales && \
    apt-get clean && \
    rm -rf /var/lib/apt/lists/* && \
    pecl install xdebug && \
    docker-php-ext-enable xdebug && \
    docker-php-ext-install intl pdo_mysql zip bcmath
RUN sed -i -E 's/# (ja_JP.UTF-8)/\1/' /etc/locale.gen && locale-gen
ENV LANG ja_JP.UTF-8

COPY ./php.ini /usr/local/etc/php/php.ini

WORKDIR /work