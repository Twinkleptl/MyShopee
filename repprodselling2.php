<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
	<style type="text/css">
		@keyframes animate{
			0%{
				 left: 0;
				 top: 0;
			}
			100%{
				 left: 0;
				 top: 0;
			}
		}
	</style>
	 <script>
function myFunction() {
  window.print();
}
</script>
</head>
<link rel="stylesheet" type="text/css" href="rightsidecss.css">
<body>
<?php
  include "connection.inc";
  $shopid=$_COOKIE['SHOPID'];   
  $startdate=$_POST['startdate'];
  $enddate=$_POST['enddate'];
?>
<button onclick="myFunction()"  style="margin-left: 30px;margin-top:30px;">PRINT THIS REPORT</button><br><br><br>
<div class="EntryTableBox">
<table style="padding-left: 30px; padding-top: 30px;">
<tr style="background-color:#562929;color:white;">
 
	<tr><th colspan="3"style="background-color:#562929;color:white; text-align: center;" >  REPORT OF PRODUCT SOLD FROM <?php echo $startdate ?>
		
	TO <?php echo $enddate ?> BY ALL SELLERS</th></tr>
	
	<tr style="background-color:#562929;color:white; text-align: center;">
		<th>PRODUCT ID</th>
		<th>PRODUCT NAME</th>
	    <th>SOLD QUANTITY</th>
	    </tr>
	   <?php
//to get minimum orderid from that date-range
	$qryminorderid = "SELECT min(orderid) from orderdetails$shopid where billdate<='$enddate' and billdate>='$startdate'";
	//echo $qryminorderid;
	$resminorderid= mysqli_query($conn,$qryminorderid);
	$rowminorderid = $resminorderid->fetch_assoc();
	$minorderid = $rowminorderid['min(orderid)'];
	//echo $minorderid;

	//to get maximum orderid from that date-range
	$qrymaxorderid = "SELECT max(orderid) from orderdetails$shopid where billdate<='$enddate' and billdate>='$startdate'";
	//echo $qrymaxorderid;
	$resmaxorderid= mysqli_query($conn,$qrymaxorderid);
	$rowmaxorderid = $resmaxorderid->fetch_assoc();
	$maxorderid = $rowmaxorderid['max(orderid)'];
	//echo $maxorderid;
	

	$qry="select prodname , sum(qty),prodid from orderline2 where orderid>=$minorderid and orderid<=$maxorderid group by prodname order by prodid";
	$result = $conn->query($qry);
  while($row=$result->fetch_assoc())
  {
	echo "<tr><td> {$row['prodid']} </td>";
	echo "<td> {$row['prodname'] }</td>";
	echo "<td> {$row['sum(qty)']} </td>";
 }
print "</table><BR>";



	//Barchart Query1
	$qryChart1="select prodname , sum(qty) from orderline$shopid where orderid>=$minorderid and orderid<=$maxorderid group by prodname order by prodname";
	//echo $qryChart1;
	$resChart1= $conn->query($qryChart1);
	//select prodname , sum(qty),prodid from orderline2 where orderid>=1 and orderid<=5 group by prodname order by prodid
    
?>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
 <script type="text/javascript">

google.charts.load('current', {packages: ['corechart', 'bar']});
google.charts.setOnLoadCallback(drawBasic);

function drawBasic() {

      var data = google.visualization.arrayToDataTable([
        ['', 'SOLD QUANTITY',],
         <?php
         while ($rowchart2=$resChart1->fetch_assoc()) {
            echo "['".$rowchart2['prodname']."',".$rowchart2['sum(qty)']."],";
          }
          ?> 
      ]);

      var options = {
        title: 'PRODUCT SELLING QUANTITY',
        chartArea: {width: '50%'},
       /*chartArea: {groupWidth: '70%'},
        backgroundColor: { fill:'transparent' },
        legendTextStyle: { color: '#FFFFFF' },
        titleTextStyle: { color: '#FFFFFF' },
        bar: { groupWidth: '75%' }
        bar:{ type: 'vertical' }*/
        backgroundColor: { fill:'white' },
        hAxis: {
          title: 'SOLD QUANTITY',
         // titleTextStyle: { color: '#FFFFFF' },
          minValue: 0
        },
        vAxis: {
          title: 'PRODUCT NAME',
          //titleTextStyle: { color: '#FFFFFF' },
        }
       
      };

      var chart = new google.visualization.BarChart(document.getElementById('barchart2'));
      /*$(this).animate({
      },1000);*/
      chart.draw(data, options);
    }
</script>


  <div id="barchart2" style="margin-left: 35px; width: 700px; height: 500px; border: 1px solid #ccc; color: #FFFFFF;box-shadow:0 0 10px 0 yellow;animation:animate 50s linear infinite;"></div>
</body>
</html>