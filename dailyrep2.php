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


include "connection.inc";

$shopid=$_COOKIE['SHOPID'];
$username=$_COOKIE["USER"];
$usertype=$_COOKIE["USERTYPE"];
$billdate=$_POST['dayrep'];


$qry1="SELECT count(*), sum(billamount),sum(discount),sum(paidamount) from orderdetails$shopid WHERE username='$username' and billdate ='$billdate' GROUP by billdate";
  //echo $qry;
  $result1= $conn->query($qry1);
  $row=$result1->fetch_assoc();

$qry2="select sum(paidamount) from orderdetails$shopid WHERE username='$username' and billdate ='$billdate' and paidby='cash' GROUP by billdate";
  //echo $qry;
  $result2= $conn->query($qry2);
  $row2=$result2->fetch_assoc();
$qry3="SELECT sum(paidamount) from orderdetails$shopid WHERE username='$username' and billdate ='$billdate' and paidby='other' GROUP by billdate";
  //echo $qry;
  $result3= $conn->query($qry3);
  $row3=$result3->fetch_assoc();
?>
<button onclick="myFunction()"  style="margin-left: 30px;margin-top:30px;">PRINT THIS REPORT</button>
<div class="EntryTableBox">
<table style="padding-left: 30px; padding-top: 30px;">
<tr style="background-color:#562929;color:white;">
  
	<th colspan="6"style="background-color:#562929;color:white; text-align: center;" > REPORT OF <?php echo $billdate;?></th></tr>
	<tr><th colspan="6"style="background-color:#562929;color:white; text-align: center;" > TOTAL REPORT OF SELLER:<?php echo $username?></th></tr>
	
	<tr style="background-color:#562929;color:white; text-align: center;">
		<th> ORDERS</th>
		<th>BILL AMOUNTS</th>
	    <th>DISCOUNTS</th>
	    <th>PAYABLE AMOUNTS</th>
	    <th>CASH PAID</th>
	    <th>OTHERLY PAID</th></tr>
	
<td><?php echo $row['count(*)'];?></td>
<td><?php echo $row['sum(billamount)'];?></td>
<td><?php echo $row['sum(discount)'];?></td>
<td><?php echo $row['sum(paidamount)'];?></td>
<td><?php echo $row2['sum(paidamount)'];?></td>
<?php if($row3['sum(paidamount)']==NULL){?>
	<td>0</td><?php } else{ ?>
<td><?php echo $row3['sum(paidamount)'];?></td>
</tr><?php }?>
</table>
</div>
<div class="EntryTableBox">
<table style="padding-left: 30px; padding-top: 30px;">
<tr>
  
	<th colspan="6"style="background-color:#562929;color:white; text-align: center;" > INDIVIDUAL ORDERS OF <?php echo $billdate;?> OF SELLER
		<?php echo $username;?></th></tr>
	
	<tr style="background-color:#562929;color:white; text-align: center;">
		<th>ORDERID</th>
		<th>BILL AMOUNT</th>
	    <th>DISCOUNT</th>
	    <th>PAYABLE AMOUNT</th>
	    <th>PAIDBY</th>
	    <th>PAYSTATUS</th></tr>

	<?php
  $qry4="SELECT orderid,billamount,discount,paidamount,paidby,paystatus from orderdetails$shopid where billdate='$billdate' and username='$username' order by orderid ";
  //echo $qry;
  $result4= $conn->query($qry4);   

    while($row4=$result4->fetch_assoc())
    {
	echo "<tr><td> {$row4['orderid']}  </td>";
	echo "<td> {$row4['billamount']}  </td>";
	echo "<td>{$row4['discount']}</td>";
	echo "<td> {$row4['paidamount']}</td>";
	echo "<td>{$row4['paidby']}</td>";
	echo "<td>{$row4['paystatus']}</td></tr>";
    }
	    ?>
</table>
</div>
<br>
<br>
<br>
<br>
<?php
include "connection.inc";

$qrychart1="select orderid,paidamount from orderdetails$shopid where username='$username' and billdate='$billdate'";
$reschart= $conn->query($qrychart1);


?>





 <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
 <script type="text/javascript">

google.charts.load('current', {packages: ['corechart', 'bar']});
google.charts.setOnLoadCallback(drawBasic);

function drawBasic() {

      var data = google.visualization.arrayToDataTable([
        ['', 'PaidAmount',],
         <?php
         while ($rowchart=$reschart->fetch_assoc()) {
            echo "['".$rowchart['orderid']."',".$rowchart['paidamount']."],";
          }
          ?> 
      ]);

      var options = {
        title: 'ORDERWISESELLS',
        chartArea: {width: '50%'},
       /*chartArea: {groupWidth: '70%'},
        backgroundColor: { fill:'transparent' },
        legendTextStyle: { color: '#FFFFFF' },
        titleTextStyle: { color: '#FFFFFF' },
        bar: { groupWidth: '75%' }
        bar:{ type: 'vertical' }*/
        backgroundColor: { fill:'white' },
        hAxis: {
          title: 'SELLS AMOUNT',
         // titleTextStyle: { color: '#FFFFFF' },
          minValue: 0
        },
        vAxis: {
          title: 'ORDERID',
          //titleTextStyle: { color: '#FFFFFF' },
        }
       
      };

      var chart = new google.visualization.BarChart(document.getElementById('barchart1'));

      chart.draw(data, options);
    }
</script>


  <div id="barchart1" style="margin-left: 35px; width: 700px; height: 500px; border: 1px solid #ccc; color: #FFFFFF;box-shadow:0 0 10px 0 yellow;"></div>
</body>
</html>