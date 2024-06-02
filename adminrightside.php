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
	 $qry="select username from login where usertype='admin'";
	 $result = $conn->query($qry);
     $row = $result->fetch_assoc();
     $username=$row['username'];
	?>
	<header>
	<nav class="rightside">
		<ul>
			<li><a href="#">Welcome <?php echo $username; ?></a></li>
		</ul>
	</nav>
</header>

		
	

</body>
</html>