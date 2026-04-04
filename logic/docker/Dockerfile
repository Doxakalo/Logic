FROM php:8.2-apache

RUN sed -i 's/80/8080/g' /etc/apache2/ports.conf /etc/apache2/sites-available/000-default.conf \
    && sed -i 's|/var/www/html|/var/www|g' /etc/apache2/sites-available/000-default.conf \
    && a2enmod rewrite \
    && sed -i 's/AllowOverride None/AllowOverride All/g' /etc/apache2/apache2.conf

WORKDIR /var/www

EXPOSE 8080