<?php
include "connection.inc";

$qrychart1="select orderid,paidamount from orderdetails2 where username='hemant' and billdate='2022-02-05'";
$reschart= $conn->query($qrychart1);


?>





 <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
 <script type="text/javascript">

google.charts.load('current', {packages: ['corechart', 'bar']});
google.charts.setOnLoadCallback(drawBasic);

function drawBasic() {

      var data = google.visualization.arrayToDataTable([
        ['', '',],
       
         <?php
         while ($rowchart=$reschart->fetch_assoc()) {
            echo "['".$rowchart['orderid']."',".$rowchart['paidamount']."],";
          }
          ?> 
      ]);

      var options = {
        title: 'ORDERWISESELLS',
        chartArea: {width: '50%'},
        backgroundColor: { fill:'transparent' },
        legendTextStyle: { color: '#FFFFFF' },
        titleTextStyle: { color: '#FFFFFF' },
        hAxis: {
          title: 'SELLS AMOUNT',
          titleTextStyle: { color: '#FFFFFF' },
          //minValue: 0
        },
        vAxis: {
          title: 'ORDERID',
          titleTextStyle: { color: '#FFFFFF' }
        }
      };

      var chart = new google.visualization.BarChart(document.getElementById('barchart1'));

      chart.draw(data, options);
    }
</script>

<body style="background-color:yellow;">

  <div id="barchart1" style="margin-left: 35px; width: 700px; height: 500px; border: 1px solid #ccc; color: #FFFFFF;"></div>

  </body>