<?php

session_start();

?>


<html>

<head>
<link rel="stylesheet" type="text/css" href="style01.css"/>
</head>

<body>

<div class="header"><h1 class="header">Southeast University</h1></div>

<table width='100%'>
<tr>

<td width='15%' valign='top'>
<p align='center'>SELECT OPTIONS</p>

<?php

include("menu_table.html");

?>


</td>

<td align='center' valign='top'>


<?php


$con=include("dbConfig.php");

if(!$con)
	die("Could not connect: ".mysql_error());

/*
echo "<head>";
echo "<link rel="stylesheet" type="text/css" href="style01.css"/>";
echo "</head>";


echo "<div class="header"><h1 class="header">Southeast University</h1></div>";*/


if(isset($_SESSION["valid_id"]))
	$id=$_SESSION["valid_id"];

if(isset($_SESSION["valid_user"]))
	$user=$_SESSION["valid_user"];


if($_GET["op"]=="reg")
	{
	$bInputFlag=true;
	foreach($_POST as $field)
		if($field==" ")
			$bInputFlag=false;
	if($bInputFlag==false)
		die("Problem with your data entry. Please try again.");

	$old_password=$_POST["old_pass"];
	$new_pass1=$_POST["new1"];
	$new_pass2=$_POST["new2"];

	$q=mysql_query("SELECT * FROM dbusers WHERE username='$user'");
	$row=mysql_fetch_array($q);

	if($old_password==$row['password'])
		{
		if($new_pass1!=$new_pass2)
			die("Sorry! Your passwords do not match!!");
		else
			{
			$quer=mysql_query("UPDATE dbusers SET password='$new_pass1' WHERE id='$id' AND username='$user'");
			echo "<center><h2>You have successfully changed your password.</h2></center>";
			}
		}
	else
		die("Sorry! wrong password!!");

	}

else
	{
	echo "<form action=\"?op=reg\" method=\"POST\">\n";
	echo "<table border='1' cellpadding='5' align='center'>";
	echo "<caption>Change Password</caption>";
	echo "<tr>";
	echo "<td>Old password:</td>";
	echo "<td><input type=\"password\" name=\"old_pass\" size=\"20\"></td>";
	echo "</tr>";
	echo "<tr>";
	echo "<td>Enter new password:</td>";
	echo "<td><input type=\"password\" name=\"new1\" size=\"20\"></td>";
	echo "</tr>";
	echo "<tr>";
	echo "<td>Re-enter new password:</td>";
	echo "<td><input type=\"password\" name=\"new2\" size=\"20\"></td>";
	echo "</tr>";
	echo "<tr>";
	echo "<td>&nbsp;</td>";
	echo "<td><input type=\"submit\" value=\"Change Password\">";
	echo "</tr>";
	echo "</table>";
	echo "</form>";
	}

?>


</td>

</tr>

</table>

</body>

</html>