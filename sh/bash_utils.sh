
#
# Replace a string to another one in all files
# contained inside a path directory.
#
# @param string $1 String to search.
# @param string $2 String to replace.
# @param string $3 Where start to search the files.
#
func_replace() {
	search=${1}
	replace=${2}
	path=${3:-$(pwd)}
	
	echo "search: $search | replace: $replace"
	echo "Are you sure do you want to exec: ´sed 's/$search/$replace/g'´ in ´${path}´? [Y/N]"
	read sure
	sure=${sure:N}
	if [[ "$sure" != "y" && "$sure" != "Y" && "$sure" != "yes" && "$sure" != "YES" ]] ; then
		echo "Ok, nope."
		return
	fi
	
	tfile="/tmp/out.$$"
	total_files=0
	total_matches=0
	echo "Let's do it!"
	for f in $(find $path -type f); do
		if [ -f $f -a -r $f ]; then
			# Check if they're something.
			nr_matches=$(grep "$search" $f | wc -l)
			if [ $nr_matches -gt 0 ]; then
				sed "s/$search/$replace/g" "$f" > $tfile && mv $tfile "$f"
				echo "> Nr matches: $nr_matches in $f"
				total_files=$(( $total_files + 1 )) # total_files++
				total_matches=$(( $total_matches + $nr_matches ))
			fi
		else
			echo "Error: Cannot read $f"
		fi
	done

	if [ -f $tfile ]; then
		rm $tfile
	fi
	echo ""
	echo "> Total matches: ${total_matches}"
	echo "> Total updated files: ${total_files}."	
}
alias replace=func_replace

