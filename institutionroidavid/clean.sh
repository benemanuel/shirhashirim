#!/bin/bash

# STEP 1a: removes useless files, which were part of the Google Sites login
rm account*
rm ServiceLogin*
rm *kids*
rm kid*
rm device*
rm phone*
rm security*
rm shield*
rm signin*
rm usb*
rm web_and*
rm who_will*
rm you_tube*
# STEP 1b: removes duplicated and useless files, maybe accidentally added by wget
rm *.gif.html
rm *.png.html
rm *.svg.html

for file in *.html; do
    # STEP 2: removes the HTML code added by the Wayback Machine
    perl -0777 -i -pe 's/<script.*Rewrite JS Include -->//igs' "$file"
    perl -0777 -i -pe 's/<\/html>.*/<\/html>/igs' "$file"

    # STEP 3: converts all absolute URLs pointing to the Wayback Machine to local URLs relative to the current path
    perl -0777 -i -pe 's/https:\/\/web\.archive\.org\/[^\s"]*\///igs' "$file"

    # STEP 4: deletes all queries from file names (and makes the suffix consistent for jpeg images)
    perl -0777 -i -pe 's/\.gif?[^\s"<]*/\.gif/igs' "$file"
    perl -0777 -i -pe 's/\.png?[^\s"<]*/\.png/igs' "$file"
    perl -0777 -i -pe 's/\.jpg?[^\s"<]*/\.jpg/igs' "$file"
    perl -0777 -i -pe 's/\.jpeg?[^\s"<]*/\.jpg/igs' "$file"
    perl -0777 -i -pe 's/\.css?[^\s"<]*/\.css/igs' "$file"

    # STEP 5: removes the nofollow signal to search engines added by the Wayback Machine
    perl -0777 -i -pe 's/rel="nofollow"//igs' "$file"

    # STEP 6: removes the Google Sites login footer
    perl -n -i -pe 's/<div.*sites-adminfooter.*<\/div>//igs' "$file"

    # STEP 7: removes invalid links and fixes link to the Creative Commons license
    perl -n -i -pe 's/<a href=.*>Visualizza<\/a>//igs' "$file"
    perl -n -i -pe 's/<a href="viewer.*">/<a id="invalidLink">/igs' "$file"
    perl -n -i -pe 's/<a href="deed\.it"/<a href="https:\/\/creativecommons\.org\/licenses\/by\/4.0\/deed.it"/igs' "$file"
    perl -n -i -pe 's/<a href="goog_60630410">/<a id="invalidLink">/igs' "$file"

    echo "$file code cleaned"
done

# STEP 8: renames all files with queries (compare with STEP 4)
for file in {*.gif,*.png,*.jpg,*.jpeg,*.css}\?*; do
    withoutQueries=`echo $file | cut -d? -f1`
    mv "$file" "$withoutQueries"
    echo "Removed query strings from $withoutQueries"
done

# STEP 9: makes the file extension consistent for jpeg images (compare with STEP 4)
find . -type f -name '*.jpeg' -print0 | xargs -0 rename 's/\.jpeg/\.jpg/'
