FROM php:7.4-cli
COPY . /usr/src/
WORKDIR /usr/src/

COPY .aws/credentials /root/.aws/credentials

RUN apt-get update && \
    apt-get upgrade -y && \
    apt-get install -y git zip unzip

RUN curl -sS https://getcomposer.org/installer | php && mv composer.phar /usr/local/bin/composer
RUN composer install

CMD [ "php", "./src/index.php" ]