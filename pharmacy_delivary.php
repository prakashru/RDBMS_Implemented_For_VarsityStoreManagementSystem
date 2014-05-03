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

<td>

<td width='85%' valign='top'>
<?php
$con=include("dbConfig.php");

if(!$con)
	die("Could not connect: ".mysql_error());

if($_GET["op"]=="reg")
	{
	$bInputFlag=true;
	foreach($_POST as $field)
		if($field==" ")
			$bInputFlag=false;
	if($bInputFlag==false)
		die("Problem with your data entry. Please try again.");

	$itm=$_POST["itemname_drop"];
	$itm=strtoupper($itm);


	$quant=$_POST["qnty"];

	$posi=$_POST["pos"];

	$dept="pharm";

	$names=$_POST["nam_drop"];

	$xnam=$_POST["nam"];

	if(strlen($xnam)>0)
		$names=$xnam;
	$names=strtoupper($names);

	if(strlen($itm)==0||strlen($quant)==0||strlen($posi)==0||strlen($dept)==0||strlen($names)==0)
			die("<center><h1>Sorry! Fields must be filled appropriately.</h1></center>");


	$comet=$_POST["com"];

	$quer=mysql_query("SELECT * FROM department");

	$fl=1;

	while($res=mysql_fetch_array($quer))
		{
		//echo $res['name']." ".$res['pos']." ".$res['dept'];
		if($res['name']==$names&&$res['pos']==$posi&&$res['dept']==$dept)
			$fl=0;
		}
	if($fl)
		{
		$rs=mysql_query("INSERT INTO department (name,pos,dept) VALUES ('$names','$posi','$dept')");
		}
	//echo $fl." ".$names."<br/>";
	$q="INSERT INTO delivery(date,itemname,quantity,department,position,name,comment) VALUES (CURDATE(),'$itm','$quant','$dept','$posi','$names','$comet')";
	$r=mysql_query($q);

	if(!mysql_insert_id())
		die("Error: Sorry, informations are not added to the database.");
	else
		{

		$result=mysql_query("SELECT * FROM all_items WHERE item='$itm'");

		$row=mysql_fetch_array($result);

		if($row['quantity']<$quant)
			{
			print("<center><h1>Sorry! You have only ".$row['quantity']." ".$itm."(s) in stock.</center><h1>");
			exit;
			}


		$val=$row['quantity']-$quant;

		$xy=mysql_query("UPDATE all_items SET quantity='$val' WHERE item='$itm'");
		print("<center><h1>Delivary process Successful!</h1></center>");
		}
	}
else
	{
	$dpt="pharm";
	echo "<form action=\"?op=reg\" method=\"POST\">\n";
	echo "<table align='center' border='1' cellpadding='5'>";
	print("<caption><h1>Process Delivary</h1></caption>");
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
	print("<td bgcolor='gray'>&nbsp</td>");

	echo "</tr>";
	echo "<tr>";
	echo "<td bgcolor='gray'>Quantity: </td>";
	echo "<td bgcolor='silver'><input name=\"qnty\" MAXLENGTH=\"200\"></td>";
	print("<td bgcolor='gray'>&nbsp</td>");
	echo "</tr>";

	echo "<tr>";
	echo "<td bgcolor='gray'>Teacher/staff </td>";
	echo "<td bgcolor='silver'>";
	echo "<select name=\"pos\">";
	echo "<option>Teacher</option>";
	echo "<option>Staff</option>";
	echo "</select>";
	echo "</td>";
	print("<td bgcolor='gray'>&nbsp</td>");
	echo "</tr>";

	echo "<tr>";
	echo "<td bgcolor='gray'> Name </td>";
	echo "<td bgcolor='silver'>";
	echo "<select name=\"nam_drop\">";
	$rs=mysql_query("SELECT * FROM department WHERE dept='$dpt'");
	for($i=0;$i<mysql_num_rows($rs);$i++)
		{
		$rw=mysql_fetch_assoc($rs);
		echo "<option>$rw[name]</option>";
		}
	echo "</select>";
	echo "</td>";

	echo "<td bgcolor='silver'><input name=\"nam\" MAXLENGTH=\"50\"></td>";
	//print("<td bgcolor='gray'>&nbsp</td>");
	echo "</tr>";

	/*echo "<tr>";
	echo "<td bgcolor='gray'> Department </td>";
	echo "<td bgcolor='silver'>";
	echo "<select name=\"nam_drop\">";
	$rs=mysql_query("SELECT * FROM department WHERE dept='$dpt'");
	for($i=0;$i<mysql_num_rows($rs);$i++)
		{
		$rw=mysql_fetch_assoc($rs);
		echo "<option>$rw[name]</option>";
		}
	echo "</select>";
	echo "</td>";

	echo "<td bgcolor='silver'><input name=\"nam\" MAXLENGTH=\"50\"></td>";
	//print("<td bgcolor='gray'>&nbsp</td>");
	echo "</tr>";*/


	echo "<tr>";
	echo "<td bgcolor='gray'>Comment: </td>";
	echo "<td bgcolor='silver'><input name=\"com\" MAXLENGTH=\"100\"></td>";
	print("<td bgcolor='gray'>&nbsp</td>");
	print("</tr>");

	echo "<tr>";
	echo "<td bgcolor='gray'>&nbsp;</td>";
	echo "<td bgcolor='silver'><input type=\"submit\" value=\"submit\"></td>";
	print("<td bgcolor='gray'>&nbsp</td>");
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