# Usa una base image PHP con supporto FPM
FROM php:8.2-fpm

# Installa le dipendenze necessarie per Laravel (e per MySQL)
RUN apt-get update && apt-get install -y libpng-dev libjpeg-dev libfreetype6-dev zip git \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd pdo pdo_mysql

# Installa Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Imposta la directory di lavoro
WORKDIR /var/www

# Copia i file dell'applicazione nel contenitore
COPY . .

# Installa le dipendenze di Laravel
RUN composer install --no-interaction --prefer-dist

# Espone la porta 80 per il traffico HTTP
EXPOSE 80

# Avvia PHP-FPM
CMD ["php-fpm"]


