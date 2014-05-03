<?php
SESSION_START();
$power=$_SESSION["valid_page"];
if(strcmp($power,"Store Officer"))
	header("Location: home1.php");
?>
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

<td>

<td width='85%' valign='top' align='center'>


<?php
$con=include("dbConfig.php");

if(!$con)
	die("Could not connect: ".mysql_error());

if($_GET["op"]=="reg")
	{


	$itm=$_POST["itemname_drop"];
	if($_POST["itemname"]!='')
		$itm=$_POST["itemname"];
	$itm=strtoupper($itm);

	$supplier=$_POST["supp_name"];
	$supplier=strtoupper($supplier);

	$quantity=$_POST["quant"];

	$total_price=$_POST["tot_pr"];

	$stored=$_POST["stor"];
	$stored=strtoupper($stored);

	if(strlen($itm)==0||strlen($supplier)==0||strlen($quantity)==0||strlen($total_price)==0)
			die("<center><h2>Sorry! Fields must be filled appropriately.</h2></center>");

	$q="INSERT INTO invoice(date,item,supplier,quantity,total_price,stored) VALUES (CURDATE(),'$itm','$supplier','$quantity','$total_price','$stored')";
	$r=mysql_query($q);

	if(!mysql_insert_id())
		die("Error: Sorry, informations are not added to the database.");
	else
		{

		$result=mysql_query("SELECT * FROM all_items WHERE item='$itm'");
		$row=mysql_fetch_array($result);

		$fl=0;

		if($row['item']!=$itm)
			{
			$pq=mysql_query("INSERT INTO all_items (item,quantity) VALUES ('$itm','$quantity')");
			//echo "<h3>$itm</h3>";
			$fl=1;
			}
		if($fl==0)
			{
			$val=$row['quantity']+$quantity;
			mysql_query("UPDATE all_items SET quantity='$val' WHERE item='$itm'");
			}
		echo "<h2>Invoice Successful!!</h2>";
		//Header("Location: new_invoice.php?op=thanks");
		}
	}
/*else if($_GET["op"]=="thanks")
	echo "<h2>The invoice is stored successfully!</h2>";*/
else
	{
	echo "<form action=\"?op=reg\" method=\"POST\">\n";
	echo "<table align='center' border='1' cellpadding='5'>";
	print("<caption><h1>Process Invoice</h1><caption>");
	echo "<tr>";
	echo "<td bgcolor='gray'>Item name: </td>";

	echo "<td bgcolor='silver'>";
	echo "<select name=\"itemname_drop\">";
	$res=mysql_query("SELECT item FROM all_items");
	for($i=0;$i<mysql_num_rows($res);$i++)
		{
		$row=mysql_fetch_assoc($res);
		echo "<option>$row[item]</option>";
		}
	echo "</select>";
	echo "</td>";
	echo "<td bgcolor='gray'>or</td>";
	echo "<td bgcolor='silver'><input name=\"itemname\" MAXLENGTH=\"50\"></td>";
	echo "</tr>";
	echo "<tr>";
	echo "<td bgcolor='gray'>Supplier name: </td>";
	echo "<td bgcolor='silver'><input name=\"supp_name\" MAXLENGTH=\"200\"></td>";
	echo "<td bgcolor='gray'> &nbsp; </td>";
	echo "<td bgcolor='gray'> &nbsp; </td>";
	echo "</tr>";
	echo "<tr>";
	echo "<td bgcolor='gray'>Quantity: </td>";
	echo "<td bgcolor='silver'><input name=\"quant\" MAXLENGTH=\"20\"></td>";
	echo "<td bgcolor='gray'> &nbsp; </td>";
	echo "<td bgcolor='gray'> &nbsp; </td>";
	echo "</tr>";
	echo "<tr>";
	echo "<td bgcolor='gray'>Total price: </td>";
	echo "<td bgcolor='silver'><input name=\"tot_pr\" MAXLENGTH=\"20\"></td>";
	echo "<td bgcolor='gray'> &nbsp; </td>";
	echo "<td bgcolor='gray'> &nbsp; </td>";
	echo "</tr>";
	echo "<tr>";
	echo "<td bgcolor='gray'>Storing place: </td>";
	//echo "<td bgcolor='silver'><input name=\"stor\" MAXLENGTH=\"50\"></td>";
	echo "<td bgcolor='silver'>";
	echo "<select name=\"stor\">";
	echo "<option>Central Store</option>";
	echo "<option>Deck</option>";
	echo "</select>";
	echo "</td>";
	echo "<td bgcolor='gray'> &nbsp; </td>";
	echo "<td bgcolor='gray'> &nbsp; </td>";
	echo "</tr>";
	echo "<tr>";
	echo "<td bgcolor='gray'>&nbsp;</td>";
	echo "<td bgcolor='silver'><input type=\"submit\" value=\"submit\"></td>";
	echo "<td bgcolor='gray'> &nbsp; </td>";
	echo "<td bgcolor='gray'> &nbsp; </td>";
	echo "</tr>";
	echo "</table>";
	echo "</form>\n";
	}
//mysql_close($con);
?>

</td>
</tr>
</table>

</body>

</html>