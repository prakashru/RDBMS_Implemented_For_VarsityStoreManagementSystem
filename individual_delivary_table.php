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


<form action="individual_delivary.php" method="POST">
<table align='center' valign='top' cellpadding='5' border='5'>

<th colspan='4'>Select Department</th>

<tr>
<td> CSE </td> <td> <input type='radio' name='dept' value='CSE'> </td>
<td> ICT </td> <td> <input type='radio' name='dept' value='ICT'> </td>
</tr>

<tr>
<td> EEE </td> <td> <input type='radio' name='dept' value='EEE'> </td>
<td> Architecture </td> <td> <input type='radio' name='dept' value='Architecture'> </td>
</tr>

<tr>
<td> Textile </td> <td> <input type='radio' name='dept' value='Textile'> </td>
<td> Pharmacy </td> <td> <input type='radio' name='dept' value='Pharmacy'> </td>
</tr>

<tr>
<td> BBA </td> <td> <input type='radio' name='dept' value='BBA'> </td>
<td> MBA </td> <td> <input type='radio' name='dept' value='MBA'> </td>
</tr>

<tr>
<td> LLB </td> <td> <input type='radio' name='dept' value='LLB'> </td>
<td> English </td> <td> <input type='radio' name='dept' value='English'> </td>
</tr>


<tr>
<td> Bangla </td> <td> <input type='radio' name='dept' value='Bangla'> </td>
<td> Economics </td> <td> <input type='radio' name='dept' value='Economics'> </td>
</tr>


<tr>
<td> Islamic Studies </td> <td> <input type='radio' name='dept' value='Islamic Studies'> </td>
<td> HRM </td> <td> <input type='radio' name='dept' value='HRM'> </td>
</tr>

</table>

<table align='center' valign='top' cellpadding='5' border='5'>

<tr>
<th colspan='4'> Select Position </th>
</tr>

<tr>
 <td> Teacher </td> <td> <input type='radio' name='pos' value='Teacher'> </td>
<td> Staff </td> <td> <input type='radio' name='pos' value='Staff'> </td>
</tr>

</table>

<table align='center' valign='top' border='5' cellpadding='5'>

<tr><td> <input type="submit" value="Submit"> </td> </tr>

</table>

</form>



</td>
</tr>
</table>

</body>

</html>