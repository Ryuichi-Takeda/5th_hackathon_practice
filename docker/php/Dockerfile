FROM php:8.1-fpm
RUN pecl installdocker-php-ext-enable xdebug && \
docker-php-ext-install pdo_mysql

COPY ./php.ini /usr/local/etc/php/php.ini
COPY --from=composer /usr/bin/composer /usr/bin/composer
