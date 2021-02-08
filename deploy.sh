#!/bin/sh
rsync -avP ./ manys@ssh-manys.alwaysdata.net:~/www --exclude-from=.gitignore --exclude=.git
ssh manys@ssh-manys.alwaysdata.net "cd www && composer install && npm install --force && npm run-script build"
