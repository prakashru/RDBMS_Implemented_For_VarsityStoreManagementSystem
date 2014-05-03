<?php
session_start();
$con=include("dbConfig.php");
if(!$con)
	die("<center><h2>Error! Database Connection Failed</h2></center>");
if($_GET["op"]=="login")
	{
	if(!$_POST["username"]||!$_POST["password"])
		die("You need to provide username & password.");
	$user=$_POST["username"];
	$pass=$_POST["password"];

	$user=stripslashes($user);
	$pass=stripslashes($pass);

	$user=mysql_real_escape_string($user);
	$pass=mysql_real_escape_string($pass);

	//$email=$_POST["email"];
	$q="SELECT * from dbUsers WHERE username='$user' AND password='$pass'";
	$r=mysql_query($q);
	if($obj=@mysql_fetch_object($r))
		{
		$_SESSION["valid_id"]=$obj->id;
		$_SESSION["valid_user"]=$user;
		$_SESSION["valid_page"]=$obj->position;
		$_SESSION["valid_time"]=time();
		Header("Location: home1.php");
		}
	else
		die("SORRY!! Wrong login information.");
	}
else
	{
	echo "<form action=\"?op=login\" method=\"POST\">";
	echo "<table border='1' cellpadding='5' align='center'>";
	echo "<caption> PLEASE LOG IN </caption>";
	echo "<tr>";
	echo "<td>Username:</td>";
	echo "<td><input name=\"username\" size=\"20\"></td>";
	echo "</tr>";
	echo "<tr>";
	echo "<td>Password:</td>";
	echo "<td><input type=\"password\" name=\"password\" size=\"20\"></td>";
	echo "</tr>";
	echo "<tr>";
	echo "<td>&nbsp</td>";
	echo "<td><input type=\"submit\" value=\"Login\"></td>";
	echo "</tr>";
	echo "</form>";
	}
?>
