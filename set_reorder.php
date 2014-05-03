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

</td>

<td valign='top'>


<?php

$con=include("dbConfig.php");
if(!$con)
	die('Could not connect: '.mysql_error());

if($_GET["op"]=="ok")
	{
	if(!$_POST["itmName"])
		die("You need to provide an item name.");
	$itm=$_POST["itmName"];
	$itm=strtoupper($itm);

	$amnt=$_POST["amount"];

	$result=mysql_query("UPDATE all_items SET reorder='$amnt' WHERE item='$itm'");

	if(mysql_insert_id)
		echo "<center><h2>Reorder Level Successfully Set</h2></center>";
	else
		echo "<center><h2>Sorry! Reorder Level Not Set</h2></center>";
	}

else
	{
	echo "<center><h3>Set The Reoeder Level Of Selected Product</h3><center>";
	echo "<form action=\"?op=ok\" method=\"POST\">";
	echo "<table align='center' cellpadding='2' border='2'>";
	echo "<tr>";
	echo "<td bgcolor='SlateGray'>Item:</td>";
	//echo "<td bgcolor='silver'><input name=\"itmName\" size=\"30\"></td><br/>";
	echo "<td bgcolor='silver'>";
	echo "<select name=\"itmName\">";
	$res=mysql_query("SELECT item FROM all_items");
	for($i=0;$i<mysql_num_rows($res);$i++)
		{
		$row=mysql_fetch_assoc($res);
		echo "<option>$row[item]</option>";
		}
	echo "</select>";
	echo "</td>";
	echo "</tr><tr><td bgcolor='SlateGray'>&nbsp</td>";
	echo "<td bgcolor='silver'><input name=\"amount\" MAXLENGTH=\"10\"></td></tr><tr>";
	echo "<td bgcolor='SlateGray'>&nbsp</td><td bgcolor='silver'><input type=\"submit\" value=\"submit\"></td></tr>";
	}



?>

</td>
</tr>
</table>

</body>

</html>