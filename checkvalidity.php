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
$shopid=$_COOKIE['SHOPID'];
$username=$_COOKIE['USER'];
$qry="select validity from login where shopid=$shopid and username='$username'";
$result=$conn->query($qry);
$row = $result->fetch_assoc()

?>

<div class="box" style="height:270px;">
		<h2 style="color:green;">SHOW VALIDITY</h2>
		<form action="saveaddshop.php" method="post" style="padding-top: 40px; color:white;font-size:20px;font-weight: bold; text-align: center;">
			  <?php 
              echo "YOUR VALIDITY IS <BR><BR>".$row['validity'];
			  ?>
		
		</form>
	</div>

</body>
</html>