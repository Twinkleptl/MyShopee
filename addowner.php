<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
	<link rel="stylesheet" type="text/css" href="rightsidecss.css">
</head>
<?php 
include "connection.inc";

$option="";

$qry = "select shopname from shopdetails";
if($result=$conn->query($qry))
{
	foreach($result as $row)
	{
			$temp=$row['shopname'];
			$option = $option . "<option value=\"$temp\"> $temp </option>";
	}	
}

//echo date('Y-m-d');

?>

<body>
<div class="box" style="height:1130px;margin-top:240px;">
<form action="saveowner.php" method="post">
<h2 style="color:green;">ADD OWNER</h2>
<h3 style="color:whitesmoke;">Select Shop:</h3>
<select name="selshop"style="width: 80%;">
	<?php echo $option; ?>
</select>  
<input type="text" name="fullname" placeholder="Enter Your Full Name" required="" style="margin-top:20px;">
<input type="text" name="address" placeholder="Enter Address" required="">
<input type="text" name="city" placeholder="Enter City" required="">
<input type="text" name="pincode" placeholder="Enter Pincode" required="">
<input type="text" name="state" placeholder="Enter State" required="">
<input type="text" name="country" placeholder="Enter Country" required="">
<input type="text" name="mobile" placeholder="Enter Mobile No" required="">
<input type="password" name="ownerusername" placeholder="Enter Username for Owner Login" required="">
<input type="password" name="ownerpassword" placeholder="Enter Password for Owner Login" required="">
<input type="password" name="retypepassword" placeholder="Re-Type Password" required=""><br>
<table border="1px">
	<td style="color:white;font-size:18px;">VALIDITY<br> UP-TO DATE</td>
	<td><input type="date" name="validity" value="<?php  echo date('Y-m-d') ?>"></td>
</table>

<input type="submit" name="" value="CREATE OWNER"style="margin-top:30px;">
</form>
</div>
</body>
</html>