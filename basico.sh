#!/bin/bash
########################################################
#  ¿Qué hacer después de instalar Elementary OS Luna?  #
########################################################

## Ejecutar el Administrador de Actualizaciones
sudo apt-get update -y
sudo apt-get upgrade -y

## Instalar códecs, Flash, fuentes adicionales, drivers, etc.
sudo apt-get install ubuntu-restricted-extras -y

## Instalar aplicaciones de compresión
sudo apt-get install rar unace p7zip-full p7zip-rar sharutils mpack lha arj -y

###################
# Personalización #
###################
sudo sudo add-apt-repository ppa:versable/elementary-update -y
sudo apt-get update -y
# Elementary Tweaks en pocas palabras es con lo que puedes personalizar mas Elementary
sudo apt-get install elementary-tweaks -y
# Un lanzador muy útil
sudo apt-get install indicator-synapse -y
# Instalar Temas, Iconos etc…
sudo apt-get install elementary-blue-theme elementary-champagne-theme elementary-colors-theme elementary-dark-theme elementary-harvey-theme elementary-lion-theme elementary-milk-theme elementary-plastico-theme elementary-whit-e-theme elementary-elfaenza-icons elementary-emod-icons elementary-enumix-utouch-icons elementary-nitrux-icons elementary-taprevival-icons elementary-thirdparty-icons elementary-plank-themes elementary-wallpaper-collection -y

#########################################
# OpenJdk Java: 						
# 	sudo apt-get install openjdk-7-jdk  
# Oracle  Java 							
#########################################
sudo add-apt-repository ppa:webupd8team/java -y
sudo apt-get update -y
sudo apt-get install oracle-java8-installer -y
sudo apt-get install oracle-java7-installer -y

########################
# Fuentes de microsoft #
########################
sudo apt-get install ttf-mscorefonts-installer -y
#Después para añadirlas a todas las aplicaciones actualizar la caché con:
sudo fc-cache -y

#####################################################################
# libdvdcss - para poder ver DVD's / CD's originales o comerciales: #
#####################################################################
sudo apt-get install curl -y
# Descargar e instalar la llave pública de los repositorios de Videolan:
curl ftp://ftp.videolan.org/pub/debian/videolan-apt.asc | sudo apt-key add - -y
#Añadir los repositorios de Videolan:
echo "deb ftp://ftp.videolan.org/pub/debian/stable ./" | sudo tee /etc/apt/sources.list.d/libdvdcss.list -y
#Actualizar la lista de repositorios:
sudo apt-get update -y
#E instalar libdvdcss2:
sudo apt-get install libdvdcss2 -y
#Al instalar "ubuntu-restricted-extras" se habrá instalado "libdvdread4" en "/usr/share/doc" y nos queda ejecutarlo con:
sudo /usr/share/doc/libdvdread4/install-css.sh -y

#############################
# Aplicaciones Recomendadas #
#############################
# Herramienta gráfica para la gestión de paquetes 
sudo apt-get install synaptic -y
# Herramienta que se utiliza para la edición de la base de datos de configuración de GConf (configuración de Gnome)
sudo apt-get install gconf-editor -y
# Instalación de paquetes ".deb"
sudo apt-get install gdebi -y
# Comando para instalar aplicaciones desde la terminal
sudo apt-get install aptitude -y

sudo apt-get install dconf-tools -y

##################################
# Software básico de compilación #
##################################
# Para poder usar comandos como "gcc" "make"
sudo apt-get install build-essential -y

########################################
# Monitorizar temperaturas de hardware #
########################################
sudo apt-get install lm-sensors hddtemp -y

########################
# Editores de imágenes #
########################
sudo apt-get install gimp -y

########################
# Control de versiones #
########################
sudo apt-get install git -y

###############
# Cliente FTP #
###############
sudo apt-get install filezilla -y

#############################
# Lenguajes de Programación #
#############################
## Golang
sudo add-apt-repository ppa:gophers/go -y
sudo apt-get update -y
sudo apt-get install golang-stable -y

## Python 3
sudo apt-get install build-essential -y
# SQLite libs need to be installed in order for Python to have SQLite support.
sudo apt-get install libsqlite3-dev -y
sudo apt-get install sqlite3 -y # for the command-line client
sudo apt-get install bzip2 libbz2-dev -y
# Download and compile Python:
wget http://www.python.org/ftp/python/3.3.5/Python-3.3.5.tar.xz -y
tar xJf ./Python-3.3.5.tar.xz -y
cd ./Python-3.3.5 -y
./configure --prefix=/opt/python3.3 -y
make && sudo make install -y
# Some nice touches to install a py command by creating a symlink:
mkdir ~/bin -y
ln -s /opt/python3.3/bin/python3.3 ~/bin/py -y

## Scala
sudo apt-get remove scala-library scala -y
wget www.scala-lang.org/files/archive/scala-2.11.0.deb -y
sudo dpkg -i scala-2.11.0.deb -y
sudo apt-get update -y
sudo apt-get install scala -y
# sbt installation
# remove sbt:>  sudo apt-get purge sbt. 
wget http://scalasbt.artifactoryonline.com/scalasbt/sbt-native-packages/org/scala-sbt/sbt//0.12.3/sbt.deb -y
sudo dpkg -i sbt.deb -y
sudo apt-get update -y
sudo apt-get install sbt -y

## Erlang
sudo apt-get install erlang erlang-doc -y


## Actualizamos el sistema de nuevo. ##
sudo apt-get update -y
sudo apt-get upgrade -y
