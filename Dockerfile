# =============================================================================
# Stage 1: Build assets with Node
# =============================================================================
FROM node:22-alpine AS node-build

WORKDIR /app

COPY package.json package-lock.json ./
RUN npm ci --no-audit --no-fund

COPY postcss.config.js tailwind.config.js vite.config.js ./
COPY resources/ resources/
COPY public/ public/

RUN npm run build

# =============================================================================
# Stage 2: PHP dependencies with Composer
# =============================================================================
FROM composer:2 AS composer-build

WORKDIR /app

COPY composer.json composer.lock ./
RUN composer install \
    --no-dev \
    --no-scripts \
    --no-autoloader \
    --prefer-dist \
    --no-progress \
    --no-interaction

COPY . .
RUN composer install --no-dev --prefer-dist --no-progress --no-interaction && \
    composer dump-autoload --optimize

# =============================================================================
# Stage 3: Production image
# =============================================================================
FROM php:8.2-fpm-alpine AS production

# System dependencies
RUN apk add --no-cache \
    nginx \
    supervisor \
    curl \
    zip \
    unzip \
    git \
    libzip-dev \
    oniguruma-dev \
    freetype-dev \
    libjpeg-turbo-dev \
    libpng-dev \
    libxml2-dev \
    linux-headers \
    $([ $(uname -m) = "aarch64" ] && echo "" || echo "gmp-dev") \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) \
        pdo_mysql \
        mbstring \
        bcmath \
        gd \
        zip \
        xml \
        pcntl \
        exif \
    && rm -rf /var/cache/apk/*

# Install Redis extension (autoconf needed for phpize)
RUN apk add --no-cache autoconf gcc linux-headers libc-dev make && \
    pecl install redis && \
    docker-php-ext-enable redis && \
    apk del autoconf gcc linux-headers libc-dev make

# Create user to match host uid/guid (optional, defaults to 1000)
ARG UID=1000
ARG GID=1000
RUN addgroup -g ${GID} -S app && \
    adduser -u ${UID} -G app -S -h /var/www -s /bin/sh app

# Copy application files
WORKDIR /var/www

COPY --from=composer-build /app /var/www
COPY --from=node-build /app/public/build /var/www/public/build

# Copy infrastructure config
COPY docker-entrypoint.sh /usr/local/bin/docker-entrypoint.sh
COPY docker/nginx.conf /etc/nginx/nginx.conf
COPY docker/php.ini /usr/local/etc/php/conf.d/app.ini
COPY docker/supervisord.conf /etc/supervisor/supervisord.conf

# Storage & cache permissions
RUN chown -R app:app /var/www/storage /var/www/bootstrap/cache && \
    chmod -R 775 /var/www/storage /var/www/bootstrap/cache && \
    chmod +x /usr/local/bin/docker-entrypoint.sh

# Supervisor log directory
RUN mkdir -p /var/log/supervisor && chown -R app:app /var/log/supervisor

EXPOSE 80 443

ENTRYPOINT ["docker-entrypoint.sh"]
CMD ["supervisord", "-c", "/etc/supervisor/supervisord.conf"]
