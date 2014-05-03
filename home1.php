<?php
SESSION_START();
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

<td valign='top'>

<?php

$user=$_SESSION["valid_user"];
$pow=$_SESSION["valid_page"];
$tim=$_SESSION["valid_time"];

//echo $user;

echo "<h3>User Information</h3>";

echo "<table border='2' cellpadding='5' valign='top' width='40%' bgcolor='Gray'>";

echo "<tr><td>User Name: </td>";
echo "<td>";
echo $user;
echo "</td></tr>";
echo "<tr><td>User Position: </td>";
echo "<td>";
echo $pow;
echo "</td></tr>";
echo "<tr><td>Date: </td>";
echo "<td>";
echo date("d/m/y");
echo "</td></tr>";

echo "</table>";


?>


</td>

</tr>

</table>

<script type="text/javascript">
var brows=navigator.appName;
var ver=navigator.appVersion;
var verson=parseFloat(ver);
document.write("Browser Name: "+brows+"<br/>");
document.write("Browser Version: "+verson);
</script>


</body>

</html>
