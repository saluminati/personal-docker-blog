FROM wordpress:latest

COPY ["themes","/usr/src/wordpress/wp-content/themes"]
COPY ["plugins","/usr/src/wordpress/wp-content/plugins"]
RUN chown -R www-data:www-data /usr/src/wordpress/*
RUN ls -l /usr/src/wordpress/wp-content/plugins
COPY ./config/uploads.ini /usr/local/etc/php/conf.d/uploads.ini

COPY entrypoint-child.sh /usr/bin/
RUN chmod +x /usr/bin/entrypoint-child.sh
ENTRYPOINT ["entrypoint-child.sh"]
CMD ["apache2-foreground"]