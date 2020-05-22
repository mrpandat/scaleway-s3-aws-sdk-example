FROM php:7.4-cli
COPY . /usr/src/
WORKDIR /usr/src/
COPY .aws/credentials /root/.aws/credentials
CMD [ "php", "./src/index.php" ]