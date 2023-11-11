FROM debian:bookworm

RUN apt update && apt install nginx -y && apt install openssl -y

RUN apt-get  install openssl && openssl req -x509 -nodes -days 365 -newkey rsa:2048 -keyout /etc/ssl/private/nginx-selfsigned.key -out /etc/ssl/certs/nginx-selfsigned.crt \
-subj "/C=MA/ST=Tanger-Tetouan-Al Hoceima/L=Martil/O=1337/OU=1337MED/CN=inception"

COPY ./conf/nginx.conf /etc/nginx/conf.d

RUN unlink /etc/nginx/sites-enabled/default

CMD [ "nginx","-g","daemon off;"]