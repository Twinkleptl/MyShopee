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
$shopid=$_COOKIE['SHOPID'];


$qry="select distinct shopdetails.shopid,shopname,address,city,login.validity from shopdetails,login where shopdetails.shopid=login.shopid order by shopid";
$result=$conn->query($qry);
//$row = $result->fetch_assoc();
//$shopid=$row['shopid'];
//echo $shopid;

?>
<button onclick="myFunction()" style="margin-left: 30px;margin-top:30px;">Print This Report</button>

<div class="EntryTableBox">
<table  style="padding-left: 30px; padding-top: 30px;">
<tr style="background-color: blue;">
  
	<th> SHOPID </th>
	<th> SHOPNAME </td>
	<td> VALIDITY </th>
	

</tr>
<?php
	while ($row = $result->fetch_assoc())
	{
		?>
		<tr>
				<td> <?php echo $row['shopid']; ?> </td>
				<td> <?php echo $row['shopname']; ?> </td>
				<td> <?php echo $row['validity']; ?> </td>
				
				</tr>
		<?php
	}
	?>

</table>
</div>
</body>
</html>