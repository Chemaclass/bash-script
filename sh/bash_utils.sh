
#
# Replace a string to another one in all files
# contained inside a path directory.
#
# @param string $1 String to search.
# @param string $2 String to replace.
# @param string $3 Where start to search the files.
#		Deafult: $(pwd)
#
func_replace() {
	search=${1}
	replace=${2}
	path=${3:-$(pwd)}

	total_files=0
	total_matches=0

	echo "search: $search | replace: $replace"
	# Show all matches by each possible file.
	for f in $(find $path -type f); do
		# Check if they're something.
		nr_matches=$(grep "$search" $f | wc -l)
		if [ $nr_matches -gt 0 ]; then
			echo "> Nr matches: $nr_matches in $f"
			total_files=$(( $total_files + 1 )) # total_files++
			total_matches=$(( $total_matches + $nr_matches ))
		fi
	done
	echo "> Matches: ${total_matches} | Files: ${total_files}."	

	echo "Are you sure do you want to exec: ´sed 's/$search/$replace/g'´ in ´${path}´? [Y/N]:"
	read sure
	sure=${sure:N}
	if [[ "$sure" != "y" && "$sure" != "Y" && "$sure" != "yes" && "$sure" != "YES" ]] ; then
		echo "Ok, nope."
		return
	fi

	tfile="/tmp/out.$$"
	echo "Let's do it!"
	for f in $(find $path -type f); do
		# Check if they're something.
		nr_matches=$(grep "$search" $f | wc -l)
		if [ $nr_matches -gt 0 ]; then
			echo "> Updating $f ..."
			sed "s/$search/$replace/g" "$f" > $tfile && mv $tfile "$f"
		fi
	done

	if [ -f $tfile ]; then
		rm $tfile
	fi
	echo "Everything was fine. Enjoy :-)"
}
alias replace=func_replace

