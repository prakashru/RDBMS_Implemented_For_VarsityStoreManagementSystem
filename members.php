<?php

session_start();

if(!$_SESSION["valid_user"])
	Header("Location: login.php");

echo "<p>User ID: ".$_SESSION["valid_id"];
echo "<p>Username: ".$_SESSION["valid_user"];
echo "<p>Logged in at: ".date("d/m/y",$_SESSION["valid_time"]);


?>