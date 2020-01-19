FROM porchn/php5.6-apache

COPY . /var/www/html/

COPY ./vhosts.conf /etc/apache2/sites-enabled/000-default.conf

EXPOSE 80
