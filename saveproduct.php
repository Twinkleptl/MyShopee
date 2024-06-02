<?php
$username=$_COOKIE["USER"];
$usertype=$_COOKIE["USERTYPE"];
include "connection.inc";
$qry="select shopid from login where username='$username'";
//echo $qry;
$result=$conn->query($qry);
$row = $result->fetch_assoc();
$shopid = $row['shopid'];
//echo $shopid;
$qry2="select max(prodid) from proditems$shopid";
$result=$conn->query($qry2);
if ($result->num_rows==1) 
	{
	    $row=$result->fetch_assoc();
        $prodid=$row['max(prodid)'];
       	$prodid=$prodid+1;
    }
    else
    	$prodid=1;
//$prodinfo=$prodinfo.$shopid;
$pname=$_POST['pname'];
$pprice=$_POST['pprice'];
$qry3="insert into proditems$shopid values($prodid,'$pname',$pprice,1)";
$result=$conn->query($qry3);
if($result < 0)   {  echo ("Product NOT CREATED :::: UN-Successful"); }

 else
  {
    				    echo ("<script LANGUAGE='JavaScript'>
    					window.alert('PRODUCT CREATED :: Successfully...');
        				window.open(\"ownermain.php\",\"_top\"); </script>");	
   }

?>