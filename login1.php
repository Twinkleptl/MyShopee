<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Login Form</title>

	<link rel="stylesheet" type="text/css" href="rightsidecss.css">
    
</head>
<body>
	<header>
		<nav>
			<b><h1 style=" font-size:26px;">MYSHOPEE</h1></b>
			<ul> <li><a href="Project.php"> HOME </a></li>
				 <li><a href="about.php">ABOUT</a></li>
				 <li><a href="login1.php">LOGIN</a></li>
			</ul>
		</nav>
	</header>
	<div class="divider">
    <div class="box" style="margin-top:80px; height:480px;">
    	    <form action="checklogin.php" method="post" >    	
    	    <br><b><h1 style="text-align:center;color:green;">LOGIN FORM</h1></b><br><br><br>
    	    
    	    <input type="text" name="username" placeholder="Enter User Name" style="text-align: center;"><br>
    	  
    	    <input type="password" name="password" placeholder="Enter Password" required="" style="text-align: center;"><br>
    	    <input type="submit"  value="LOGIN" style="margin-top:35px;"><br>
    	    </form>

    </div>

</body>
</html>