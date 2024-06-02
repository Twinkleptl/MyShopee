<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
	<link rel="stylesheet" type="text/css" href="rightsidecss.css">
</head>
<body>
<?php
include "connection.inc";
$usertype=$_COOKIE['USERTYPE'];
$shopid=$_COOKIE['SHOPID'];
$option="";

$qry = "select username from login where shopid=$shopid and usertype='seller' ";
if($result=$conn->query($qry))
{
	foreach($result as $row)
	{
			$temp=$row['username'];
			$option = $option . "<option value=\"$temp\"> $temp </option>";
	}	
}


?>


<div class="box" style="height:450px;width:400px;">
		<h2 style="color:green;">DATE RANGE</h2><br>
		<form action="repselling2.php" method="post">
		<p style="color:whitesmoke;">SELECT SELLER:</p><br>
		<select name="selshop"style="width: 80%;">
	    <?php echo $option; ?>
        </select>  <br><br>
		<p style="color:whitesmoke;">SELECT STARTING DATE:</p><br>
		<input type="date" name="startdate" value="<?php  echo date('Y-m-d') ?>"><br>
		<p style="color:whitesmoke;">SELECT ENDING DATE:</p><br>
		<input type="date" name="enddate" value="<?php  echo date('Y-m-d') ?>">
			<b><input type="submit" value="SHOW REPORT"></b>
		</form>
	</div>

			
	

</body>
</html>