# Install Apache
# sudo apt-get install apache2

# Install Mysql
# sudo apt-get install mysql-server
# sudo apt-get install php-mysql

# Install PHP 7
sudo apt-get remove php5*
sudo add-apt-repository ppa:ondrej/php-7.0
sudo apt-get update
sudo apt-get install php7.0

sudo a2enmod php7.0
sudo a2dismod php5



