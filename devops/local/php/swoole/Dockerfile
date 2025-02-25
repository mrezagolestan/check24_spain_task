FROM php:8.3.6-cli

RUN apt-get update
RUN apt-get install -y --no-install-recommends apt-utils
RUN apt-get install -y git
RUN apt-get install -y unzip
RUN apt-get install -y openssl
RUN apt-get install -y libjpeg-dev
RUN apt-get install -y libpng-dev
RUN apt-get install -y libwebp-dev
RUN apt-get install -y libzip-dev
RUN apt-get install -y gcc
RUN apt-get install -y g++
RUN apt-get install -y make
RUN apt-get install -y nano
RUN apt-get install -y curl
RUN apt-get install -y libpspell-dev
RUN apt-get install -y jpegoptim
RUN apt-get install -y optipng
RUN apt-get install -y pngquant
RUN apt-get install -y gifsicle
RUN apt-get install -y locales
RUN apt-get install -y libonig-dev
RUN apt-get install -y libfreetype6-dev
RUN apt-get install -y libmcrypt-dev
RUN apt-get install -y libxml2-dev
RUN apt-get install -y zlib1g-dev
RUN apt-get install -y perl
RUN apt-get install -y wget
RUN apt-get install -y procps
RUN apt-get install -y libcurl4-openssl-dev
RUN apt-get install -y make
RUN apt-get install -y automake
RUN apt-get install -y autoconf
RUN apt-get install -y libgmp-dev

RUN docker-php-ext-configure gd --enable-gd --with-freetype --with-jpeg --with-webp
RUN docker-php-ext-install gd
RUN docker-php-ext-install pcntl && docker-php-ext-configure pcntl
RUN docker-php-ext-install gmp && docker-php-ext-enable gmp
RUN docker-php-ext-install pdo_mysql && docker-php-ext-enable pdo_mysql
RUN docker-php-ext-install mbstring && docker-php-ext-enable mbstring
RUN docker-php-ext-install opcache && docker-php-ext-enable opcache
RUN docker-php-ext-install exif && docker-php-ext-enable exif
RUN docker-php-ext-install sockets && docker-php-ext-enable sockets
RUN docker-php-ext-install bcmath && docker-php-ext-enable bcmath
RUN docker-php-ext-install zip && docker-php-ext-enable zip
RUN docker-php-ext-install soap && docker-php-ext-enable soap
RUN docker-php-ext-install curl && docker-php-ext-enable curl
RUN docker-php-ext-install xml && docker-php-ext-enable xml
RUN docker-php-ext-install pspell && docker-php-ext-enable pspell
RUN docker-php-ext-install posix && docker-php-ext-enable posix
RUN docker-php-ext-install posix && docker-php-ext-enable opcache
RUN pecl install swoole && docker-php-ext-enable swoole
RUN pecl install redis && docker-php-ext-enable redis
RUN pecl install excimer

#composer install
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer