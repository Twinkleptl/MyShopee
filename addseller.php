<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
	<link rel="stylesheet" type="text/css" href="rightsidecss.css">
</head>

<body>
<div class="box" style="height:980px;margin-top:180px;">
<form action="saveseller.php" method="post">
<h2 style="color:green;">ADD SELLER</h2>
  
<input type="text" name="fullname" placeholder="Enter Your Full Name" required="">
<input type="text" name="address" placeholder="Enter Address" required="">
<input type="text" name="city" placeholder="Enter City" required="">
<input type="text" name="pincode" placeholder="Enter Pincode" required="">
<input type="text" name="state" placeholder="Enter State" required="">
<input type="text" name="country" placeholder="Enter Country" required="">
<input type="text" name="mobile" placeholder="Enter Mobile No" required="">
<input type="password" name="sellerusername" placeholder="Enter Username for Seller Login" required="">
<input type="password" name="sellerpassword" placeholder="Enter Password for Seller Login" required="">
<input type="password" name="retypepassword" placeholder="Re-Type Password" required=""><br>


<input type="submit" name="" value="CREATE SELLER"style="margin-bottom:10px;">
</form>
</div>
</body>
</html>