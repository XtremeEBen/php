Help to increase security for injection. Do not rely only on this for protection, search for other ways as well.

$name = stripslashes($name);
$password = stripslashes($password);
$name = mysql_real_escape_string($name);
$password = mysql_real_escape_string($password);