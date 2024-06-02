<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
	<link rel="stylesheet" type="text/css" href="rightsidecss.css">
</head>
<body>



<div class="box" style="height:280px;">
		<h2 style="color:green;">DAILY REPORT</h2><br>
		<form action="dailyrep2.php" method="post">
		
		<p style="color:whitesmoke;">SELECT DATE:</p><br>
		<input type="date" name="dayrep" value="<?php  echo date('Y-m-d') ?>">
			<b><input type="submit" value="SHOW REPORT"></b>
		</form>
	</div>

			
	

</body>
</html>