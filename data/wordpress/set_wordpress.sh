#!/bin/sh

# if  [ ! -d "/usr/local/bin/wp" ]; then
    curl -o /usr/local/bin/wp https://raw.githubusercontent.com/wp-cli/builds/gh-pages/phar/wp-cli.phar;
    chmod +x /usr/local/bin/wp;
# fi
if [ ! -f "/var/www/html/wp-config.php" ]; then
    wp core download --path=/var/www/html --locale=en_US --allow-root;
    wp config create --allow-root --dbname=wp_db --dbuser=wp_user --dbpass=1234 --dbhost=wp-60sec-db;
    wp core install --allow-root --url=http://10.11.249.205:8085 --title=test --admin_user=test --admin_password=test --admin_email=admin@gmail.com;
    
    wp config set WP_REDIS_HOST redis --allow-root
    wp config set WP_REDIS_PORT 6379 --allow-root
    wp config set WP_REDIS_DATABASE 0 --allow-root
    wp config set WP_CACHE true --allow-root
    wp plugin update --all --allow-root
    wp plugin install redis-cache --activate --allow-root
    wp redis enable --allow-root
fi

echo "finish script";

exec "$@"