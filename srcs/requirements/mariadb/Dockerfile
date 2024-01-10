FROM debian:bookworm

RUN apt update && apt upgrade -y; apt install mariadb-server -y
RUN mkdir -p /run/mysqld && chmod 777 /run/mysqld
RUN mariadb-install-db --user=mysql --datadir=/var/lib/mysql --skip-test-db
EXPOSE 3306
COPY ./tools/set.sh set_mariadb.sh
ENTRYPOINT ["/set_mariadb.sh"]
CMD ["mariadbd", "--user=mysql", "--bind-address=0.0.0.0"]
