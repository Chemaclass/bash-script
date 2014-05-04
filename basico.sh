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

#######################################################
# Encontrar más aplicaciones en el Centro de Software #
#######################################################
# OpenShot, editor de video
# Thunderbird, e-mail
# Firefox, explorador web (No te recomiendo Chromium ni Google Chrome)
# Pidgin, chat
# Transmission, torrents
# VLC, video
# XBMC, media center
# FileZilla, FTP
# GIMP, editor de imágenes (tipo Photoshop)
# LibreOffice, Suite de ofimática (MS Office pero libre)

#########################################
# OpenJdk Java: 						#
# 	sudo apt-get install openjdk-7-jdk  #
# Oracle  Java 							#
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


##Actualizamos el sistema de nuevo.
sudo apt-get update
sudo apt-get upgrade
