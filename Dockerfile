# Usa un'immagine di PHP con FPM (FastCGI Process Manager)
FROM php:8.2-fpm

# Installa le librerie necessarie per Laravel
RUN apt-get update && apt-get install -y libpng-dev libjpeg-dev libfreetype6-dev zip git \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd pdo pdo_mysql

# Installa Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Imposta la directory di lavoro all'interno del container
WORKDIR /var/www

# Copia i file dell'applicazione nel container
COPY . .

# Installa le dipendenze di Laravel
RUN composer install --no-interaction --prefer-dist

# Espone la porta 10000, che è quella di Render
EXPOSE 10000

# Avvia il server PHP
CMD ["php-fpm"]

