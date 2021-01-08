FROM php:7.4-fpm
COPY php.ini /usr/local/etc/php/

# vim install
RUN apt-get update
RUN apt-get install -y vim

# php module
RUN apt-get update && apt-get install -y \
   zlib1g-dev \
   git \
   libzip* \
   libonig-dev \
   libc-client-dev \
   libkrb5-dev

RUN rm -r /var/lib/apt/lists/*

RUN PHP_OPENSSL=yes docker-php-ext-configure imap --with-kerberos --with-imap-ssl \
    && docker-php-ext-install zip pdo_mysql mysqli mbstring imap

# composer install
COPY --from=composer /usr/bin/composer /usr/bin/composer
 
# npm install
RUN curl -sL https://deb.nodesource.com/setup_12.x | bash -
RUN apt-get install -y nodejs
