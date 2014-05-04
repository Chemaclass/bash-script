#!/bin/bash
########################################################
#  ¿Qué hacer después de instalar Elementary OS Luna?  #
########################################################

## Ejecutar el Administrador de Actualizaciones
sudo apt-get update
sudo apt-get upgrade

## Instalar códecs, Flash, fuentes adicionales, drivers, etc.
sudo apt-get install ubuntu-restricted-extras

## Instalar aplicaciones de compresión
sudo apt-get install rar unace p7zip-full p7zip-rar sharutils mpack lha arj

###################
# Personalización #
###################
sudo sudo add-apt-repository ppa:versable/elementary-update
sudo apt-get update
# Elementary Tweaks en pocas palabras es con lo que puedes personalizar mas Elementary
sudo apt-get install elementary-tweaks
# Un lanzador muy útil
sudo apt-get install indicator-synapse
# Instalar Temas, Iconos etc…
sudo apt-get install elementary-blue-theme elementary-champagne-theme elementary-colors-theme elementary-dark-theme elementary-harvey-theme elementary-lion-theme elementary-milk-theme elementary-plastico-theme elementary-whit-e-theme elementary-elfaenza-icons elementary-emod-icons elementary-enumix-utouch-icons elementary-nitrux-icons elementary-taprevival-icons elementary-thirdparty-icons elementary-plank-themes elementary-wallpaper-collection

#########################################
# OpenJdk Java: 						
# 	sudo apt-get install openjdk-7-jdk  
# Oracle  Java 							
#########################################
sudo add-apt-repository ppa:webupd8team/java
sudo apt-get update
sudo apt-get install oracle-java8-installer
sudo apt-get install oracle-java7-installer

########################
# Fuentes de microsoft #
########################
sudo apt-get install ttf-mscorefonts-installer
#Después para añadirlas a todas las aplicaciones actualizar la caché con:
sudo fc-cache

#####################################################################
# libdvdcss - para poder ver DVD's / CD's originales o comerciales: #
#####################################################################
sudo apt-get install curl
# Descargar e instalar la llave pública de los repositorios de Videolan:
curl ftp://ftp.videolan.org/pub/debian/videolan-apt.asc | sudo apt-key add -
#Añadir los repositorios de Videolan:
echo "deb ftp://ftp.videolan.org/pub/debian/stable ./" | sudo tee /etc/apt/sources.list.d/libdvdcss.list
#Actualizar la lista de repositorios:
sudo apt-get update
#E instalar libdvdcss2:
sudo apt-get install libdvdcss2
#Al instalar "ubuntu-restricted-extras" se habrá instalado "libdvdread4" en "/usr/share/doc" y nos queda ejecutarlo con:
sudo /usr/share/doc/libdvdread4/install-css.sh

#############################
# Aplicaciones Recomendadas #
#############################
# Herramienta gráfica para la gestión de paquetes 
sudo apt-get install synaptic
# Herramienta que se utiliza para la edición de la base de datos de configuración de GConf (configuración de Gnome)
sudo apt-get install gconf-editor
# Instalación de paquetes ".deb"
sudo apt-get install gdebi
# Comando para instalar aplicaciones desde la terminal
sudo apt-get install aptitude

sudo apt-get install dconf-tools

##################################
# Software básico de compilación #
##################################
# Para poder usar comandos como "gcc" "make"
sudo apt-get install build-essential

########################################
# Monitorizar temperaturas de hardware #
########################################
sudo apt-get install lm-sensors hddtemp

########################
# Editores de imágenes #
########################
sudo apt-get install gimp

########################
# Control de versiones #
########################
sudo apt-get install git

###############
# Cliente FTP #
###############
sudo apt-get install filezilla

#############################
# Lenguajes de Programación #
#############################
## Golang
sudo add-apt-repository ppa:gophers/go
sudo apt-get update
sudo apt-get install golang-stable

## Python 3
sudo apt-get install build-essential
# SQLite libs need to be installed in order for Python to have SQLite support.
sudo apt-get install libsqlite3-dev
sudo apt-get install sqlite3 # for the command-line client
sudo apt-get install bzip2 libbz2-dev
# Download and compile Python:
wget http://www.python.org/ftp/python/3.3.5/Python-3.3.5.tar.xz
tar xJf ./Python-3.3.5.tar.xz
cd ./Python-3.3.5
./configure --prefix=/opt/python3.3
make && sudo make install
# Some nice touches to install a py command by creating a symlink:
mkdir ~/bin
ln -s /opt/python3.3/bin/python3.3 ~/bin/py

## Scala
sudo apt-get remove scala-library scala
wget www.scala-lang.org/files/archive/scala-2.11.0.deb
sudo dpkg -i scala-2.11.0.deb
sudo apt-get update
sudo apt-get install scala
# sbt installation
# remove sbt:>  sudo apt-get purge sbt. 
wget http://scalasbt.artifactoryonline.com/scalasbt/sbt-native-packages/org/scala-sbt/sbt//0.12.3/sbt.deb
sudo dpkg -i sbt.deb
sudo apt-get update
sudo apt-get install sbt



## Actualizamos el sistema de nuevo. ##
sudo apt-get update
sudo apt-get upgrade
