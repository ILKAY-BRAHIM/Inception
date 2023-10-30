# Use Alpine Linux as the base image
FROM	debian:bookworm

# Set the working directory to /var/www/html
WORKDIR /var/www/html

# Install necessary packages
RUN		apt update && apt upgrade -y; apt install -y curl php-fpm php-mysql mariadb-client vim;
RUN  sed -i 's/listen = \/run\/php\/php8.2-fpm.sock/listen = 0.0.0.0:9000/' /etc/php/8.2/fpm/pool.d/www.conf;
# RUN    curl -o /usr/local/bin/wp https://raw.githubusercontent.com/wp-cli/builds/gh-pages/phar/wp-cli.phar;
# RUN    chmod +x /usr/local/bin/wp;
# RUN     wp core download --path=/var/www/html --locale=en_US --allow-root;
# RUN    sed -i 's/listen = \/run\/php\/php8.2-fpm.sock/listen = 0.0.0.0:9000/' /etc/php/8.2/fpm/pool.d/www.conf;
# RUN    wp config create --allow-root --dbname=wp_db --dbuser=wp_user --dbpass=1234 --dbhost=wp-60sec-db;
# RUN    wp core install --allow-root --url=http://10.11.249.205:8085 --title=test --admin_user=test --admin_password=test --admin_email=admin@gmail.com;

# Download and install WordPress
# RUN curl -o wordpress.tar.gz -fSL "https://wordpress.org/latest.tar.gz" \
#     && tar -xzf wordpress.tar.gz -C /var/www/html \
#     && rm wordpress.tar.gz \
#     && chown -R nobody:nogroup /var/www/html

# Expose port 9000 for PHP-FPM
EXPOSE 9000
COPY ./set.sh set_wordpress.sh

ENTRYPOINT ["bash" , "set_wordpress.sh"]

# Start PHP-FPM
CMD ["php-fpm8.2", "-F"]