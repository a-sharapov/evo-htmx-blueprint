FROM php:7.4-apache
RUN a2enmod rewrite 
RUN apt-get update --fix-missing \
    && apt-get install -y --no-install-recommends \
    zlib1g-dev \
    libzip-dev \
    zip \
    libxpm-dev \
    libpng-dev \
    libwebp-dev \
    libjpeg-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    libonig-dev
RUN docker-php-ext-configure gd \
    --with-webp \
    --with-jpeg \
    --with-xpm \
    --with-freetype \
    && docker-php-ext-install mbstring mysqli zip gd \
    && rm -rf /tmp/* \
    && rm -rf /var/lib/apt/lists/*
RUN apt-get clean
EXPOSE 80
#RUN sed -i "s/Listen 80/Listen 5000/" /etc/apache2/ports.conf 