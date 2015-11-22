#!/bin/bash
#####################################
#  LAMP en una distro Debian Linux  #
#####################################
#-> Linux|Apache|MySQL|PHP
 
## Apache
sudo apt-get install apache2

## PHP
sudo apt-get install php5 libapache2-mod-php5 php5-cli php5-mysql
# generamos un fichero de prueba
sudo echo "<?php phpinfo(); ?>" > /var/www/info.php

## MySQL
sudo apt-get install mysql-server mysql-client libmysqlclient-dev

## PhpMyAdmin
sudo apt-get install phpmyadmin

