
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
	<link rel="stylesheet" type="text/css" href="rightsidecss.css">
  <script>
function myFunction() {
  window.print();
}
</script>
</head>
<body>


<?php
include	"connection.inc";
$shopid=$_COOKIE['SHOPID'];
$username=$_COOKIE["USER"];
 $usertype=$_COOKIE["USERTYPE"];
//to get next orderid
  $qry1="select max(orderid) from orderdetails$shopid";
  //echo $qry;
  $result1= $conn->query($qry1);
  if ($result1->num_rows ==1 ) 
  {
      $row1 = $result1->fetch_assoc();
      $orderid = $row1['max(orderid)'] + 1;
  }
  else
    $orderid=1;
  //echo "Orderid : $orderid";  


$qry  = "select * from shopdetails where shopid=$shopid";
$result = $conn->query($qry);
$row=$result->fetch_assoc();

?>
<form action="placeorder.php" method="post">
<div class="EntryTableBox">
<table style=" padding-top: 30px;padding-left: 30px;">
<tr><td style="text-align: center;" colspan="4" ><?php  echo $row['shopname']; ?></td></tr>
<tr><td style="text-align: center;" colspan="4"><?php  echo $row['address']; ?></td></tr>
<tr><td style="text-align: center;"  colspan="4"><?php  echo $row['city']; ?></td></tr>
<?php print"<tr style=\"text-align: center\"><td colspan=5 style=\"text-align: center\"> 
        Order NO: $orderid , (seller:$username)</td></TR>";?>

<tr style="background-color: blue;">
  
	
	<th> PRODNAME </th>
	<th> UNIT-PRICE </th>
	<th> QUANTITY </th>
	<th> AMOUNT</th>

</tr>

<?php
include	"connection.inc";



$cash=$_POST['cash'];
$prodname=$_POST['prodname'];
$produprice = $_POST['produprice'];
$orderqty=$_POST['orderqty'];
$amount = $_POST['amount'];
$billamt=$_POST['billamt'];
$discnt=$_POST['discnt'];
$ordrprodid=$_POST['orderprodid'];
$tprods = count($prodname);
$total=0;
for($i=0; $i<$tprods; $i++)
{

    	$ordname = $prodname[$i];
    	$orduprice = $produprice[$i];
    	$ordertqty = $orderqty[$i];
    	$rowamount=$amount[$i];
      $cordprodid=$ordrprodid[$i];
     // echo $cordprodid;
    	print "<tr><td>$ordname</td>
               <td>$orduprice</td>
    				<td>$ordertqty</td>
    				<td>$rowamount</td> </tr>";

      $qry2="insert into orderline$shopid values($orderid,$cordprodid,'$ordname',$ordertqty,$orduprice)";
     //echo $qry2."<BR>";
     $result2=$conn->query($qry2);
    
    				
}

print "<tr><td colspan=\"5\">Total Bill Amount : $billamt</td></tr>";
if(is_numeric($discnt))
{
 $total=$billamt-$discnt;
  print"<tr><td colspan=4> Discount : $discnt</td></tr>";
  if(!empty($cash)){
  print"<tr><td colspan=4>Final Payable Bill Amount :$total </td></tr><tr><td colspan=4>Cash Paid = $cash</td></tr>";
 $paid=$cash-$total;
 $paidby="cash";
 print"<tr><td colspan=4>Change = $paid</td></tr> ";}
else{
  print"<tr><td colspan=4>Final Payable Bill Amount :$total </td></tr><tr><td colspan=4>Paid by another method</td></tr> ";
  $paidby="other";}
}
else
{
$discnt=0; $total=$billamt-$discnt;

 if(!empty($cash)){
  print"<tr><td colspan=4>Final Payable Bill Amount :$total </td></tr><tr><td colspan=4>Cash Paid = $cash</td></tr>";
 $paid=$cash-$total; 
 $paidby="cash";
 print"<tr><td colspan=4>Change = $paid</td></tr> ";}
else{
  print"<tr><td colspan=4>Final Payable Bill Amount :$total </td></tr><tr><td colspan=4>Paid by another method</td></tr> ";
  $paidby="other";}
}

print "<tr><td colspan=\"3\"><button onclick=\"myFunction()\">PRINT BILL</button></td>";
print "<td colspan=\"2\"><input type=\"submit\" name=\"confirm\" value=\"HOME : FOR NEXT ORDER\"></td></tr>";
$paystatus="paid";
$billdate =  date("Y-m-d");


$qry3="insert into orderdetails$shopid values('$username',$orderid,'$billdate',$billamt,$discnt,$total,'$paidby','$paystatus')";
          //echo $qry2."<BR>";
$result3=$conn->query($qry3); 

?>
</table>
</div>
</form>
</body>
</html>