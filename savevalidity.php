<?php

include "connection.inc";

$cvalidity=($_POST['cvalidity']);
$validity=($_POST['validity']);
$shopid=($_POST['shopid']);	

$qry="update login set validity='$validity' where shopid=$shopid";
$result=$conn->query($qry);
 if($result < 0)
    {
        echo ("<script>alert (\"SHOP VALIDITY NOT UPDATED !!!...\"); history.go(-1) </script> ");
		exit();
    }
    else
    {
    	   	echo ("<script LANGUAGE='JavaScript'>
    			window.alert('Shop validity is updated :: Successfully...');
        		window.open(\"adminmain.php\",\"_top\"); </script>");
    }
?>