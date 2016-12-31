### Metasploit

## Install Oracle Java 8

# We start by adding the Oracle Java Package source
sudo add-apt-repository -y ppa:webupd8team/java
# Once added we can install the latest version
sudo apt-get update
sudo apt-get -y install oracle-java8-installer

## Installing Dependencies

# We start by making sure that we have the latest packages by updating the system using apt-get:
sudo apt-get update
sudo apt-get upgrade
# Now that we know that we are running an updated system we can install all the dependent packages that are needed by Metasploit Framework:
sudo apt-get install build-essential libreadline-dev libssl-dev libpq5 libpq-dev libreadline5 libsqlite3-dev libpcap-dev git-core autoconf postgresql pgadmin3 curl zlib1g-dev libxml2-dev libxslt1-dev vncviewer libyaml-dev curl zlib1g-dev

## Installing a Proper Version of Ruby

# The distribution sadly does not comes by default with a proper version of Linux for us to use with Metasploit Framework and we will have to download and compile a proper one. There 2 mains ways recommended for this are using RVM or rbenv (Do not install both choose one or the other). If installing using RVM be warned that symlinks will not work do to the way it places the binary stubs of the metasploit-framework gem

#Installing Ruby using RVM:
curl -sSL https://rvm.io/mpapis.asc | gpg2 --import -
curl -L https://get.rvm.io | bash -s stable
source ~/.rvm/scripts/rvm
echo "source ~/.rvm/scripts/rvm" >> ~/.bashrc
source ~/.bashrc
RUBYVERSION=$(wget https://raw.githubusercontent.com/rapid7/metasploit-framework/master/.ruby-version -q -O - )
rvm install $RUBYVERSION
rvm use $RUBYVERSION --default
ruby -v

## Installing Nmap

# One of the external tools that Metasploit uses for scanning that is not included with the sources is Nmap. Here we will cover downloading the latest source code for Nmap, compiling and installing:
mkdir ~/Development
cd ~/Development
git clone https://github.com/nmap/nmap.git
cd nmap
./configure
make
sudo make install
make clean

## Configuring Postgre SQL Server

# Now we create the user and Database, do record the database that you gave to the user since it will be used in the database.yml file that Metasploit and Armitage use to connect to the database.
sudo -u postgres bash -c "psql -c \"CREATE USER msf WITH PASSWORD 'msf';\""
sudo -u postgres bash -c "psql -c \"CREATE DATABASE msf;\""

## Installing Metasploit Framework

# We will download the latest version of Metasploit Framework via Git so we can use msfupdate to keep it updated:
cd /opt
sudo git clone https://github.com/rapid7/metasploit-framework.git
sudo chown -R `whoami` /opt/metasploit-framework

# Install using bundler the required gems and versions:
cd metasploit-framework
# If using RVM set the default gem set that is create when you navigate in to the folder
rvm --default use ruby-${RUBYVERSION}@metasploit-framework

gem install bundler
bundle install
# Lets create the links to the commands so we can use them under any user and not being under the framework folder, for this we need to be in the metasploit-framework folder if not already in it:
cd metasploit-framework
sudo bash -c 'for MSF in $(ls msf*); do ln -s /opt/metasploit-framework/$MSF /usr/local/bin/$MSF;done'

# Resources:
#http://www.darkoperator.com/installing-metasploit-in-ubunt/
#http://stackoverflow.com/questions/18715345/how-to-create-a-user-for-postgres-from-the-command-line-for-bash-automation
#
