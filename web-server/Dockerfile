FROM php:7.0-apache

RUN mkdir /var/www/html/CSS/
RUN mkdir /var/www/html/img/
RUN mkdir /var/www/html/php/


COPY CSS /var/www/html/CSS
COPY img /var/www/html/img
COPY php /var/www/html/php

RUN chmod -R 777 /var/www/html/CSS
RUN chmod -R 777 /var/www/html/img
RUN chmod -R 777 /var/www/html/php

COPY /index.html /var/www/html/

EXPOSE 81
