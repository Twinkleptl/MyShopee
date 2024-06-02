<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
	<link rel="stylesheet" type="text/css" href="rightsidecss.css">
</head>
<body>



<div class="box" style="height:400px;width:400px;">
		<h2 style="color:green;">DATE RANGE</h2><br>
		<form action="repprodselling2.php" method="post">
		<p style="color:whitesmoke;">SELECT STARTING DATE:</p><br>
		<input type="date" name="startdate" value="<?php  echo date('Y-m-d') ?>"><br>
		<p style="color:whitesmoke;">SELECT ENDING DATE:</p><br>
		<input type="date" name="enddate" value="<?php  echo date('Y-m-d') ?>">
			<b><input type="submit" value="SHOW REPORT"></b>
		</form>
	</div>

			
	

</body>
</html>