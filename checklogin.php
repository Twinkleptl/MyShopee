<?php

include "connection.inc";

$uname = $_POST['username'];
$pass = $_POST['password'];

//echo " $uname <BR> $pass" ;

$qry="SELECT * FROM login WHERE username = '$uname' AND password = '$pass'" ;
//echo $qry;
	
	$result = $conn->query($qry);
	if ($result->num_rows ==1 ) 
	{
	        $row = $result->fetch_assoc();
        
		$validity = $row['validity'];
		
		if($validity < date('Y-m-d'))
		{
			echo ("Your login is expired .... ");
			exit();
		}
		
	    setcookie("USER",$row['username']);   
	    setcookie("USERTYPE",$row['usertype']);
	    setcookie("SHOPID",$row['shopid']);
      

	    //echo ("this is stestjsdljf : " . $_COOKIE['USER']);

    	if($row['usertype']=='admin')
    	   	echo ("<script language=\"javascript\"> window.open(\"adminmain.php\",\"_self\"); </script>");
    
    	
        else if($row['usertype']=='owner')
    	   	echo ("<script language=\"javascript\"> window.open(\"ownermain.php\",\"_self\"); </script>");
        else if($row['usertype']=='seller')
    	   	echo ("<script language=\"javascript\"> window.open(\"sellermain.php\",\"_self\"); </script>");

    	  else 
    		echo "welcome user";


        }		


      
    
?>