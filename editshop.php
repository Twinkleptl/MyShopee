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

$qry="select * from shopdetails where shopid = $shopid";
$result=$conn->query($qry);
$row = $result->fetch_assoc();

?>

<div class="box" style="height:890px; margin-top:130px;">
		<h2 style="color:green;">EDIT SHOP</h2>
		<form action="editshopfinally.php" method="post">
			<input type="hidden" name="shopid" value="<?php echo $row['shopid']; ?>">
			<input type="text" name="shopname" placeholder="Enter Shop Name" readonly  required="" value="<?php echo $row['shopname']; ?>">
			<input type="text" name="address" placeholder="Enter Shop Address" required="" value="<?php echo $row['address']; ?>">
			<input type="text" name="city" placeholder="Enter City" required="" value="<?php echo $row['city']; ?>">
			<input type="text" name="pincode" placeholder="Enter Pincode" required="" value="<?php echo $row['pincode']; ?>">
			<input type="text" name="state" placeholder="Enter State" required="" value="<?php echo $row['state']; ?>">
			<input type="text" name="country" placeholder="Enter Country" required="" value="<?php echo $row['country']; ?>">
			<input type="text" name="mobile1" placeholder="Enter Mobile No1" required="" value="<?php echo $row['mobile1']; ?>">
			<input type="text" name="mobile2" placeholder="Enter Mobile No2" required="" value="<?php echo $row['mobile2']; ?>">
			<input type="text" name="gstno" placeholder="Enter GSTNO" required="" value="<?php echo $row['gstno']; ?>">
			<b><input type="submit" value="EDIT SHOP"></b>
		</form>
	</div>

			
	

</body>
</html>