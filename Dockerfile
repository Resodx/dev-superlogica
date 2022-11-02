FROM php:8.1.11-fpm-alpine

RUN apk update

WORKDIR /var/www

# Install dependencies
RUN apk add --no-cache \
    make \
    libpng-dev \
    oniguruma-dev \
    libzip-dev  \
    libjpeg-turbo-dev \
    freetype-dev \
    gettext \
    libintl \
    gettext-dev \
    cmake \
    musl-dev \
    zip \
    jpegoptim optipng pngquant gifsicle \
    vim \
    unzip \
    git \
    curl \
    zlib-dev \
    icu-dev \
    g++

# Install extensions
RUN docker-php-ext-install pdo_mysql mbstring zip exif pcntl
RUN docker-php-ext-configure gd
RUN docker-php-ext-install gd
RUN docker-php-ext-configure intl
RUN docker-php-ext-install intl

# Install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Add user for application
RUN addgroup -g 1000 user
RUN adduser -D -u 1000 -h /bin/bash -G user superlogica

# Copy existing application directory contents
COPY . /var/www

# Copy existing application directory permissions
COPY --chown=superlogica:superlogica . /var/www

# Change current user to www
USER superlogica

# Expose port 9000 and start php-fpm server
EXPOSE 9000
CMD ["php-fpm"]
