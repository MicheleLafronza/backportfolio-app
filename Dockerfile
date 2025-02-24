# Usa un'immagine di PHP con FPM
FROM php:8.2-fpm

# Installa le librerie necessarie per Laravel
RUN apt-get update && apt-get install -y libpng-dev libjpeg-dev libfreetype6-dev zip git \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd pdo pdo_mysql

# Modifica il file di configurazione di PHP-FPM per ascoltare su 0.0.0.0:80 anziché sul socket Unix
RUN sed -i 's|listen = /var/run/php/php-fpm.sock|listen = 0.0.0.0:80|g' /usr/local/etc/php-fpm.d/www.conf

# Installa Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Imposta la directory di lavoro all'interno del container
WORKDIR /var/www

# Copia i file dell'applicazione nel container
COPY . .

# Installa le dipendenze di Laravel
RUN composer install --no-interaction --prefer-dist

# Espone la porta 80 per il traffico HTTP
EXPOSE 80

# Avvia PHP-FPM
CMD ["php-fpm"]


