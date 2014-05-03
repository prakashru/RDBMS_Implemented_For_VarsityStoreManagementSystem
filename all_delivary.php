<html>

<head>
<link rel="stylesheet" type="text/css" href="style01.css"/>
</head>

<body>
<div class="header"><h1 class="header">Southeast University</h1></div>

<table width='100%'>
<tr>

<td width='15%' valign='top' align='center'>
<p align='center'>SELECT OPTIONS</p>

<?php
include("menu_table.html");
?>

</td>

<td width='85%' valign='top' align='center'>

<?php

$con=include("dbConfig.php");

if(!$con)
	die("Error: Could not conecct".mysql_error());

if($_GET['op']=='reg')
	{
	$pdat=$_POST['pdat']; $pmon=$_POST['pmon']; $pyar=$_POST['pyar'];
	$ndat=$_POST['ndat']; $nmon=$_POST['nmon']; $nyar=$_POST['nyar'];

	if(strlen($pdat)==0||strlen($pmon)==0||strlen($pyar)==0||strlen($ndat)==0||strlen($nmon)==0||strlen($nyar)==0)
		die("Sorry! You have to fill all the boxes.");

	print("<center><h2>All Deliveries from ".$pdat."/".$pmon."/".$pyar." to ".$ndat."/".$nmon."/".$nyar.".</h2></center>");

	$prev=($pdat*24*60)+($pmon*30*24*60)+($pyar*365*30*24*60);
	$new=($ndat*24*60)+($nmon*30*24*60)+($nyar*365*30*24*60);

	$res=mysql_query("SELECT * FROM delivery");

	echo "<table border='1' cellpadding='5' width='1000'>
	<tr>
	<th>Date</th>
	<th>Item</th>
	<th>Quantity</th>
	<th>Recieved For</th>
	<th>Department</th>
	<th>Teacher/staff</th>
	<th>comment</th>
	</tr>";

	while($row=mysql_fetch_array($res))
		{
		$pres=$row['date'];
		$yar=(($pres[0]-'0')*1000)+(($pres[1]-'0')*100)+(($pres[2]-'0')*10)+($pres[3]-'0');
		$mon=($pres[5]-'0')*10+$pres[6]-'0';
		$dat=($pres[8]-'0')*10+$pres[9]-'0';
		$now=($dat*24*60)+($mon*30*24*60)+($yar*365*30*24*60);

		if($now>=$prev&&$now<=$new)
			{
			echo "<tr>";
			echo "<td>".$row['date']."</td>";
			echo "<td>".$row['itemname']."</td>";
			echo "<td>".$row['quantity']."</td>";
			echo "<td>".$row['name']."</td>";
			echo "<td>".$row['department']."</td>";
			echo "<td>".$row['position']."</td>";
			echo "<td>".$row['comment']."</td>";
			echo "</tr>";
			}
		}
	print("</table>");
	}

else
	{

	echo "<center><h1>See All Deliveries</h1></caption>";
	echo "<form action=\"?op=reg\" method=\"POST\">\n";
	echo "<table align='center' valign='top' cellpadding='15' border='20'>";
	echo "<tr>";
	echo "<td bgcolor='gray'>&nbsp;</td>";
	echo "<td bgcolor='gray'>Date</td>";
	echo "<td bgcolor='gray'>Month</td>";
	echo "<td bgcolor='gray'>Year</td>";
	echo "</tr>";

	echo "<tr>";
	echo "<td bgcolor='gray'>FROM</td>";
	echo "<td bgcolor='silver'><input name=\"pdat\" MAXLENGTH=\"10\"></td>";
	echo "<td bgcolor='silver'><input name=\"pmon\" MAXLENGTH=\"10\"></td>";
	echo "<td bgcolor='silver'><input name=\"pyar\" MAXLENGTH=\"10\"></td>";
	echo "</tr>";

	echo "<tr>";
	echo "<td bgcolor='gray'>TO</td>";
	echo "<td bgcolor='silver'><input name=\"ndat\" MAXLENGTH=\"10\"></td>";
	echo "<td bgcolor='silver'><input name=\"nmon\" MAXLENGTH=\"10\"></td>";
	echo "<td bgcolor='silver'><input name=\"nyar\" MAXLENGTH=\"10\"></td>";
	echo "</tr>";

	echo "<tr>";
	echo "<td bgcolor='gray'>&nbsp;</td>";
	echo "<td bgcolor='silver'>&nbsp;</td>";
	echo "<td bgcolor='silver'><input type=\"submit\" value=\"submit\"></td>";
	echo "<td bgcolor='silver'>&nbsp;</td>";
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