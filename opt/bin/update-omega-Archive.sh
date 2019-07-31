#! /bin/sh
#
DBdir="/var/cache/xoogle-xapian-index/";
#
clear;
echo ""; echo "Starting indexing...."; echo "";
#
echo " +----------------------------------+";
omindex -v -d replace -R -p --db $DBdir --url /Archive/ /var/www/html/Archive/;
echo " +----------------------------------+";
#
echo ""; echo "Finished indexing. "; echo "";
#
#######
exit 0;
