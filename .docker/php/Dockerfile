FROM php:8.1-fpm-alpine

# Copy File Config
COPY ./.docker/php/www.conf /usr/local/etc/php-fpm.d/www.conf

# Use the default production configuration
COPY ./.docker/php/php.ini "$PHP_INI_DIR/php.ini"

# ADD and set Group
RUN addgroup -g 1000 ubuntu && adduser -G ubuntu -g ubuntu -s /bin/sh -D ubuntu

# Create folder to run
RUN mkdir -p /var/www/html

# Set Profile
RUN chown ubuntu:ubuntu /var/www/html

# Work in the specific space
WORKDIR /var/www/html

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Install dependencies
RUN apk update \
    && apk upgrade \
    && apk add libzip \
    && apk add libzip-dev \
    && apk add zlib \
    && apk add zlib-dev \
    && docker-php-ext-configure zip \
    && docker-php-ext-install zip


RUN apk add --no-cache \
    icu-dev \
    libintl \
    freetype \
    freetype-dev \
    libjpeg-turbo \
    libjpeg-turbo-dev \
    libpng \
    libpng-dev \
    libwebp \
    libwebp-dev

# Install intl
RUN docker-php-ext-install intl

RUN docker-php-ext-configure gd \
    --with-freetype \
    --with-jpeg \
    --with-webp


RUN NPROC=$(grep -c ^processor /proc/cpuinfo 2>/dev/null || 1) && \
    docker-php-ext-install -j${NPROC} gd 

RUN apk del --no-cache freetype-dev libpng-dev libjpeg-turbo-dev

# Install MySQLi extension
RUN docker-php-ext-install mysqli

# Install PDO_Mysql extension
RUN docker-php-ext-install pdo pdo_mysql

# Install dependencies
RUN apk add --no-cache gcc make libc-dev

# # Install Zip extension
# RUN docker-php-ext-install zip

# # Enable Zip extension
# RUN docker-php-ext-enable zip

# Copy existing application directory contents
COPY ./src /var/www/html

# Copy existing application directory permissions
COPY --chown=ubuntu:ubuntu ./src /var/www/html

# Change current user to www
USER ubuntu

# Expose port 9000 and start php-fpm server
EXPOSE 9000
CMD ["php-fpm"]