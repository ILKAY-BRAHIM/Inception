#!/bin/sh

if [ ! -d "/var/run/vsftpd/empty" ]; then
     sed -i "s/#chroot_local_user.*/chroot_local_user=YES/" /etc/vsftpd.conf;
     mkdir -p /var/run/vsftpd/empty;
     chmod 755 /var;
     chmod 755 /var/run;
     chmod 755 /var/run/vsftpd;
     chmod 755 /var/run/vsftpd/empty;
     useradd wp_user;
     echo "wp_user:1234" | chpasswd
     # sed -i "s/#write_enable=YES/write_enable=YES/" /etc/vsftpd.conf;
     # echo "allow_writeable_chroot=YES" >> /etc/vsftpd.conf;
     usermod -d /var/www/html/ wp_user
     echo "first up"
     
fi

echo "finish script";

exec "$@"