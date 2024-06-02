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
<table  style=" padding-top: 30px;padding-left: 30px;">
<tr style="background-color: blue;">
  
	
	<th> PRODNAME </th>
	<th> UNIT-PRICE </th>
	<th> QUANTITY </th>
	<th> ROWPRICE</th>

</tr>

<?php
$totalbillamount= 0;
$selprod=$_POST['selprod'];
$selprodid = $_POST['selprodid'];

$pcount = count($selprod);


for($i=0; $i<$pcount; $i++)
{

    if(!empty($selprod[$i]))
    {
    	$orderqty = $selprod[$i];
    	$orderprodid = $selprodid[$i];

    	$qry="select prodname,unitprice from proditems$shopid where prodid=$orderprodid";
    	$result1=$conn->query($qry);
    	$row1=$result1->fetch_assoc();

    	$orderprodname=$row1['prodname'];
    	$orderunitprice=$row1['unitprice'];
    	$amount = $orderqty * $orderunitprice;
    	$totalbillamount = $totalbillamount + $amount ;

    	print "<tr><td>$orderprodname</td>
               <td>$orderunitprice</td>
    				<td>$orderqty</td>
    				<td>$amount</td> </tr>";
    				print "<input type=hidden name=ordprodid[] value=$orderprodid>";
    				print "<input type=hidden name=\"prodname[]\" value=$orderprodname>";
     				print "<input type=hidden name=\"produprice[]\" value=$orderunitprice>";
    				print "<input type=hidden name=\"orderqty[]\" value=$orderqty>";
    				print "<input type=hidden name=\"amount[]\" value=$amount>";
    				
    }


}

print "<tr><td colspan=\"5\">Total Bill Amount : $totalbillamount</td></tr>";
print "<input type=\"hidden\" name=\"billamt\" value=\"$totalbillamount\">";
print "<tr><td colspan=\"5\">Discount Amount : <input type=\"text\" name=\"discount\" autocomplete=\"off\" size=10 onkeypress=\"return  isNumberKey(event)\"></td></tr>";
print "<tr><td colspan=\"3\"><input type=\"button\" name=\"back\" value=\"BACK\" onClick='window.history.go(-1)'></td>";
print "<td colspan=\"2\"><input type=\"submit\" name=\"confirm\" value=\"CONFIRM ORDER\"></td></tr>";
?>
</table>
</div>
</form>
</body>
</html>