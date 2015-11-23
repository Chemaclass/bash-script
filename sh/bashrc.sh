###################
# Terminal config #
###################

function parse_git_branch {
  ref=$(git symbolic-ref HEAD 2> /dev/null) || return
  echo "("${ref#refs/heads}")"
}
 
PS1="\[\e[00;37m\][\[\e[0m\]\[\e[00;33m\]\T\[\e[0m\]\[\e[00;37m\]] \[\e[0m\]\[\e[01;36m\]\u\[\e[0m\]\[\e[00;37m\]@\[\e[0m\]\[\e[01;32m\]\h\[\e[0m\]\[\e[00;37m\] \[\e[0m\]\[\e[01;37m\]\W\[\e[0m\]\[\e[00;37m\] \[\e[0m\]"

PS1="$PS1\$(parse_git_branch)\$ "

