
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
	<link rel="stylesheet" type="text/css" href="rightsidecss.css">
</head>
<body>


<?php
include	"connection.inc";
$shopid=$_COOKIE['SHOPID'];

?>
<form action="submitorder3.php" method="post">
<div class="EntryTableBox">
<table style=" padding-top: 30px;padding-left: 30px;">
<tr style="background-color: blue;">
  
	
	<th> PRODNAME </th>
	<th> UNIT-PRICE </th>
	<th> QUANTITY </th>
	<th> ROWPRICE</th>

</tr>

<?php
include	"connection.inc";
$prodname=$_POST['prodname'];
$produprice = $_POST['produprice'];
$orderqty=$_POST['orderqty'];
$amount = $_POST['amount'];
$tbillamt=$_POST['billamt'];
$discount=$_POST['discount'];
$tprods = count($prodname);
$ordprodid=$_POST['ordprodid'];
$finalbillamt=0;

for($i=0; $i<$tprods; $i++)
{

    	$ordname = $prodname[$i];
    	$orduprice = $produprice[$i];
    	$ordertqty = $orderqty[$i];
    	$rowamount=$amount[$i];
    	$orderprodid=$ordprodid[$i];
       
    	print "<tr><td>$ordname</td>
               <td>$orduprice</td>
    				<td>$ordertqty</td>
    				<td>$rowamount</td> </tr>";
    	print "<input type=hidden name=orderprodid[] value=$orderprodid>";
    	print "<input type=hidden name=\"prodname[]\" value=$ordname>";
     	print "<input type=hidden name=\"produprice[]\" value=$orduprice>";
    	print "<input type=hidden name=\"orderqty[]\" value=$ordertqty>";
    	print "<input type=hidden name=\"amount[]\" value=$rowamount>";
    				
}

print "<tr><td colspan=\"5\">Total Bill Amount : $tbillamt</td></tr>";
print "<input type=\"hidden\" name=\"billamt\" value=\"$tbillamt\">";
if(!empty($discount))
{$finalbillamt=$tbillamt-$discount;
	print "<tr><td colspan=\"5\">Discount Amount : $discount </td></tr>";
	print"<tr><td colspan=3>Final Bill Amount : $finalbillamt</td><td> Cash Paid : <input type=text name=cash size=10></td></tr> ";
	
}
else
{  
	print"<tr><td colspan=3>Final Bill Amount : $tbillamt</td><td> Cash Paid : <input type=text name=cash size=10></td></tr> ";}
print "<tr><td colspan=\"3\"><input type=\"button\" name=\"back\" value=\"BACK\" onClick='window.history.go(-1)'></td>";
print "<td colspan=\"2\"><input type=\"submit\" name=\"confirm\" value=\"FINAL CONFIRM ORDER\"></td></tr>";
print "<input type=\"hidden\" name=\"discnt\" value=\"$discount\">";
?>
</table>
</div>
</form>
</body>
</html>