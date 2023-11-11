FROM        debian:bookworm
RUN         apt update && apt upgrade -y; apt install -y curl php-fpm php-mysql wget && apt clean;
RUN         sed -i 's/listen = \/run\/php\/php8.2-fpm.sock/listen = 0.0.0.0:9000/' /etc/php/8.2/fpm/pool.d/www.conf;
COPY        ./tools/set.sh set_adminer.sh
ENTRYPOINT  [ "bash", "set_adminer.sh" ]
CMD         [ "php-fpm8.2", "-F" ]
