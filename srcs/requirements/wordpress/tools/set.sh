#!/bin/sh

if [ ! -f "/var/www/html/wp-config.php" ]; then
    wp core download --path=/var/www/html --locale=en_US --allow-root;

    wp config create --allow-root --dbname=${WORDPRESS_DB_NAME} --dbuser=${WORDPRESS_DB_USER} --dbpass=${WORDPRESS_DB_PASSWORD} --dbhost=${WORDPRESS_DB_HOST};
    wp core install --allow-root --url=${WP_URL} --title=${WP_TITLE} --admin_user=${WP_ADMIN} --admin_password=${WP_ADMIN_PASSWD} --admin_email=${WP_ADMIN_EMAIL};
    wp user create ${USER_ED} ${WP_EDITOR_EMAIL} --role=editor --user_pass=${WP_PASSWD_ED} --path=/var/www/html/wordpress --allow-root;
    
    wp config set WP_REDIS_HOST redis --allow-root
    wp config set WP_REDIS_PORT 6379 --allow-root
    wp config set WP_REDIS_DATABASE 0 --allow-root
    wp config set WP_CACHE true --allow-root
    wp plugin update --all --allow-root
    wp plugin install redis-cache --activate --allow-root
    wp redis enable --allow-root
    chmod -R 755 /var/www/html/
    chown -R www-data:www-data /var/www/html/
fi

echo "finish script";

exec "$@"