<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
	<link rel="stylesheet" type="text/css" href="adminrightsidecss.css">
</head>
<body>
	<?php
	include "connection.inc";
	$username=$_COOKIE["USER"];
	?>
	<header>
	<nav class="rightside">
		<ul>
			<li><a href="#">Welcome <?php echo $username;?></a></li>
		</ul>
	</nav>
</header>
	<div class="border">
		
	

</body>
</html>