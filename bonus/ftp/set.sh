#!/bin/sh

if [ ! -d "/var/run/vsftpd/empty" ]; then
     # chown -R wp_user /var/www/html;
     # chmod -R 774 /var/www/html;
     # ln -s /var/www/html /home/wp_user;
     # usermod -d /home/wpuser wp_user;
     sed -i "s/#chroot_local_user.*/chroot_local_user=YES/" /etc/vsftpd.conf;
     mkdir -p /var/run/vsftpd/empty;
     chmod 755 /var;
     chmod 755 /var/run;
     chmod 755 /var/run/vsftpd;
     chmod 755 /var/run/vsftpd/empty;
     useradd wp_user;
     # echo -e "$wpuserpw\n$wpuserpw" | passwd 1234;
     echo "wp_user:1234" | chpasswd
     # sed -i "s/#write_enable=YES/write_enable=YES/" /etc/vsftpd.conf;
     # echo "allow_writeable_chroot=YES" >> /etc/vsftpd.conf;
     usermod -d /var/www/html/ wp_user
     echo "first up"
     
fi

echo "finish script";

exec "$@"