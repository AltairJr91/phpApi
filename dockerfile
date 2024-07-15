FROM php as base
WORKDIR /var/www/html
COPY . .
cmd ["php", "-S"]