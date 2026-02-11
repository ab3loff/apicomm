FROM php:8.4-fpm

RUN apt-get update && apt-get install -y \
    git \
    curl \
    unzip \
    supervisor \
    libpq-dev \
    libzip-dev \
    libonig-dev \
    libxml2-dev \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    librabbitmq-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install pcntl sockets pdo pdo_pgsql mbstring zip bcmath gd

RUN pecl install redis amqp && docker-php-ext-enable redis amqp pcntl sockets

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

COPY ./_docker/php/php.ini /usr/local/etc/php/conf.d/php.ini
COPY ./_docker/supervisor/queue.conf /etc/supervisor/conf.d/queue.conf

RUN mkdir -p /var/log/supervisor


RUN mkdir -p /var/www/storage && \
    chown -R www-data:www-data /var/www/storage && \
    chmod -R 775 /var/www/storage

WORKDIR /var/www


COPY ./_docker/php/start.sh /usr/local/bin/start.sh
RUN chmod +x /usr/local/bin/start.sh

CMD ["/usr/local/bin/start.sh"]
