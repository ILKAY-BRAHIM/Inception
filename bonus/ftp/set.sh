#!/bin/sh

if ! cat /etc/passwd | grep "ftp:" ; then
     sed -i "s/#write_enable=YES/write_enable=YES/" /etc/vsftpd.conf;
fi