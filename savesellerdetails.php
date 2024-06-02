<?php 
include "connection.inc";

 
    $username = ($_POST['username']);
    $fullname = ($_POST['fullname']);
	$address = ($_POST['address']);
	$city = ($_POST['city']);
	$pincode = ($_POST['pincode']);
	$state = ($_POST['state']);
	$country = ($_POST['country']);
	$mobile = ($_POST['mobile']);
	$qry="update persondetails set username='$username',fullname='$fullname',address='$address',city='$city',pincode='$pincode',state='$state',country='$country',mobile=$mobile where username='$username'";
    $result=$conn->query($qry);
    if($result < 0)
    {
        echo ("<script>alert (\"PERSON DETAILS ARE NOT UPDATED !!!...\"); history.go(-1) </script> ");
		exit();
    }
    else
    {
    	   	echo ("<script LANGUAGE='JavaScript'>
    			window.alert('Person details are updated :: Successfully...');
        		window.open(\"ownermain.php\",\"_top\"); </script>");
    }

?>