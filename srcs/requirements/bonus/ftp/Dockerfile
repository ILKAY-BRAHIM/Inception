FROM        debian:bookworm
RUN         apt update && apt upgrade -y; apt install vsftpd -y; apt clean;
EXPOSE 21
COPY        ./tools/set.sh set_ftp.sh
ENTRYPOINT  [ "/set_ftp.sh" ]
CMD         [ "vsftpd", "/etc/vsftpd.conf" ]
