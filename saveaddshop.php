<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="rightsidecss.css">
</head>
<body>
<?php
    include "connection.inc";
	$username=$_COOKIE["USER"];
	$usertype=$_COOKIE["USERTYPE"];
	
	$qry="select max(shopid) from shopdetails";
	$result = $conn->query($qry);
	if ($result->num_rows==1 ) 
	{
	    $row = $result->fetch_assoc();
        $shopid=$row['max(shopid)'];
       	$shopid=$shopid+1;
    }
    else
    	$shopid=1;
		
    //echo $shopid;
	
	$shopname = ($_POST['shopname']);
	$address = ($_POST['address']);
	$city = ($_POST['city']);
	$pincode = ($_POST['pincode']);
	$state = ($_POST['state']);
	$country = ($_POST['country']);
	$mobile1 = ($_POST['mobile1']);
	$mobile2 = ($_POST['mobile2']);
	$gstno = ($_POST['gstno']);


	//New Shop Creation logic
	$qry1="insert into shopdetails values($shopid,'$shopname','$address','$city',$pincode,'$state','$country',$mobile1,$mobile2,'$gstno')";
	//echo $qry1."<BR>";
	$result1=$conn->query($qry1);

	//creating ProdItems<shopID> table
	$qry2="create table proditems$shopid (prodid varchar(15), prodname varchar(20), unitprice float(10,2), status int(2))";
	//echo $qry2."<BR>";
	$result2=$conn->query($qry2);
	//creating OrderLine<shopID> table
	$qry3="create table orderline$shopid (orderid bigint(10), prodid varchar(15), prodname varchar(20), qty int(6), unitprice float(10,2))";
	//echo $qry3."<BR>";
	$result3=$conn->query($qry3);
    //creating OrderDetails<shopID> table
	$qry4="create table orderdetails$shopid (username varchar(20), orderid bigint(10), billdate date, billamount float(10,2), discount float(10,2), paidamount float(10,2), paidby varchar(15), paystatus varchar(8))";
	//echo $qry3."<BR>";
	$result4=$conn->query($qry4);
	
	
 	if($result1 < 0 || $result2 < 0 || $result3 < 0 || $result4 < 0 )   
 		{  
 			echo"SHOP NOT CREATED...";
 		 }
	else
   		{ 
   			echo ("<script LANGUAGE='JavaScript'>
    		window.alert('SHOP CREATED :: Successfully...');
        	window.open(\"adminmain.php\",\"_top\"); </script>");
   		}
 	
?>
</body>
</html>