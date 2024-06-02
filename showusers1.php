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
$shopid = intval($_GET['shopid']);

$qry="select * from persondetails,login where persondetails.username=login.username and  persondetails.shopid = $shopid";
$result=$conn->query($qry);


?>
<div class="EntryTableBox">
<table style="padding-left: 30px; padding-top: 30px;">
<tr style="background-color: blue;"><th> EDIT </th>
	<th> SHOPID </th>
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
		<tr><td> <a href="showusers2.php?susername=<?php echo $row['username']; ?>"> 
				 Edit
				 </a></td>
				<td> <?php echo $row['shopid']; ?> </td>
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