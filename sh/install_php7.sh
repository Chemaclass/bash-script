#!/bin/bash

# Install Apache
sudo apt-get install apache2

# Install PHP 7
sudo apt-get remove php5*
sudo add-apt-repository ppa:ondrej/php-7.0
sudo apt-get update
sudo apt-get install php7.0

sudo a2enmod php7.0
sudo a2dismod php5

# Install Mysql
sudo apt-get install mysql-server
sudo apt-get install php-mysql

# In php.ini file (/etc/php/7.0/apache2/php.ini) you should 
# have active: `session.save_path = "/var/lib/php/sessions"`
# After this make sure this path has enough permissions:
sudo chown -R www-data:www-data /var/lib/php/sessions/


