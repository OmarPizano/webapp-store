FROM php:8.0.0-apache
# RUN mv "$PHP_INI_DIR/php.ini-development" "$PHP_INI_DIR/php.ini"
RUN docker-php-ext-install mysqli
RUN a2enmod rewrite

# Permisos para poder subir archivos
#RUN chown -R www-data:www-data /var/www

RUN useradd -M -N -u 1000 developer

RUN chown -R developer:www-data /var/www

RUN chmod 755 /var/www

USER developer