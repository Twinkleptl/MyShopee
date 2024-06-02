<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
<link rel="stylesheet" type="text/css" href="rightsidecss.css">
</head>
<body>

<?php

include "connection.inc";

function changeformat(&$var)
{
	$year=substr($var,-10,4);
	$month=substr($var,-5,-2);
	$day=substr($var,-2,2);
	$var=$day."-".$month.$year;
}
$qry="select distinct login.shopid,shopname,address,validity from shopdetails,login where shopdetails.shopid=login.shopid order by shopid desc ";
//echo $qry;
$result=$conn->query($qry);
//$row = $result->fetch_assoc();
//$shopid=$row['shopid'];
//echo $shopid;
//$validity=$row['validity'];
//changeformat($validity);

?>
<div class="EntryTableBox">
<table style="padding-left: 30px; padding-top: 30px;">
<tr style="background-color: blue;">
<td> EDIT </td>
	<td> SHOPID </td>
	<td> SHOPNAME </td>
	<td> ADDRESS </td>
    <td>VALIDITY</td>
</tr>
<?php

	while ($row = $result->fetch_assoc())
	{
		?>
		<tr><td> <a href="editvalidity.php?shopid=<?php echo $row['shopid']; ?>"> 
				 Edit
				 </a></td>
				<td> <?php echo $row['shopid']; ?> </td>
				<td> <?php echo $row['shopname']; ?> </td>
				<td> <?php echo $row['address']; ?> </td>
				<td> <?php changeformat($row['validity']);echo $row['validity'];?> </td></tr>

			
		<?php
	}
	?>

</table>
</div>
</body>
</html>