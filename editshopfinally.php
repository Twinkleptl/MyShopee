<?php 
include "connection.inc";

    $shopid = ($_POST['shopid']);
    $shopname = ($_POST['shopname']);
	$address = ($_POST['address']);
	$city = ($_POST['city']);
	$pincode = ($_POST['pincode']);
	$state = ($_POST['state']);
	$country = ($_POST['country']);
	$mobile1 = ($_POST['mobile1']);
	$mobile2 = ($_POST['mobile2']);
	$gstno = ($_POST['gstno']);
	$qry="update shopdetails set shopid=$shopid,shopname='$shopname',address='$address',city='$city',pincode='$pincode',state='$state',country='$country',mobile1=$mobile1,mobile2=$mobile2 where shopid=$shopid";
    $result=$conn->query($qry);
    if($result < 0)
    {
        echo ("<script>alert (\"SHOP DETAILS ARE NOT UPDATED !!!...\"); history.go(-1) </script> ");
		exit();
    }
    else
    {
    	   	echo ("<script LANGUAGE='JavaScript'>
    			window.alert('Shop details are updated :: Successfully...');
        		window.open(\"adminmain.php\",\"_top\"); </script>");
    }

?>