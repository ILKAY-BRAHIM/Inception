#!/bin/sh

if [ ! -d "/var/run/vsftpd/empty" ]; then
     sed -i "s/#chroot_local_user.*/chroot_local_user=YES/" /etc/vsftpd.conf;
     sed -i "s/#chroot_list_enable=YES/chroot_list_enable=YES/" /etc/vsftpd.conf;
     sed -i "s/#chroot_list_file=/etc/vsftpd.chroot_list/chroot_list_file=/etc/vsftpd.chroot_list/" /etc/vsftpd.conf;
     sed -i "s/#write_enable.*/write_enable=YES/" /etc/vsftpd.conf
     touch /etc/vsftpd.chroot_list;
     echo "${FTP_USER}" | tee -a /etc/vsftpd.chroot_list
     chmod 755 /home/${FTP_USER}
     mkdir -p /var/run/vsftpd/empty;
     chmod 755 /var;
     chmod 755 /var/run;
     chmod 755 /var/run/vsftpd;
     chmod 755 /var/run/vsftpd/empty;
     useradd ${FTP_USER};
     echo "${FTP_USER}:${FTP_PASSWORD}" | chpasswd
     usermod -d /var/www/html/ wp_user
     chown -R ${FTP_USER}:${FTP_USER} /var/www/html
     echo "first up"
     
fi

echo "finish script";

exec "$@"