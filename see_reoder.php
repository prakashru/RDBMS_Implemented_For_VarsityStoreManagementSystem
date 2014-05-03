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

	$result=mysql_query("SELECT * FROM all_items");

	echo "<center><h2>Products need to Buy</h2></center>";

	echo "<table border='2' cellpadding='2' align='center' valign='top'>";

	while($row=mysql_fetch_array($result))
		{
		$stk=$row["quantity"];
		$red=$row["reorder"];
		if($stk<=$red)
			{
			echo "<tr><td bgcolor='Darkgray'>Only ".$row['quantity']." ".$row['item']." in the Stock</td></tr>";
			}
		}
	echo "</table>";



?>

</td>
</tr>
</table>

</body>

</html>