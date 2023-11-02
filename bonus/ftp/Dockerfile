FROM        debian:bookworm
RUN         apt update && apt upgrade -y; apt install vsftpd -y; apt clean;
COPY        ./set.sh set_ftp.sh
EXPOSE 21
ENTRYPOINT  [ "bash", "set_ftp.sh" ]
CMD         [ "vsftpd", "/etc/vsftpd.conf" ]