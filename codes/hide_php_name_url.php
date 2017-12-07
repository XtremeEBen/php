This code is required to be added on the .htaccess, additionally is necessary to be structured
one controller system to redirect the request to the specific file.


Options +FollowSymLinks
RewriteEngine On

RewriteRule ^inicio?$ index.php

arquivo htaccess