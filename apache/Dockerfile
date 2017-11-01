FROM php:rc-apache
COPY /src /var/www/html/
RUN apt-get update
RUN docker-php-ext-install mysqli
ADD run.sh /run.sh
RUN chmod 755 /*.sh