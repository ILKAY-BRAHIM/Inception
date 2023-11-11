FROM debian:bookworm

RUN		    apt update && apt upgrade -y; apt install redis -y;
RUN         rm -rf /var/cache/apt/archives/*
RUN         sed -i "s/bind 127.0.0.1/bind 0.0.0.0/" /etc/redis/redis.conf;
COPY        ./tools/set.sh set_redis.sh
ENTRYPOINT  [ "bash", "set_redis.sh" ]
CMD         [ "redis-server" ]