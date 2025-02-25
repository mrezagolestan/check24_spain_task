FROM php:8.3.6-fpm

# Update and install essential packages and utilities
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    apt-utils \
    build-essential \
    openssl \
    libjpeg-dev \
    libpng-dev \
    libwebp-dev \
    libzip-dev \
    gcc \
    g++ \
    make \
    nano \
    curl \
    libpspell-dev \
    jpegoptim \
    optipng \
    pngquant \
    gifsicle \
    locales \
    libonig-dev \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libxml2-dev \
    zlib1g-dev \
    msmtp \
    perl \
    wget \
    procps \
    libcurl4-openssl-dev \
    libgmp-dev \
    libssl-dev \
    ffmpeg \
    autoconf \
    automake \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

# Configure GD extension for image manipulation
RUN docker-php-ext-configure gd --enable-gd --with-freetype --with-jpeg --with-webp
RUN docker-php-ext-install gd

# Install other PHP extensions
RUN docker-php-ext-install intl \
    pcntl \
    gmp \
    pdo_mysql \
    mbstring \
    opcache \
    exif \
    sockets \
    bcmath \
    zip \
    soap \
    curl \
    xml \
    pspell \
    posix \
    ftp

RUN pecl channel-update pecl.php.net  && pecl install redis && docker-php-ext-enable redis

# Install Composer globally
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Command to run the PHP-FPM service (optional)
CMD ["php-fpm"]