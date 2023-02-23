FROM php:8.0.0-apache
RUN docker-php-ext-install mysqli
RUN a2enmod rewrite
RUN mv "$PHP_INI_DIR/php.ini-development" "$PHP_INI_DIR/php.ini"