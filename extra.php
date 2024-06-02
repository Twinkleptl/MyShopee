<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
	<link rel="stylesheet" type="text/css" href="rightsidecss.css">
</head>
<script type="application/javascript">
		function isNumberKey(evt)
      	{
         var charCode = (evt.which) ? evt.which : event.keyCode
         if (charCode > 31 && (charCode < 48 ||  > 57))
            return false;

         return true;
      	}

</script>
<body>
<?php
include	"connection.inc";
$shopid=$_COOKIE['SHOPID'];
$qry  = "select max(prodid) from proditems$shopid";
$result = $conn->query($qry);

$row=$result->fetch_assoc();
$tprods = $row['max(prodid)'];

//print "totral  :  : :  $tprods <BR>	";
?>
<form action="submitorder2.php" method="post">
<div class="EntryTableBox">
<table border="1" style="padding-left: 30px; padding-top: 30px;">
<tr style="background-color: blue;">
  
	<th> PRODID </th>
	<th> PRODNAME </th>
	<th> UNIT-PRICE </th>
	<th> QUANTITY </th>
	<th> ROWPRICE</th>

</tr>

<?php
$totalbillamount= 0;


for($i=0;$i<$tprods;$i++)
{
	//echo $i;
	if(!empty($_POST['selprod'][$i]))
	{

		$orqty= $_POST['selprod'][$i];
		$orprodid = $i+1;
       // echo $orprodid;
		$qry1 ="select prodname, unitprice from proditems$shopid where prodid=$orprodid";
		//echo $qry1;
		$result1 = $conn->query($qry1);
		$row1=$result1->fetch_assoc();
		$orunitprice = $row1['unitprice'];
		$orprodname = $row1['prodname'];

		if(is_numeric($orqty))
			{	$rowprice = $orqty	* $orunitprice	;
				$totalbillamount = $totalbillamount + $rowprice	;
				//print "$orprodid :: $orprodname	:: $orunitprice	 :: $orqty :: $rowprice	<BR>"; 
				print "<tr><td>{$orprodid} </td>";
	            print "<td>{$orprodname}</td>";
	            echo "<td>{$orunitprice} </td>";
	            echo "<td>{$orqty}</td>";
	            echo "<td>{$rowprice}</td></tr>";
			}	
	}
}
print "<tr><td colspan=\"5\">Total Bill Amount : {$totalbillamount}</td></tr>";print "<input type=\"hidden\" name=\"billamt\" value=\"{$totalbillamount}\">";
print "<tr><td colspan=\"5\">Discount Amount : <input type=\"text\" name=\"Discount\" autocomplete=\"off\" size=10 onkeypress=\"return  isNumberKey(event)\"></td></tr>";
print "<tr><td colspan=\"3\"><input type=\"button\" name=\"back\" value=\"BACK\" onClick='window.history.go(-1)'></td>";
print "<td colspan=\"2\"><input type=\"submit\" name=\"confirm\" value=\"CONFIRM ORDER\"></td></tr>";
?>
</table>
</div>
</form>
</body>
</html>