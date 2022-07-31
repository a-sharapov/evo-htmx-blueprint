FROM php:7.4-apache
RUN a2enmod rewrite 
RUN docker-php-ext-install pdo pdo_mysql
RUN apt-get update \
    && apt-get install -y libzip-dev \
    && apt-get install -y zlib1g-dev \
    && rm -rf /var/lib/apt/lists/* \
    && docker-php-ext-install zip
EXPOSE 80
#RUN sed -i "s/Listen 80/Listen 5000/" /etc/apache2/ports.conf 