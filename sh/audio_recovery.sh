#!/bin/bash
##################################
# PulseAudio.
#	Servidor de sonido multiplataforma
##################################
echo "Rerconfigurando el sonido."
sudo killall pulseaudio
rm -r ~/.config/pulse/*
rm -r ~/.pulse*
echo "Espera unos segundos..."
sleep 3
pulseaudio -k
echo "¡Ya tienes listo el audio!"
