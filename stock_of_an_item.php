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
	die("Could not connect: ".mysql_error());

if($_GET["op"]=="ok")
	{
	if(!$_POST["itmName"])
		die("You need to provide an item name.");

	$itm=$_POST["itmName"];
	$itm=strtoupper($itm);

	$res=mysql_query("SELECT * FROM all_items WHERE item='$itm'");
	echo "<center><h2>Stock</h2></center>";
	echo "<table border='5' cellpadding='5' width='500' align='center' valign='top'>
	<tr>
	<th>Item</th>
	<th>Quantity</th>
	</tr>";

	while($row=mysql_fetch_array($res))
		{
		echo "<tr>";
		echo "<td>".$row['item']."</td>";
		echo "<td>".$row['quantity']."</td>";
		echo "</tr>";
		}
	echo "</table>";
	}
else
	{
	echo "<center><h2>Select an Item</h2></center>";
	echo "<form action=\"?op=ok\" method=\"POST\">";
	echo "<table border='15' cellpadding='20' valign='top' align='center'>";
	echo "<tr>";
	echo "<td>Item: </td>";
	//echo "<td><input name=\"itmName\" size=\"30\"></td><br/>";
	echo "<td>";
	echo "<select name=\"itmName\">";
	$res=mysql_query("SELECT item FROM all_items");
	for($i=0;$i<mysql_num_rows($res);$i++)
		{
		$row=mysql_fetch_assoc($res);
		echo "<option>$row[item]</option>";
		}
	echo "</select>";
	echo "</td>";
	echo "</tr>";
	echo "<tr>";
	echo "<td>&nbsp;</td>";
	echo "<td><input type=\"submit\" value=\"Total Stock\"></td>";
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