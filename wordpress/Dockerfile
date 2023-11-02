# Use debian Linux as the base image
FROM	debian:bookworm

# Set the working directory to /var/www/html
WORKDIR /var/www/html

# Install necessary packages
RUN		apt update && apt upgrade -y; apt install -y curl php-fpm php-mysql mariadb-client vim;
RUN  sed -i 's/listen = \/run\/php\/php8.2-fpm.sock/listen = 0.0.0.0:9000/' /etc/php/8.2/fpm/pool.d/www.conf;
EXPOSE 9000
COPY ./set.sh set_wordpress.sh

ENTRYPOINT ["bash" , "set_wordpress.sh"]

# Start PHP-FPM
CMD ["php-fpm8.2", "-F"]