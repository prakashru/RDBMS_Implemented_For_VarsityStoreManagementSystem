<html>

<head>
<link rel="stylesheet" type="text/css" href="style01.css"/>
</head>

<body>
<div class="header"><h1 class="header">Southeast University</h1></div>

<table width='100%'>
<tr>

<td width='15%' valign='top'>

<?php
include("menu_table.html");
?>

<td>

<td width='85%'>

<h3>Invoices:</h3>

<?php
$con=include("dbConfig.php");
if(!$con)
	die('Could not connect: '.mysql_error());

$result=mysql_query("SELECT * FROM invoice");

echo "<table border='1' cellpadding='5' width='1000'>
<tr>
<th>date</th>
<th>item</th>
<th>supplier</th>
<th>quantity</th>
<th>total price</th>
<th>stored</th>
</tr>";

while($row=mysql_fetch_array($result))
	{
	echo "<tr>";
	echo "<td>".$row['date']."</td>";
	echo "<td>".$row['item']."</td>";
	echo "<td>".$row['supplier']."</td>";
	echo "<td>".$row['quantity']."</td>";
	echo "<td>".$row['total_price']."</td>";
	echo "<td>".$row['stored']."</td>";
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