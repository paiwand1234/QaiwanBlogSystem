FROM php:latest
LABEL authors="sherlock"

COPY . /usr/src/myapp
WORKDIR /usr/src/myapp

CMD [ "php", "./views/Home.php" ]