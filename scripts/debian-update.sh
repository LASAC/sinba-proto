# http://docs.aws.amazon.com/AWSEC2/latest/UserGuide/install-LAMP.html
# TODO: http://docs.aws.amazon.com/AWSEC2/latest/UserGuide/SSL-on-an-instance.html

cd ~/sinba
git pull

cd ~
sudo rsync -avH --exclude='.git' --exclude='*.gitignore' --exclude='.gitattributes' --exclude='.env' --exclude='readme.md' --exclude='storage' --exclude='vendor' --delete ~/sinba/project/sinba/ /var/www/html/sinba/

cd /var/www/html/sinba/
composer install

# clear cache:
php artisan view:clear
php artisan route:clear

# set file permissions
sudo chown -R www-data:www-data /var/www/html/sinba
sudo chmod 2775 /var/www/html/sinba
find /var/www/html/sinba -type d -exec sudo chmod 2775 {} \;
find /var/www/html/sinba -type f -exec sudo chmod 0664 {} \;
