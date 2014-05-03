<?php
$host="localhost";
$user="root";
$pass="";
$db="member";

$ms=mysql_connect($host,$user,$pass);  //this connects with data base.

if(!ms)
	echo "Error in connection.\n";

mysql_select_db($db);

?>