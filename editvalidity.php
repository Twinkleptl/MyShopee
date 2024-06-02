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
$shopid = intval($_GET['shopid']);
function changeformat(&$var)
{
	$year=substr($var,-10,4);
	$month=substr($var,-5,-2);
	$day=substr($var,-2,2);
	$var=$day."-".$month.$year;
}

$qry1="select distinct validity from login where shopid=$shopid";
//echo $qry;
$result=$conn->query($qry1);
$row = $result->fetch_assoc();
$validity=$row['validity'];
changeformat($validity);

$qry2="select shopname,address from shopdetails where shopid=$shopid";
//echo $qry;
$result=$conn->query($qry2);
$row = $result->fetch_assoc();

?>

<div class="box" style="height:550px;">
		<h2 style="color:green;">EDIT VALIDITY</h2>
		<form action="savevalidity.php" method="post">
			<input type="hidden" name="shopid" value="<?php echo $shopid; ?>">
			<input type="text" name="shopname" placeholder="Enter Shop Name" readonly  required="" value="<?php echo $row['shopname']; ?>">
			<input type="text" name="address" placeholder="Enter Shop Address" required="" value="<?php echo $row['address']; ?>">
			<input type="text" name="cvalidity" placeholder="Current Validity" readonly  required="" value="<?php echo "current validity : ".$validity ?>">
			<table border="1px">
	<td style="color:white;font-size: 14px;">VALIDITY<br> UP-TO DATE</td>
	<td><input type="date" name="validity" value="<?php  echo date('Y-m-d') ?>"></td>
</table>
			<b><input type="submit" value="EDIT VALIDITY" style="margin-top:40px;"></b>
		</form>
	</div>

			
	

</body>
</html>