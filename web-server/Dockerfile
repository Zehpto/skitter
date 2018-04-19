FROM php:7.0-apache

RUN docker-php-source extract && \ 
	docker-php-ext-install mysqli \
	&& docker-php-source delete

RUN mkdir /var/www/html/CSS/
RUN mkdir /var/www/html/img/
RUN mkdir /var/www/html/php/
RUN mkdir /var/www/html/profile_picture/

COPY CSS /var/www/html/CSS
COPY img /var/www/html/img
COPY php /var/www/html/php

RUN chmod -R 777 /var/www/html/CSS
RUN chmod -R 777 /var/www/html/img
RUN chmod -R 777 /var/www/html/php

COPY * /var/www/html/

RUN chmod -R 777 /var/www/html

RUN echo 'AddType image/x-icon .ico' >> /etc/apache2/httpd.conf

COPY /index.html /var/www/html/

EXPOSE 81
