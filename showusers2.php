<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
	<link rel="stylesheet" type="text/css" href="rightsidecss.css">
</head>
<body>


<?php
$susername=$_GET['susername'];

include "connection.inc";

$qry="select * from persondetails where username = '$susername'";
$result=$conn->query($qry);
$row = $result->fetch_assoc();

?>

<div class="box" style="height:850px; margin-top:100px;">
		<h2 style="color:green;">EDIT OWNER/SELLER DETAILS</h2>
		<form action="saveuserdetails.php" method="post">
			<input type="text" name="username" placeholder="Enter Shop Name" readonly  required="" value="<?php echo $row['username']; ?>">
			<input type="text" name="fullname" placeholder="Enter Shop Address" readonly required="" value="<?php echo $row['fullname']; ?>">
			<input type="text" name="address" placeholder="Enter City" required="" value="<?php echo $row['address']; ?>">
			<input type="text" name="pincode" placeholder="Enter Pincode" required="" value="<?php echo $row['pincode']; ?>">
			<input type="text" name="state" placeholder="Enter State" required="" value="<?php echo $row['state']; ?>">
			<input type="text" name="city" placeholder="Enter State" required="" value="<?php echo $row['city']; ?>">
			<input type="text" name="country" placeholder="Enter Country" required="" value="<?php echo $row['country']; ?>">
			<input type="text" name="mobile" placeholder="Enter Country" required="" value="<?php echo $row['mobile']; ?>">
		
			<b><input type="submit" value="EDIT USER"></b>
		</form>
	</div>

			
	

</body>
</html>