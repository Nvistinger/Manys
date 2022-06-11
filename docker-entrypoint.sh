#!/bin/bash
composer install
npm install --force && npm run-script build
/usr/bin/env php /var/www/bin/console doctrine:schema:update --force && \
/usr/bin/env php /var/www/bin/console doctrine:fixtures:load --append
exec docker-php-entrypoint "$@"
