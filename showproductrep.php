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


$qry="select * from proditems$shopid order by prodid";
$result=$conn->query($qry);
//$row = $result->fetch_assoc();
//$shopid=$row['shopid'];
//echo $shopid;

?>
<button onclick="myFunction()" style="margin-left: 30px;margin-top:30px;">Print This Report</button>
<div class="EntryTableBox">
<table  style="padding-left: 30px; padding-top: 30px;">
<tr style="background-color: blue;">
  
	<th> PRODID </th>
	<th> PRODNAME </th>
	<td> UNIT-PRICE </th>
	<th> STATUS </th>

</tr>
<?php
	while ($row = $result->fetch_assoc())
	{
		?>
		<tr>
				<td> <?php echo $row['prodid']; ?> </td>
				<td> <?php echo $row['prodname']; ?> </td>
				<td> <?php echo $row['unitprice']; ?> </td>
				<td> <?php echo $row['status']; ?> </td>
				</tr>
		<?php
	}
	?>

</table>
</div>
</body>
</html>