#!/bin/bash
wget -e robots=off -r -nH -nd --page-requisites --content-disposition --convert-links --adjust-extension \
--user-agent="Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:95.0) Gecko/20100101 Firefox/95.0" \
--timestamping --accept-regex='institutionroidavid|ssl\.gstatic\.com|www\.google\.com/images\
|88x31\.png|bundle-playback\.js|wombat\.js|banner-styles\.css|iconochive\.css|\
standard-css-ember-ltr-ltr\.css|jot_min_view__it\.js|tree_ltr\.gif|apple-touch-icon\.png\
|sites-16\.ico|filecabinet\.css|record\.css' \
--reject-regex='accounts\.google\.com|reportAbuse\.html|showPrintDialog|docs\.google\.com|\
youtube\.com|\.mp4' \
     https://web.archive.org/web/20021017141855/http://www.institutionroidavid.com/
