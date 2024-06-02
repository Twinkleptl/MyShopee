<html>
<head>
	<title></title>
</head>
<body>
	<?php
	include ("connection.inc");

	$username=$_COOKIE["USER"];
	$usertype=$_COOKIE["USERTYPE"];
	$cpassword=$_POST['cpassword'];
	$npassword=$_POST['npassword'];
	$rpassword=$_POST['rpassword'];
	

	$qry="SELECT * FROM login WHERE username = '$username' and password='$cpassword'";
	//echo $qry;
	
	$result = $conn->query($qry);
	
	if ($result->num_rows!=1 ) 
	{
	    echo ("<script>alert (\"Your current password and username is WRONG !!!...\"); history.go(-1) </script> ");
		exit();
	}
	else
	{
		
		if($npassword != $rpassword)
		{
			echo ("</script>alert (\"Your current password and re-type password is WRONG !!!...\"); history.go(-1) </script> ");
			exit();
		}
		else
		{
			//Password updation logic
			$query="UPDATE login set password='$npassword' where username='$username'";
 			$result=$conn->query($query);
 			if($result < 0)   {  echo ("Password NOT UPDATED :::: UN-Successful"); }
			else
   			{
   					if($usertype=='admin')
					{
   						echo ("<script LANGUAGE='JavaScript'>
    					window.alert('PASSWORD UPDATED :: Successfully...');
        				window.open(\"adminmain.php\",\"_top\"); </script>");	
    				}
    				else if($usertype=='owner')
    				{
    				    echo ("<script LANGUAGE='JavaScript'>
    					window.alert('PASSWORD UPDATED :: Successfully...');
        				window.open(\"ownermain.php\",\"_top\"); </script>");	
    				}
    				else
    				{
    				    echo ("<script LANGUAGE='JavaScript'>
    					window.alert('PASSWORD UPDATED :: Successfully...');
        				window.open(\"sellermain.php\",\"_top\"); </script>");	
    				}
			}
		}
	}

?>
</body>
</html>