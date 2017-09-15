# 
# Set up - Debian Stretch
# adapted from: http://docs.aws.amazon.com/AWSEC2/latest/UserGuide/install-LAMP.html
#

#
# SINBA dependencies
#
apt-get install -y git curl php7.0-mbstring php7.0-xml php7.0-mysql

#
# Apache
#

# Activate PHP 7
sudo a2dismod php5
sudo a2enmod php7.0

# Enable mod_rewrite (required by Laravel)
sudo a2enmod rewrite
# these changes requires apache to restart
# but we'll restart it further on...


# Clone project (it also contains script files to setup)
cd ~
git clone https://github.com/LASAC/SINBA.git sinba

# Sinba (Laravel) Apache Settings:
sudo cp sinba/scripts/sinba.conf /etc/apache2/sites-available/
sudo ln -s /etc/apache2/sites-available/sinba.conf /etc/apache2/sites-enabled/sinba.conf
# Here is where it's safe to restart apache2
# However, because there are other sites running
# I'll restart it only in the end of the configuration

#
# MySQL
#
# only if it wasn't installed yet:
#sudo apt-get install mysql-server
#sudo service mysqld start
#sudo mysql_secure_installation

mysql -u root -p -e "CREATE DATABASE IF NOT EXISTS \`sinba\` DEFAULT CHARACTER SET utf8 DEFAULT COLLATE utf8_unicode_ci"
mysql -u root -p -e "GRANT ALL PRIVILEGES ON sinba.* TO 'sinba'@'localhost' IDENTIFIED BY '[pwd]'"
# mysql -u root -p -e "GRANT ALL PRIVILEGES ON sinba.* TO 'sinba'@'%' IDENTIFIED BY '[pwd]'"

#
# Composer
# source: https://getcomposer.org/download/
# adapted from: https://gist.github.com/asugai/6694502
#
cd ~
php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
php -r "if (hash_file('SHA384', 'composer-setup.php') === '544e09ee996cdf60ece3804abc52599c22b1f40f4323403c44d44fdfdd586475ca9813a858088ffbc1f233e9b180f061') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
php composer-setup.php
php -r "unlink('composer-setup.php');"
sudo mv composer.phar /usr/local/bin/composer
sudo ln -s /usr/local/bin/composer /usr/bin/composer
composer --version

# Set file permissions (assuming glandre to be the sudoer user)
# add user to apache group (this is not necessary)
# sudo usermod -a -G www-data glandre
# sudo chown -R glandre:www-data /var/www/html/sinba

#
# Setup Project
#

# export files
rsync -avH --exclude='.git' --exclude='*.gitignore' --exclude='.gitattributes' --exclude='.env' --exclude='readme.md' --exclude='vendor' --delete ~/sinba/project/sinba/ /var/www/html/sinba/

cd /var/www/html/sinba

cp .env.production .env
# database setup:
nano .env

composer install
# if version conflicts occur, before proceeding with debugging:
# try to delete composer.lock, then delete vendor/, 
# and then run composer install again.

php artisan key:generate
php artisan migrate --seed

# set permissions
# in order to assure www-data is the user apache is running as
# run something like: ps aux | egrep '(apache|httpd)'
sudo chown www-data:www-data /var/www/html/sinba/ -R
sudo chmod 2775 /var/www/html/sinba
find /var/www/html/sinba -type d -exec sudo chmod 2775 {} \;
find /var/www/html/sinba -type f -exec sudo chmod 0664 {} \;

# Restart apache
sudo service apache2 restart