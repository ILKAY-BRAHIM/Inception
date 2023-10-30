FROM        debian:bookworm
RUN         apt update && apt upgrade -y; apt install vsftpd -y; apt clean;
EXPOSE      21
COPY        ./set.sh set_ftp.sh
ENTRYPOINT  [ "bash", "set_ftp.sh" ]
CMD         [ "vsftpd" ]