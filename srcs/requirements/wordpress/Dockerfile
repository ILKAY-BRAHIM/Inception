FROM	    debian:bookworm
WORKDIR     /var/www/html
RUN		    apt update && apt upgrade -y; apt install -y curl php-fpm php-mysql mariadb-client vim;
RUN         sed -i 's/listen = \/run\/php\/php8.2-fpm.sock/listen = 0.0.0.0:9000/' /etc/php/8.2/fpm/pool.d/www.conf;
RUN         curl -o /usr/local/bin/wp https://raw.githubusercontent.com/wp-cli/builds/gh-pages/phar/wp-cli.phar;
RUN         chmod +x /usr/local/bin/wp;
COPY        ./tools/set.sh /set_wordpress.sh
EXPOSE      9000
ENTRYPOINT  ["bash" , "/set_wordpress.sh"]
CMD         ["php-fpm8.2", "-F"]