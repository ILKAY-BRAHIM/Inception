FROM debian:bookworm

RUN apt update && apt install nginx -y 

COPY nginx.conf /etc/nginx/conf.d

RUN unlink /etc/nginx/sites-enabled/default

CMD [ "nginx","-g","daemon off;"]