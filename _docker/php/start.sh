
set -e

php-fpm -D

/usr/bin/supervisord -n -c /etc/supervisor/supervisord.conf
