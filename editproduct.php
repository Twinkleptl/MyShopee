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
$prodid = intval($_GET['prodid']);

$username=$_COOKIE['USER'];
$usertype=$_COOKIE['USERTYPE'];
$shopid=$_COOKIE['SHOPID'];


$qry="select * from proditems$shopid where prodid = '$prodid'";
$result=$conn->query($qry);
$row = $result->fetch_assoc();

?>

<div class="box" style="height:400px;">
		<h2 style="color:green;">EDIT PRODUCT</h2>
		<form action="editproductfinally.php" method="post">
			<input type="hidden" name="prodid" value="<?php echo $row['prodid']; ?>">
			<input type="text" name="prodname" placeholder="Enter Product Name"   required="" value="<?php echo $row['prodname']; ?>">
			<input type="text" name="productprice" placeholder="Enter Product Price" required="" value="<?php echo $row['unitprice']; ?>">
			<input type="text" name="status" placeholder="Enter Status" required="" value="<?php echo $row['status']; ?>">
		
			<b><input type="submit" value="EDIT PRODUCT"></b>
		</form>
	</div>

			
	

</body>
</html>