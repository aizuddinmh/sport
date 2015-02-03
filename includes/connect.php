<?php

// Make a MySQL Connection
$host="localhost";
$user="root";
$password="";
$db = "booking";

$link = mysqli_connect($host, $user, $password);
mysqli_select_db($link, $db) or die(mysql_error());

$dbc = @mysql_connect($host,$user,$password) or die('ERROR CONNECTION' . mysql_error());
	mysql_select_db($db) or die('ERROR SELECT DB' . mysql_error());

?>
