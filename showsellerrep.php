<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
<link rel="stylesheet" type="text/css" href="rightsidecss.css">
</head>

<script>
function myFunction() {
  window.print();
}
</script>
<body>

<?php

include "connection.inc";

$username=$_COOKIE['USER'];
$usertype=$_COOKIE['USERTYPE'];
$shopid=$_COOKIE['SHOPID'];

$qry="select * from login,persondetails where login.username = persondetails.username and login.usertype='seller' and persondetails.shopid=$shopid";
$result=$conn->query($qry);
//$row = $result->fetch_assoc();
//$shopid=$row['shopid'];
//echo $shopid;

?>

<button onclick="myFunction()" style="margin-left: 30px;margin-top:30px;">Print This Report</button>
<div class="EntryTableBox">
<table style="padding-left: 30px; padding-top: 30px;">
<tr style="background-color: blue;">
	
	<th> USERNAME </th>
	<th> FULLNAME </th>
	<th> USER-TYPE </th>
	<th> ADDRESS </th>
	<th> CITY </th>
	<th> PINCODE </th>
    <th> MOBILE </th>
 
</tr>
<?php
	while ( $row = $result->fetch_assoc())
	{
		?>
		<tr>
				
				<td> <?php echo $row['username']; ?> </td>
				<td> <?php echo $row['fullname']; ?> </td>
				<td> <?php echo $row['usertype']; ?> </td>
				<td> <?php echo $row['address']; ?> </td>
				<td> <?php echo $row['city']; ?> </td>
				<td> <?php echo $row['pincode']; ?> </td>
				<td> <?php echo $row['mobile']; ?> </td></tr>
		
		<?php
	}
	?>
	
</table>
</div>
</body>
</html>