<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="rightsidecss.css">
</head>
<body>



    <div class="box">
	<h2>CHANGE PASSWORD</h2>

	<form action="savechangepassword.php" method="post">
	<BR>

	<input type="password" name="cpassword" placeholder="Enter Current Password" required="" >

	<input type="password" name="npassword" placeholder="Enter New Password" required="" >

	<input type="password" name="rpassword" placeholder="Retype New Password" required="" >
	
	<BR><BR>
	<input type="submit" name="submit" value="UPDATE PASSWORD" >
	</form>
</div>

</body>
</html>