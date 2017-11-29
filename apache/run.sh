#!/bin/bash

#Make sure all files are owned by the Apache group and user. Solves mkdir() permission errors.
chown -R www-data:www-data /var/www/html/
chmod -R g+rw /var/www/html/

if [ "$ALLOW_OVERRIDE" = "**False**" ]; then
    unset ALLOW_OVERRIDE
else
    sed -i "s/AllowOverride None/AllowOverride All/g" /etc/apache2/apache2.conf
    a2enmod rewrite
fi

source /etc/apache2/envvars
tail -F /var/log/apache2/* &
exec apache2 -D FOREGROUND
