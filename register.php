<?php
SESSION_START();
$power=$_SESSION["valid_page"];
if(strcmp($power,"Store Officer"))
	header("Location: home1.php");
?>
<head>
<link rel="stylesheet" type="text/css" href="style01.css"/>
</head>

<body>
<div class="header"><h1 class="header">Southeast University</h1></div>

<table width='100%'>
<tr>

<td width='15%' >
<p align='center'>SELECT OPTIONS</p>

<?php
include("menu_table.html");
?>

</td>

<td width='85%' valign='top'>


<?php

include("dbConfig.php");


if($_GET["op"]=="reg")  //input validation & Dbase codes
	{
	$bInputFlag=false;
	foreach($_POST as $field)
		{
		if($field!=" ")
			$bInputFlag=true;
		}
	if($bInputFlag==false)
		die("problem with your registration info. "."Plz try again.\n");

	$user=$_POST["username"];
	$pass=$_POST["password"];
	$email=$_POST["email"];
	$posi=$_POST["pos"];

	$user=stripslashes($user);
	$pass=stripslashes($pass);

	$user=mysql_real_escape_string($user);
	$pass=mysql_real_escape_string($pass);


	$q="INSERT INTO dbUsers(username,password,email,position) VALUES('$user','$pass','$email','$posi')";
	$r=mysql_query($q);  //run query

	if(!mysql_insert_id())
		die("Error: User not added to Database.");
	else
		echo "<center><h2>Thanks for registering!!!</h2></center>";
	}



else
	{

	print("<center><h2>Register an User</h2></center>");
	echo "<form action=\"?op=reg\" method=\"POST\">\n";
	echo "<table align='center' valign='top' cellpadding='10' border='10'>";
	echo "<tr> <td>Username:</td> <td><input name=\"username\" MAXLENGTH=\"16\"> </td> </tr>";
	echo "<tr><td>Password:</td> <td><input type=\"password\" name=\"password\" MAXLENGTH=\"16\"></td></tr>";
	echo "<tr><td>Email Address:</td> <td><input name=\"email\" MAXLENGTH=\"25\"></td></tr>";

	echo "<tr><td>Position:</td> <td><select name=\"pos\">";
	echo "<option value=\"Store Officer\">Store Officer</option>";
	echo "<option value=\"Secondary User\">Secondary User</option>";
	echo "</select></td></tr>";

	echo "<tr><td>&nbsp;</td> <td><input type=\"submit\"></td></tr>";

	echo "</table>";
	echo "</form>\n";
	}

?>


</td>
</tr>
</table>

</body>

</html>