<?php 
	$link = mysqli_connect('localhost', 'root', 'pwd'); 
	if (!$link)
	{ 
		die('Could not connect to MySQL: ' . mysql_error()); 
	} 
	echo 'Connection OK';
	mysqli_close($link); 
?> 
