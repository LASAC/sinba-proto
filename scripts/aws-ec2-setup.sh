# set up - AWS ECW
# http://docs.aws.amazon.com/AWSEC2/latest/UserGuide/install-LAMP.html

sudo yum update -y

sudo yum install -y httpd24 php70 mysql56-server php70-mysqlnd

# Laravel dependency
sudo yum install -y php70-mbstring

#
# Apache
#

sudo service httpd start

# add to start up
sudo chkconfig httpd on

# 5:on is the important
chkconfig --list httpd

# allow requests on port 80 (via aws console)

# add user to apache group
sudo usermod -a -G apache ec2-user

# check groups:
# exit
# group

# set file permissions
sudo chown -R ec2-user:apache /var/www
sudo chmod 2775 /var/www
find /var/www -type d -exec sudo chmod 2775 {} \;
find /var/www -type f -exec sudo chmod 0664 {} \;

#
# MySQL
#
sudo service mysqld start
sudo mysql_secure_installation

mysql -u root -p -e "CREATE DATABASE IF NOT EXISTS \`sinba\` DEFAULT CHARACTER SET utf8 DEFAULT COLLATE utf8_unicode_ci"
mysql -u root -p -e "GRANT ALL PRIVILEGES ON sinba.* TO 'sinba'@'localhost' IDENTIFIED BY '[pwd]'"
# mysql -u root -p -e "GRANT ALL PRIVILEGES ON sinba.* TO 'sinba'@'%' IDENTIFIED BY '[pwd]'"

#
# Composer
# source: https://gist.github.com/asugai/6694502
#
cd ~
sudo curl -sS https://getcomposer.org/installer | sudo php
sudo mv composer.phar /usr/local/bin/composer
sudo ln -s /usr/local/bin/composer /usr/bin/composer

# clone project
cd ~
git clone https://github.com/LASAC/SINBA.git sinba

#
# Setup Project
#

cp .env.production .env
# database setup:
nano .env
php artisan key:generate

php artisan migrate
php artisan db:seed

# storage and cache write permission
sudo chmod -R g+w storage/logs/
sudo chmod -R g+w bootstrap/cache/

# apache settings:
sudo nano /etc/httpd/conf/httpd.conf
# Point DocumentRoot to: /var/www/html/public
# look for <Directory "/var/www/html">
# update allow override: AllowOverride All
# or something like: Sinba (Laravel) Apache Settings:
#sudo cp sinba/scripts/sinba.conf /etc/apache2/sites-available/
#sudo ln -s /etc/apache2/sites-available/sinba.conf /etc/apache2/sites-enabled/sinba.conf
