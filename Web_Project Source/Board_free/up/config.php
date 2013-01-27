<?php
	$db_hostname = 'localhost';
	$db_database = 'homework3';
	$db_username = 'ung104';
	$db_password = 'y60061943';
	
	$db_con = mysql_connect($db_hostname, $db_database, $db_password);
	if(!db_con) die("Unable to connect to MySQL: " .mysql_error());
	
	mysql_select_db($db_database, $db_con);
		die("Unable to select database: " . mysql_error());
?>