# /bin/bash
# instalar pip y youtube-dl

sudo apt-get install python-pip
sudo pip install --upgrade youtube_dl
sudo apt-get install libav-tools

############## Descargar una lista desde Youtube ##############
# youtube-dl --verbose -citk --max-quality FORMAT --extract-audio --audio-format mp3 https://www.youtube.com/playlist?list=PLBEB426B1BEDAF1A8 
############ ############ ############ ############ ###########
