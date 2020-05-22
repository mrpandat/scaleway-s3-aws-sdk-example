FROM php:7.4-cli
COPY . /usr/src/
WORKDIR /usr/src/
CMD [ "php", "./src/index.php" ]