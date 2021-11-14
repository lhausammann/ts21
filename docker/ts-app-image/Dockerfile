ARG PHP_VERSION="7.3"

FROM php:${PHP_VERSION}-apache-buster

# set document root by env
ENV APACHE_DOCUMENT_ROOT /var/www/html

# install another bunch of tools we need
RUN apt-get update && apt-get install -y \
    git \
    zip \
    screen \
    sudo \
    curl \
    uuid-runtime \
    libxslt1-dev \
    npm \
    && rm -rf /var/lib/apt/lists/*

# install composer, node and npm
COPY --from=composer /usr/bin/composer /usr/bin/composer
COPY --from=node:16 /usr/local /usr/local

RUN npm install -g yarn --force

# fix configuration
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf
RUN sed -ri -e 's!AllowOverride None!AllowOverride All!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# install some needed php extensions
RUN docker-php-ext-configure opcache --enable-opcache \
    && docker-php-ext-install opcache
COPY config/opcache.ini $PHP_INI_DIR/conf.d/

RUN docker-php-ext-install pdo_mysql intl xsl

RUN pecl install xdebug \
    && docker-php-ext-enable xdebug

RUN pecl install apcu \
    && docker-php-ext-enable apcu

RUN pecl install redis && docker-php-ext-enable redis

# enable apache mod rewrite
RUN a2enmod rewrite


