In newer version of wamp, changing DocumentRoot in httpd.conf did not change DOCUMENT_ROOT. Even after restarting it stayed as "C:/wamp64/www/".$_COOKIE

Instead, the DocumentRoot is set in this file:

C:\wamp64\bin\apache\apache2.4.18\conf\extra\httpd-vhosts.tidy_config_count

To change the localhost directory, change these to your path.

DocumentRoot C:/www
<Directory   "C:www/">


Author: pyscho brm @ stack overflow