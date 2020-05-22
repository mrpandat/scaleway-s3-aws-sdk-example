FROM php:7.4-cli-alpine
COPY . /usr/src/
WORKDIR /usr/src/

RUN apk add --no-cache \
    git \
    zip \
    unzip \
    curl

RUN curl -sS https://getcomposer.org/installer | php && mv composer.phar /usr/local/bin/composer
RUN composer install

CMD [ "php", "./src/index.php" ]