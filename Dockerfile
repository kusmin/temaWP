FROM wordpress:latest

WORKDIR /var/www/html

COPY . /var/www/html

RUN chown -R www-data:www-data /var/www/html \
&& chmod -R 755 /var/www/html
