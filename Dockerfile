# ==================================
# 1️⃣ MULTI-STAGE KARENA ADA 2 FROM
# ==================================


# ========================
# 1️⃣ Build Vite Assets
# ========================
FROM node:18-alpine AS node-builder

WORKDIR /app
COPY package*.json ./
RUN npm install
COPY resources resources
COPY vite.config.* ./
RUN npm run build


# ========================
# 2️⃣ PHP + Laravel
# ========================
FROM php:8.2-fpm

# OS dependencies
RUN apt-get update && apt-get install -y \
    git zip unzip curl \
    libpng-dev libonig-dev libxml2-dev \
    && docker-php-ext-install pdo pdo_mysql mbstring exif bcmath gd \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# Composer
COPY --from=composer:2.6 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

# Copy composer files dulu (biar cache kepakai)
COPY composer.json composer.lock ./
RUN composer install --no-dev --optimize-autoloader --no-interaction

# Copy source code
COPY . .

# Copy hasil build Vite
COPY --from=node-builder /app/public/build public/build

# Permission Laravel
RUN chown -R www-data:www-data \
    storage bootstrap/cache public/build \
    && chmod -R 775 storage bootstrap/cache public/build

CMD ["php-fpm"]
