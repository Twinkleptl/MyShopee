<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
	<link rel="stylesheet" type="text/css" href="rightsidecss.css">
	<script type="application/javascript">
		function isNumberKey(evt)
      	{
         var charCode = (evt.which) ? evt.which : event.keyCode
         if (charCode > 31 && (charCode < 48 ||  > 57))
            return false;

         return true;
      	}

</script>
</head>
<body>

<?php
include "connection.inc";
$shopid=$_COOKIE['SHOPID'];
$qry = "select  * from proditems$shopid where status=1";
$result = $conn->query($qry);
?>
<!--print "<table border=1><tr><th>pid</th><th>pname</th><th>uprice</th><th>Qty</th></tr>";-->
<form action="submitorder1.php" method="post">
<div class="EntryTableBox">
<table  style="padding-left: 30px; padding-top: 30px;">
<tr style="background-color: blue;">
  
	<th> PRODID </th>
	<th> PRODNAME </th>
	<th> UNIT-PRICE </th>
	<th> QUANTITY </th>

</tr>
<?php
while($row=$result->fetch_assoc())
{
	echo "<tr><td> {$row['prodid']} </td>";
	echo "<input type=hidden name=selprodid[] value={$row['prodid']}>";
	echo "<td> {$row['prodname'] }</td>";
	echo "<td> {$row['unitprice']} </td>";
	echo "<td> <input type =text name=selprod[] size=15 autocomplete=off onkeypress=return isNumberKey(event)></td></tr>";
}
print "</table><BR>";

?>
<input type="submit" value="PLACE ORDER" style="margin-left:30px;">
</div>
</form>
</body>
</html>
