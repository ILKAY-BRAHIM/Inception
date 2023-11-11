#!/bin/sh

if [ ! -d /var/www/html/portfolio ]; then
    mkdir -p /var/www/html/portfolio;
    mkdir -p /var/www/html/portfolio/public;
    mv app.js /var/www/html/portfolio
    cd /var/www/html/portfolio/public;
    git clone https://github.com/ILKAY-BRAHIM/semple_static_portfolio.git hi
    cd hi
    mv * ../
    cd /var/www/html/portfolio

    npm i;
    npm i express;
    echo "finish portfolio"
fi
cd /var/www/html/portfolio;

exec "$@"