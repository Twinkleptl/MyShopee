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
$qry="select * from shopdetails order by shopid desc";
$result=$conn->query($qry);
//$row = $result->fetch_assoc();
//$shopid=$row['shopid'];
//echo $shopid;

?>


<table style="padding-left: 30px;padding-top:10px;">
<tr>
 <th style="color:white;">Edit...to edit shop users</th></tr>
</table>

<div class="EntryTableBox">
<table style="padding-left: 30px; padding-top: 30px;">
<tr style="background-color: blue;">
	<th> EDIT </th>
	<th> SHOPID </th>
	<th> SHOPNAME </th>
	<th> ADDRESS </th>
	<th> STATE </th>
	<th> CITY </th>
	<th> PINCODE </th>
    <th> MOBILE1 </th>
    <th> MOBILE2 </th>
    <th> GSTNO </th>
</tr>
<?php
	while ( $row = $result->fetch_assoc())
	{
		?>
		<tr><td> <a href="showusers1.php?shopid=<?php echo $row['shopid']; ?>"> 
				 Edit
				 </a></td>
				<td> <?php echo $row['shopid']; ?> </td>
				<td> <?php echo $row['shopname']; ?> </td>
				<td> <?php echo $row['address']; ?> </td>
				<td> <?php echo $row['state']; ?> </td>
				<td> <?php echo $row['city']; ?> </td>
				<td> <?php echo $row['pincode']; ?> </td>
				<td> <?php echo $row['mobile1']; ?> </td>
				<td> <?php echo $row['mobile2']; ?> </td>
				<td> <?php echo $row['gstno']; ?> </td></tr>
		<?php
	}
	?>

</table>
</body>
</html>