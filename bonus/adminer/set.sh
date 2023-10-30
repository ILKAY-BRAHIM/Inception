#!/bin/sh

if [ ! -f /var/www/html/adminer/index.php ]; then
    mkdir -p /var/www/html/adminer;
    # cd /var/www/html/adminer;
    # wget https://github.com/vrana/adminer/releases/download/v4.8.1/adminer-4.8.1.php;
    wget -O /var/www/html/adminer/index.php https://github.com/vrana/adminer/releases/download/v4.8.1/adminer-4.8.1-en.php;
fi

exec "$@"