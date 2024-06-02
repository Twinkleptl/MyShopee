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
$cusername=$_COOKIE["USER"];
$usertype=$_COOKIE["USERTYPE"];
$option=$_POST['selshop'];
$startdate=$_POST['startdate'];
$enddate=$_POST['enddate'];

$qry1="select count(orderid),billdate, sum(billamount), sum(discount), sum(paidamount) from orderdetails$shopid where billdate>='$startdate' and billdate<='$enddate' and username='$option' group by billdate";
 // echo $qry1;

 

?>
<div class="EntryTableBox">
<table style="padding-left: 30px; padding-top: 30px;">
<tr style="background-color:#562929;color:white;">
  
	<th colspan="7"style="background-color:#562929;color:white; text-align: center;" > REPORT OF <?php echo $startdate;?> TO <?php echo $enddate;?></th></tr>
	<tr><th colspan="7"style="background-color:#562929;color:white; text-align: center;" > TOTAL ORDERS (DAYWISE) REPORT OF SELLER:<?php echo $option?></th></tr>
	
	<tr style="background-color:#562929;color:white; text-align: center;">
		<th> ORDERS</th>
		<th> BILLDATE</th>
		<th>BILL AMOUNTS</th>
	    <th>DISCOUNTS</th>
	    <th>PAYABLE AMOUNTS</th>
	    <th>CASH PAID</th>
	    <th>OTHERLY PAID</th></tr>

 <?php 
$result= $conn->query($qry1);
while($row=$result->fetch_assoc())
{
print"<tr><td> {$row['count(orderid)']}</td>";
print"<td>  {$row['billdate']}</td>";
$rowbilldate=$row['billdate'];
print"<td> {$row['sum(billamount)']}</td>";
print"<td> {$row['sum(discount)']}</td>";
print"<td>  {$row['sum(paidamount)']}</td>";
$qry2="select sum(paidamount) from orderdetails$shopid where billdate='$rowbilldate' and paidby='cash' and username='$option'";
$result2= $conn->query($qry2);
$row2=$result2->fetch_assoc();
print"<td> {$row2['sum(paidamount)']}</td>";
$qry3="select sum(paidamount) from orderdetails$shopid where billdate='$rowbilldate' and paidby='other' and username='$option'";
$result3= $conn->query($qry3);
$row3=$result3->fetch_assoc();
print"<td> {$row3['sum(paidamount)']}</td>";

}?>

<?php
include "connection.inc";

$qrychart1="select billdate,sum(paidamount) from orderdetails$shopid where username='$option' and billdate>='$startdate' and billdate<='$enddate' group by billdate";
$reschart= $conn->query($qrychart1);


?>
<button onclick="myFunction()"  style="margin-left: 30px;margin-top:30px;">PRINT THIS REPORT</button>
<br>
<br>
<br>
 <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
 <script type="text/javascript">

google.charts.load('current', {packages: ['corechart', 'bar']});
google.charts.setOnLoadCallback(drawBasic);

function drawBasic() {

      var data = google.visualization.arrayToDataTable([
        ['', 'SumOfPaidAmount',],
         <?php
         while ($rowchart=$reschart->fetch_assoc()) {
            echo "['".$rowchart['billdate']."',".$rowchart['sum(paidamount)']."],";
          }
          ?> 
      ]);

      var options = {
        title: 'DATE WISE INCOME REPORT',
        chartArea: {width: '50%'},
       /* chartArea: {groupWidth: '70%'},
        backgroundColor: { fill:'transparent' },
        legendTextStyle: { color: '#FFFFFF' },
        titleTextStyle: { color: '#FFFFFF' },
        bar: { groupWidth: '75%' }
        bar:{ type: 'vertical' }*/
        backgroundColor: { fill:'#FFFFFF' },
 
        hAxis: {
          title: 'INCOME AMOUNT',
          //titleTextStyle: { color: '#FFFFFF' },
          minValue: 0
        },
        vAxis: {
          title: 'BILL DATE',
         // titleTextStyle: { color: '#FFFFFF' },
        }
       
      };

      var chart = new google.visualization.BarChart(document.getElementById('barchart1'));

      chart.draw(data, options);
    }
</script>


  <div id="barchart1" style="margin-left: 35px; width: 700px; height: 500px; border: 1px solid #ccc; color: #FFFFFF;box-shadow:0 0 10px 0 yellow;"></div>


<div class="EntryTableBox">
<table style="padding-left: 30px; padding-top: 30px;">
<tr>
  
	<th colspan="7"style="background-color:#562929;color:white; text-align: center;" > INDIVIDUAL ORDERS OF DAYWISE OF <?php echo $startdate;?> TO <?php echo $enddate;?> SELLER <?php echo $option;?></th></tr>
	
	<tr style="background-color:#562929;color:white; text-align: center;">
		<th>ORDERID</th>
		<th>BILLDATE</th>
		<th>BILL AMOUNT</th>
	    <th>DISCOUNT</th>
	    <th>PAYABLE AMOUNT</th>
	    <th>PAIDBY</th>
	    <th>PAYSTATUS</th></tr>
<?php
$qry4="SELECT orderid,billdate,billamount,discount,paidamount,paidby,paystatus from orderdetails$shopid where billdate>='$startdate' and billdate<='$enddate'and username='$option' order by orderid ";
  //echo $qry;
  $result4= $conn->query($qry4);   

    while($row4=$result4->fetch_assoc())
    {
	echo "<tr><td> {$row4['orderid']}  </td>";
	echo "<td> {$row4['billdate']}</td>";
	echo "<td> {$row4['billamount']}  </td>";
	echo "<td>{$row4['discount']}</td>";
	echo "<td> {$row4['paidamount']}</td>";
	echo "<td>{$row4['paidby']}</td>";
	echo "<td>{$row4['paystatus']}</td></tr>";
    }


?>
</table>
</div>
<br><br><br>
<?php
include "connection.inc";

$qrychart2="select orderid,paidamount from orderdetails$shopid where username='$option' and billdate>='$startdate' and billdate<='$enddate'";
$reschart2= $conn->query($qrychart2);


?>





 <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
 <script type="text/javascript">

google.charts.load('current', {packages: ['corechart', 'bar']});
google.charts.setOnLoadCallback(drawBasic);

function drawBasic() {

      var data = google.visualization.arrayToDataTable([
        ['', 'PaidAmount',],
         <?php
         while ($rowchart2=$reschart2->fetch_assoc()) {
            echo "['".$rowchart2['orderid']."',".$rowchart2['paidamount']."],";
          }
          ?> 
      ]);

      var options = {
        title: 'ORDER&DATEWISESELLS',
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

      var chart = new google.visualization.BarChart(document.getElementById('barchart2'));

      chart.draw(data, options);
    }
</script>


  <div id="barchart2" style="margin-left: 35px; width: 700px; height: 500px; border: 1px solid #ccc; color: #FFFFFF;box-shadow:0 0 10px 0 yellow;"></div>

</body>
</html>