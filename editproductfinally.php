<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
	<link rel="stylesheet" type="text/css" href="rightsidecss.css">
</head>
<body>


<?php
include "connection.inc";
$username=$_COOKIE['USER'];
$usertype=$_COOKIE['USERTYPE'];
$shopid=$_COOKIE['SHOPID'];

$prodid=$_POST['prodid'];
$prodname=$_POST['prodname'];
$productprice=$_POST['productprice'];
$status=$_POST['status'];

$qry="update proditems$shopid set prodname='$prodname',unitprice=$productprice,status=$status where prodid=$prodid";
$result=$conn->query($qry);
 if($result < 0)
    {
        echo ("<script>alert (\"PRODUCT DETAILS ARE NOT UPDATED !!!...\"); history.go(-1) </script> ");
		exit();
    }
    else
    {
    	   	echo ("<script LANGUAGE='JavaScript'>
    			window.alert('Product details are updated :: Successfully...');
        		window.open(\"ownermain.php\",\"_top\"); </script>");
    }
?>

			
	

</body>
</html>