<?php
	$hostName = "localhost";
   	$databaseName = "qldo";
   	$username = "root";
   	$password = "";	
	$maxPages=5;
	$maxItems = 10;
	$link = mysql_connect($hostName, $username, $password);
	mysql_set_charset('utf8', $link);
?>