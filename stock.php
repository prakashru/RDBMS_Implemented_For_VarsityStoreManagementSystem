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


//first part.

echo "<center><h2>The Total Stock of all Items:<h2></center>";

$result=mysql_query("SELECT * FROM all_items");

echo "<table border='8' cellpadding='10' width='500' align='center' valign='top'>
<tr>
<th>Item</th>
<th>Quantity</th>
</tr>";

while($row=mysql_fetch_array($result))
	{
	echo "<tr>";
	echo "<td>".$row['item']."</td>";
	echo "<td>".$row['quantity']."</td>";
	echo "</tr>";
	}
echo "</table>";

//mysql_close($con);

?>

</td>
</tr>
</table>

</body>

</html>