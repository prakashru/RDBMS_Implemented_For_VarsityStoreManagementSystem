<?php
SESSION_START();
?>

<html>

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

<td>

<td width='85%' valign='top'>


<?php

$con=include("dbConfig.php");

if(!$con)
	die("Error! Dtabase Connection Failed! ".mysql_error());


$dep=$_POST["dept"];

$pos=$_POST["pos"];

$_SESSION["dept"]=$dep;
$_SESSION["posi"]=$pos;

//echo $dep." ".$pos." outside\n";
//echo $_SESSION["dept"]." ".$_SESSION["posi"]." outside\n";

if($_GET["op"]=="ok")
	{

	$dep=$_POST["dp"];

	$pos=$_POST["ps"];


	//echo $dep." ".$pos." inside\n";
	//echo $_SESSION["dept"]." ".$_SESSION["posi"]." inside\n";

	$names=$_POST["nam"];

	echo "<center><h2>Name: ".$names."</h2></center>";
	echo "<center><h2>Department: ".$dep."</h2></center>";
	echo "<center><h2>Position: ".$pos."</h2></center>";

	$res=mysql_query("SELECT * FROM delivery WHERE name='$names' AND position='$pos' AND department='$dep'");

	echo "<table align='center' valign='top' border='5' cellpadding='5' width='50%'>
	<tr>
	<th>Date</th>
	<th>Item</th>
	<th>Quantity</th>
	<th>Comment</th>
	</tr>";
	while($ro=mysql_fetch_array($res))
		{
		echo "<tr>";
		echo "<td>".$ro['date']."</td>";
		echo "<td>".$ro['itemname']."</td>";
		echo "<td>".$ro['quantity']."</td>";
		if(strlen($ro['comment'])>0)
			echo "<td>".$ro['comment']."</td>";
		else
			echo "<td>&nbsp;</td>";
		echo "</tr>";
		}
	echo "</table>";

	}
else
	{

	$q=mysql_query("SELECT * FROM department WHERE pos='$pos' AND dept='$dep'");

	print("<center><h2>Select Name</h2></center>");

	print("<form action=\"?op=ok\" method=\"POST\">");
	print("<table align='center' valign='top' cellpadding='5' border='5' width='50%'>");
	print("<tr><td> Name: </td>");
	print("<td>");
	print("<select name=\"nam\">");
	while($row=mysql_fetch_array($q))
		{

		echo "<option>$row[name]<option>";

		}
	print("</select></td></tr>");
	print("<tr><input type=\"hidden\" name=\"dp\" value=\"$dep\">");
	print("<input type=\"hidden\" name=\"ps\" value=\"$pos\"></tr>");
	print("<tr> <td>&nbsp</td><td>");
	print("<input type=\"submit\" value=\"Submit\">");
	print("</td></tr></table>");
	print("</form>");


	}

?>


</td>

</tr>

</table>

</body>

</html>