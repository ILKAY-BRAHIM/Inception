#!/bin/sh

if [ ! -d /var/lib/mysql/wp_db ]; then
    cat << EOF > fill
    FLUSH PRIVILEGES ;
    CREATE DATABASE ${MYSQL_DATABASE};
    CREATE USER '${MYSQL_USER}'@'%' IDENTIFIED BY '${MYSQL_PASSWORD}';
    GRANT ALL PRIVILEGES ON *.* TO '${MYSQL_USER}'@'%';
    FLUSH PRIVILEGES;
EOF
    mariadbd --user=mysql --bootstrap < fill
    rm fill
fi

exec "$@"