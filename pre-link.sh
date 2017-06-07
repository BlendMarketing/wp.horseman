SHARED=/var/www/wp.horseman.io/shared

ln -s $SHARED/vendor ./ &&
ln -s $SHARED/wp-vendor ./ &&

chmod +x post-composer-cmds.sh &&
composer install --no-dev --no-interaction --no-progress &&

ln -s $SHARED/uploads public/wp-content/uploads &&

sudo npm prune --production --progress=false &&
sudo npm install --production --progress=false
