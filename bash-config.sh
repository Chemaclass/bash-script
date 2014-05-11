##################################
# Configuración para la terminal #
##################################
# Añadir al final del ~/.bashrc

function parse_git_branch () {
  git branch 2> /dev/null | sed -e '/^[^*]/d' -e 's/* \(.*\)/ (\1)/'
}
 
RED="\[\033[0;31m\]"
YELLOW="\[\033[0;33m\]"
BLUE="\[\033[1;34m\]"
GREEN="\[\033[1;32m\]"
NO_COLOR="\[\033[0m\]"
 
PS1="$GREEN\u@\h$BLUE:\w$YELLOW\$(parse_git_branch)$NO_COLOR\$ "
