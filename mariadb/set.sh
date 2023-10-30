#!/bin/sh

if [ ! -d /var/lib/mysql/wp_db ]; then
    cat << EOF > fill
    FLUSH PRIVILEGES ;
    CREATE DATABASE wp_db;
    CREATE USER 'wp_user'@'%' IDENTIFIED BY '1234';
    GRANT ALL PRIVILEGES ON *.* TO 'wp_user'@'%';
    FLUSH PRIVILEGES;
EOF
    mariadbd --user=mysql --bootstrap < fill
    rm fill
fi

exec "$@"