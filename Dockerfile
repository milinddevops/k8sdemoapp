FROM shihta/php-5.6-apache

COPY . /var/www/html/

COPY ./vhost.conf /etc/apache2/sites-enabled/000-default.conf

EXPOSE 80
