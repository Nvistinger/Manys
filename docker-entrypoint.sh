#!/bin/bash
cd /var/www
composer install
npm install && npm run dev
/usr/bin/env php /var/www/bin/console doctrine:schema:update --force && \
/usr/bin/env php /var/www/bin/console doctrine:fixtures:load --append
exec docker-php-entrypoint "$@"
