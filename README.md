# Xoogle
  
Xoogle is a personal document indexing system, geared towards small business or private article archive.  
Think of it as your own personal document search engine, or a local cache of online documents.  It provides fast search of document text and meta data.

Inspired by [xapers](https://github.com/nicolassmith/xapers).



## Getting Xoogle


### Source


Clone the repo:

    $ git clone git://github.com/MKOliva/xoogle.git
    $ cd xoogle

Dependencies :
  * apache
  * php
  * xapian-omega 
  * poppler-utils  ( for indexing PDF documents )


### Installation

On Debian:

    $ sudo apt-get install apache php xapian-omega poppler-utils
    $ ln -s /var/cache/xoogle-xapian-index/ /var/lib/xapian-omega/data/xoogle

### Usage

Run indexing script: update-omega-Archive.sh

Open with any web browser ( "xoog" is an example name - of the host where the software is installed )
    http://xoog/search/
