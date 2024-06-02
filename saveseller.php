<?php
include "connection.inc";
$username=$_COOKIE["USER"];
$usertype=$_COOKIE["USERTYPE"];

$qry="select shopid,validity from login where username='$username' and usertype='owner'";

	$result = $conn->query($qry);
	if ($result->num_rows==1 ) 
	{

	    $row = $result->fetch_assoc();
        $shopid=$row['shopid'];
        $validity=$row['validity'];
    }


$fullname=($_POST['fullname']);
$address=($_POST['address']);
$city=($_POST['city']);
$pincode=($_POST['pincode']);
$state=($_POST['state']);
$country=($_POST['country']);
$mobile=($_POST['mobile']);
$sellerusername=($_POST['sellerusername']);
$sellerpassword=($_POST['sellerpassword']);
$retypepassword=($_POST['retypepassword']);

/*echo $shopname ."<BR>";
echo $fullname ."<BR>";
echo $address ."<BR>";
echo $city ."<BR>";
echo $pincode ."<BR>";
echo $state ."<BR>";
echo $country ."<BR>";
echo $mobile ."<BR>";
echo $ownerusername ."<BR>";
echo $ownerpassword ."<BR>";
echo $retypepassword ."<BR>";*/


    //echo $shopid. "<BR>";

    //checking for password matching...
    if($sellerpassword != $retypepassword)
    {
        echo ("<script>alert (\"Your current and re-type password is not match !!!...\"); history.go(-1) </script> ");
		exit();
    }

    //checking for owner is already present or not...Because only one owner is allow
    /*$qry="select username from login where usertype='owner' and shopid=$shopid";

	$result = $conn->query($qry);
	if ($result->num_rows==1 ) 
	{
	     echo ("<script>alert (\"Owner is already exist for this shop !!!...\"); history.go(-1) </script> ");
		exit();
    }*/
   
    //checking for username available or not...
    $qry="select * from login where username='$sellerusername'";
	$result = $conn->query($qry);
	if ($result->num_rows==1 ) 
	{
	     echo ("<script>alert (\"Your username is already available!!!...\"); history.go(-1) </script> ");
		exit();
    }

    //Now Creating seller's entry in persondetails and login tables...
    //Entry in persondetails table
	$qry1="insert into persondetails values($shopid,'$sellerusername','$fullname','$address','$city',$pincode,'$state','$country',$mobile)";
	//echo $qry1."<BR>";
	$result1=$conn->query($qry1);

	//Entry in login table
	$qry2="insert into login values('$sellerusername','$sellerpassword','seller','$validity',$shopid)";
	//echo $qry2."<BR>";
	$result2=$conn->query($qry2);

 	if($result1 < 0 || $result2 < 0 )   
 		{  echo ("Shop Seller is NOT-Created :::: UN-Successful"); }
	else
   		{ 
   			 
    	echo ("<script LANGUAGE='JavaScript'>
    			window.alert('Shop Seller is Created :: Successfully...');
        		window.open(\"ownermain.php\",\"_top\"); </script>");
   		}

?>