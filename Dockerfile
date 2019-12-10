FROM wordpress:latest

COPY ["themes","/usr/src/wordpress/wp-content/themes"]
COPY ["plugins","/usr/src/wordpress/wp-content/plugins"]
RUN chown -R www-data:www-data /usr/src/wordpress/*
RUN ls -l /usr/src/wordpress/wp-content/plugins
COPY ./config/uploads.ini /usr/local/etc/php/conf.d/uploads.ini

