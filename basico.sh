#!/bin/bash
########################################################
#  ¿Qué hacer después de instalar Elementary OS Luna?  #
########################################################

## 1. Ejecutar el Administrador de Actualizaciones
sudo apt-get update
sudo apt-get upgrade

## 2. Instalar códecs, Flash, fuentes adicionales, drivers, etc.
sudo apt-get install ubuntu-restricted-extras

## 3. Instalar aplicaciones de compresión
sudo apt-get install rar unace p7zip-full p7zip-rar sharutils mpack lha arj

## 4. Instalar otros gestores de paquetes y de configuración
sudo apt-get install synaptic
sudo apt-get install gdebi
sudo apt-get install aptitude
sudo apt-get install dconf-tools

## 5 Personalización
sudo sudo add-apt-repository ppa:versable/elementary-update
sudo apt-get update
# Elementary Tweaks en pocas palabras es con lo que puedes personalizar mas Elementary
sudo apt-get install elementary-tweaks
# Un lanzador muy útil
sudo apt-get install indicator-synapse
# Instalar Temas, Iconos etc…
sudo apt-get install elementary-blue-theme elementary-champagne-theme elementary-colors-theme elementary-dark-theme elementary-harvey-theme elementary-lion-theme elementary-milk-theme elementary-plastico-theme elementary-whit-e-theme elementary-elfaenza-icons elementary-emod-icons elementary-enumix-utouch-icons elementary-nitrux-icons elementary-taprevival-icons elementary-thirdparty-icons elementary-plank-themes elementary-wallpaper-collection


## 6. Encontrar más aplicaciones en el Centro de Software
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

##Actualizamos el sistema de nuevo.
sudo apt-get update
sudo apt-get upgrade
