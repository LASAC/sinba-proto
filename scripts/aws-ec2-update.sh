# http://docs.aws.amazon.com/AWSEC2/latest/UserGuide/install-LAMP.html
# TODO: http://docs.aws.amazon.com/AWSEC2/latest/UserGuide/SSL-on-an-instance.html
cd ~/sinba
git pull

cd ~
rsync -avH --exclude='.git' --exclude='*.gitignore' --exclude='.gitattributes' --exclude='.env' --exclude='readme.md' --exclude='storage' --exclude='vendor' --delete ~/sinba/project/sinba/ /var/www/html/

cd /var/www/html/
composer install

# clear cache:
php artisan view:clear
php artisan route:clear

# set file permissions
sudo chown -R ec2-user:apache /var/www
sudo chmod 2775 /var/www
find /var/www -type d -exec sudo chmod 2775 {} \;
find /var/www -type f -exec sudo chmod 0664 {} \;
