#!/bin/bash
killall -9 nginx_streamtool php-fpm
killall nginx nginx_streamtool
service php7.3-fpm stop

/bin/mkdir /opt/streamtool/app/www1/
/bin/mkdir /opt/streamtool/app/www1/log/
chown nginx:nginx /opt/streamtool/app/www1/log/
cp -R /opt/streamtool/app/www/* /opt/streamtool/app/www1/
rm /opt/streamtool/app/www1/*.*
rm -rf /opt/streamtool/app/www1/hl
ln -s /opt/streamtool/app/www/hl /opt/streamtool/app/www1/hl
ln -s /opt/streamtool/app/www/config.php /opt/streamtool/app/www1/config.php
ln -s /opt/streamtool/app/www/functions.php /opt/streamtool/app/www1/functions.php
ln -s /opt/streamtool/app/www/stream.php /opt/streamtool/app/www1/stream.php
ln -s /opt/streamtool/app/www/playlist.php /opt/streamtool/app/www1/playlist.php
curl -s https://raw.githubusercontent.com/NeySlim/Streamtool-v69/master/improvement/nginx.conf /opt/streamtool/app/nginx/conf/nginx.conf
/opt/streamtool/app/nginx/sbin/nginx
service php7.3-fpm start
