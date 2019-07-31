#! /bin/sh
#==========================================================
#
#	pdfjedit_metadata.sh	  
#	%0.2%		2019-07-30	MK
#
#==========================================================
JAVA="/usr/lib/jvm/java-7-oracle/jre/bin/";
WrkDir=`pwd`;
DirName="$WrkDir/`dirname $1`";
PLIK=`basename $1 .pdf`;
#
clear;
echo ""; echo " +-----------------------------------+ "; echo "";
#
$JAVA/java -jar /usr/local/bin/pdfmeta_20120418.jar -cli $1;
#
echo "";
echo "Renaming files... $DirName/$PLIK.pdf";
echo "";
#
mv  $DirName/$PLIK.pdf $DirName/$PLIK-old.pdf;
mv  $DirName/$PLIK\_new.pdf $DirName/$PLIK.pdf;
#
pdfinfo "$1";
#
echo ""; echo " +-----------------------------------+ "; echo "";
#
#######
exit 0;



#
metadata format:
Author new_Author
Title new_Title
Subject new_Subject
Keywords apple pear orange
#
