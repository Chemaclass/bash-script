#
# findd is another way to use find.
#
# @param string $1 Name
# @param string $2 Path
#		Deafult: .
# @param string $3 Type of file. f => file, d => dir
#		Deafult: f
# @param int $4 exec to each file found it.
#		Deafult: false
#
function_find2() {
    name=${1}
    path=${2-.}    
    type=${3-f}
    exec=${4-false}

    if [[ "" == "$name" ]]; then
	    echo "Name(1st) must be fill it."
	    return
	fi

	if [[ "false" == "$exec" ]]; then
        find $path -type $type -name $name
	else
        find $path -type $type -name $name -exec $exec 
	fi
}

