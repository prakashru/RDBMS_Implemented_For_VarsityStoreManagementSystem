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

	$pdat=$_POST['pdat']; $pmon=$_POST['pmon']; $pyar=$_POST['pyar'];
	$ndat=$_POST['ndat']; $nmon=$_POST['nmon']; $nyar=$_POST['nyar'];

	if(strlen($pdat)==0||strlen($pmon)==0||strlen($pyar)==0||strlen($ndat)==0||strlen($nmon)==0||strlen($nyar)==0)
		die("Sorry! You have to fill all the boxes.");

	$prev=($pdat*24*60)+($pmon*30*24*60)+($pyar*365*30*24*60);
	$new=($ndat*24*60)+($nmon*30*24*60)+($nyar*365*30*24*60);


	//print($itm);

	$result=mysql_query("SELECT * from invoice WHERE item='$itm'");

	$total_quant=0; $total_tk=0;

	print("<center><h2>Invoices of ".$itm." From ".$pdat."/".$pmon."/".$pyar." To ".$ndat."/".$nmon."/".$nyar." Are:</h2></center>");

	echo "<table border='2' cellpadding='2' align='center' valign='top'>
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

		$pres=$row['date'];
		$yar=(($pres[0]-'0')*1000)+(($pres[1]-'0')*100)+(($pres[2]-'0')*10)+($pres[3]-'0');
		$mon=($pres[5]-'0')*10+$pres[6]-'0';
		$dat=($pres[8]-'0')*10+$pres[9]-'0';
		$now=($dat*24*60)+($mon*30*24*60)+($yar*365*30*24*60);

		if($now>=$prev&&$now<=$new)
			{
			$total_quant+=$row['quantity'];
			$total_tk+=$row['total_price'];
			echo "<tr>";
			echo "<td>".$row['date']."</td>";
			echo "<td>".$row['item']."</td>";
			echo "<td>".$row['supplier']."</td>";
			echo "<td>".$row['quantity']."</td>";
			echo "<td>".$row['total_price']."</td>";
			echo "<td>".$row['stored']."</td>";
			echo "</tr>";
			}
		}
	echo "<tr>";
	echo "<td>&nbsp;</td>";
	echo "<td>&nbsp;</td>";
	echo "<td>Total</td>";
	echo "<td>$total_quant</td>";
	echo "<td>$total_tk</td>";
	echo "<td>&nbsp;</td>";
	echo "</tr>";
	echo "</table>";
	}
else
	{
	echo "<center><h3>Select an item name</h3><center>";
	echo "<form action=\"?op=ok\" method=\"POST\">";
	echo "<table align='center' cellpadding='2' border='2'>";
	echo "<tr>";
	echo "<td>Item:</td>";
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
	/*echo "<tr>";
	echo "<td>&nbsp;</td>";
	echo "<td><input type=\"submit\" value=\"Submit\"></td>";
	echo "</tr>";*/
	echo "</table>";
	echo "<table align='center' valign='top' cellpadding='2' border='2'>";
	echo "<tr>";
	echo "<td bgcolor='gray'>&nbsp;</td>";
	echo "<td bgcolor='gray'>Day</td>";
	echo "<td bgcolor='gray'>Month</td>";
	echo "<td bgcolor='gray'>Year</td>";
	echo "</tr>";

	echo "<tr>";
	echo "<td bgcolor='gray'>FROM</td>";
	echo "<td bgcolor='silver'><input name=\"pdat\" MAXLENGTH=\"2\"></td>";
	echo "<td bgcolor='silver'><input name=\"pmon\" MAXLENGTH=\"2\"></td>";
	echo "<td bgcolor='silver'><input name=\"pyar\" MAXLENGTH=\"4\"></td>";
	echo "</tr>";

	echo "<tr>";
	echo "<td bgcolor='gray'>TO</td>";
	echo "<td bgcolor='silver'><input name=\"ndat\" MAXLENGTH=\"2\"></td>";
	echo "<td bgcolor='silver'><input name=\"nmon\" MAXLENGTH=\"2\"></td>";
	echo "<td bgcolor='silver'><input name=\"nyar\" MAXLENGTH=\"4\"></td>";
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

//mysql_close($con);

?>

</td>
</tr>
</table>

</body>

</html>