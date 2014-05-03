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

<td width='15%' valign='top'>
<p align='center'>SELECT OPTIONS</p>

<?php
include("menu_table.html");
?>

</td>

<td align='center' valign='top'>

<center><h2>Select a Department</h2></center>

<table align='center' valign='top' cellpadding='10' border='15'>
<tr> <td bgcolor='Darkgray' onMouseover="this.bgColor='Gray'" onMouseout="this.bgColor='Darkgray'"> <a href="cse_delivary.php">CSE</a> </td>
 <td bgcolor='DarkGray' onMouseover="this.bgColor='Gray'" onMouseout="this.bgColor='DarkGray'"> <a href="ice_delivary.php">ICT</a> </td> </tr>
<tr> <td bgcolor='Darkgray' onMouseover="this.bgColor='Gray'" onMouseout="this.bgColor='Darkgray'"> <a href="eee_delivary.php">EEE</a> </td>
 <td bgcolor='Darkgray' onMouseover="this.bgColor='Gray'" onMouseout="this.bgColor='Darkgray'"> <a href="arch_delivary.php">Architecture</a> </td> </tr>
<tr> <td bgcolor='Darkgray' onMouseover="this.bgColor='gray'" onMouseout="this.bgColor='Darkgray'"> <a href="bba_delivary.php">BBA</a> </td>
 <td bgcolor='Darkgray' onMouseover="this.bgColor='gray'" onMouseout="this.bgColor='Darkgray'"> <a href="mba_delivary.php">MBA</a> </td> </tr>
<tr> <td bgcolor='Darkgray' onMouseover="this.bgColor='gray'" onMouseout="this.bgColor='Darkgray'"> <a href="english_delivary.php">English</a> </td>
 <td bgcolor='Darkgray' onMouseover="this.bgColor='gray'" onMouseout="this.bgColor='Darkgray'"> <a href="textile_delivary.php">Textile</a> </td> </tr>
<tr> <td bgcolor='Darkgray' onMouseover="this.bgColor='gray'" onMouseout="this.bgColor='Darkgray'"> <a href="pharmacy_delivary.php">Pharmacy</a> </td>
 <td bgcolor='Darkgray' onMouseover="this.bgColor='gray'" onMouseout="this.bgColor='Darkgray'"> <a href="llb_delivary.php">LLB</a> </td> </tr>
<tr> <td bgcolor='Darkgray' onMouseover="this.bgColor='gray'" onMouseout="this.bgColor='Darkgray'"> <a href="bangla_delivary.php">Bangla</a> </td>
 <td bgcolor='Darkgray' onMouseover="this.bgColor='gray'" onMouseout="this.bgColor='Darkgray'"> <a href="economics_delivary.php">Economics</a> </td> </tr>
<tr> <td bgcolor='Darkgray' onMouseover="this.bgColor='gray'" onMouseout="this.bgColor='Darkgray'"> <a href="islam_delivary.php">Islamic Studies</a> </td>
 <td bgcolor='Darkgray' onMouseover="this.bgColor='gray'" onMouseout="this.bgColor='Darkgray'"> <a href="hrm_delivary.php">HRM</a> </td> </tr>

</table>

</td>

</tr>

</table>

</body>

</html>