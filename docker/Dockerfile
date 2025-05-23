########################  Node assets  ###################################
FROM node:20-bullseye-slim AS nodebuild
WORKDIR /app
COPY package*.json vite.config.js ./
RUN npm ci
COPY resources ./resources
RUN npm run build


########################  Composer stage  ################################
FROM composer:2 AS vendor
WORKDIR /app
COPY . .
RUN composer install --prefer-dist --no-dev --no-interaction --no-progress

# #######################  Runtime (PHP 8.3 Apache with Node & Composer) #####
# Use the official PHP Apache image and install Node and Composer so that
# `composer` and `npm` commands can be executed inside the running container.
FROM php:8.3-apache AS app
WORKDIR /var/www/html

# Install Composer and Node so they are available at runtime
RUN apt-get update \
    && apt-get install -y --no-install-recommends git unzip curl \
    && curl -fsSL https://deb.nodesource.com/setup_20.x | bash - \
    && apt-get install -y --no-install-recommends nodejs \
    && curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# Configure Apache to serve from /var/www/html/public
ENV APACHE_DOCUMENT_ROOT=/var/www/html/public
RUN a2enmod rewrite \
    && sed -ri 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# --- Copy code & built assets ------------------------------------------------
COPY --from=vendor    /app /var/www/html
COPY . /var/www/html
COPY --from=nodebuild /app/public ./public
# --- guarantee Laravel cache + view dirs exist & are writable -------
RUN set -e \
    && mkdir -p storage/framework/{views,cache/data,sessions} \
    && chown -R www-data:www-data storage bootstrap/cache \
    && chmod -R 775 storage bootstrap/cache

EXPOSE 80
CMD ["apache2-foreground"]
