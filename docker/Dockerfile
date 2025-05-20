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

########################  Runtime (PHP 8.3 Alpine)  ######################
FROM php:8.3-cli-alpine AS app
WORKDIR /app

# --- PHP extension: pdo_mysql ------------------------------------------------
RUN set -e; \
    apk add --no-cache --virtual .build-deps $PHPIZE_DEPS mariadb-dev; \
    docker-php-ext-install pdo_mysql; \
    apk del .build-deps

# --- Copy code & built assets ------------------------------------------------
COPY --from=vendor    /app /app
COPY --from=nodebuild /app/public ./public
COPY . /app
# --- guarantee Laravel cache + view dirs exist & are writable -------
RUN set -e \
    && mkdir -p storage/framework/{views,cache/data,sessions} \
    && chown -R 82:82 storage bootstrap/cache \
    && chmod -R 775 storage bootstrap/cache
# --- Run Laravel dev server ---------------------------------------------------
CMD ["php","artisan","serve","--host=0.0.0.0","--port=8080"]
