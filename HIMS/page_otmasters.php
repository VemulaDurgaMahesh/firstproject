<?php
session_start();
$connect = mysql_connect ("localhost","root","") or die();
     mysql_select_db("hospital")or die();
      $output = ''; 

if(isset($_POST['submit']))
{
	if(isset($_POST['t1']))
	{

$str=mysql_query("SELECT * from operation_theater WHERE ot_name like '%".$_POST['t1']."%'");
}
else
{
	$str=mysql_query("SELECT * from operation_theater");
}
echo "<table border='1'>";
	echo "<tr>
	<td>S.no</td>
	<td>OT Code</td>
	<td>OT Name</td>	
	<td>OTT Code</td>
	<td>OTT Name</td>
	<td>Status</td>
	</tr>";
	$i=1;
    while($row = mysql_fetch_array($str)) {
    	$x=$row['ott_code'];
    	$dep=mysql_query("SELECT * FROM operation_theatertype WHERE ott_code='$x'");
    	$dep1=mysql_fetch_array($dep);
    	?>
	<tr>	
	<td><?php echo $i++ ?></td>
	<td><?php  echo $row['ot_code'] ?></td>
	<td><?php  echo $row['ot_name'] ?></td>
	<td><?php  echo $row['ott_code'] ?></td>
	<td><?php  echo $dep1['ott_name'] ?></td>
	<td><?php  echo $row['ot_status'] ?></td></tr>
	
<?php
}
echo "</table>";
}
elseif(isset($_POST["export"]))
{
	if(isset($_POST['t1']))
	{

$str=mysql_query("SELECT * from operation_theater WHERE ot_name like '%".$_POST['t1']."%'");
}
else
{
	$str=mysql_query("SELECT * from operation_theater");
}
$output .='<table class="table" bordered="1">
	<tr>
	<td>S.no</td>
	<td>OT Code</td>
	<td>OT Name</td>	
	<td>OTT Code</td>
	<td>OTT Name</td>
	<td>Status</td>
	</tr>';
	$i=1;
    while($row = mysql_fetch_array($str)) {
    	$x=$row['ott_code'];
    	$dep=mysql_query("SELECT * FROM operation_theatertype WHERE ott_code='$x'");
    	$dep1=mysql_fetch_array($dep);
    	
		$output .='	<tr>
		<td> '.$i++ .'</td>
		<td> '.$row['ot_code'].'</td>		
		<td> '.$row['ot_name'].'</td>
		<td> '.$row['ott_code'].'</td>	
		<td> '.$dep1['ott_name'].'</td>	
		<td> '.$row['ot_status'].'</td></tr>';		

		}
		$output .= '</table>';
			header("Content-Type: application/xls");
			header("Content-Disposition: attachment; filename=ots.xls");
			echo $output;
}

elseif(isset($_POST['print']))
{
	?>
<html>
<head>
<meta charset="UTF-8">
        <title>Doctor | Suraksha Hospital</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <link href="//code.ionicframework.com/ionicons/1.5.2/css/ionicons.min.css" rel="stylesheet" type="text/css" />
        <!-- Morris chart -->
        <link href="css/morris/morris.css" rel="stylesheet" type="text/css" />
        <!-- jvectormap -->
        <link href="css/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="css/AdminLTE.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div class="row no-print">
 <div class="col-xs-12">
 <button class="btn btn-primary-small"  onclick="window.print();"><i class="fa fa-print"></i> Print</button>
 </div>
 </div>
 <br>
<?php
	if(isset($_POST['t1']))
	{

$str=mysql_query("SELECT * from operation_theater WHERE ot_name like '%".$_POST['t1']."%'");
}
else
{
	$str=mysql_query("SELECT * from operation_theater");
}
echo "<center>";
echo "<table border='1'>";
	echo "<tr>
	<td align='center'>S.no</td>	
	<td align='center'>OT Code</td>
	<td align='center'>OT Name</td>	
	<td align='center'>OTT Code</td>
	<td align='center'>OTT Name</td>
	<td align='center'>Status</td>	
	</tr>";
	$i=1;
    while($row = mysql_fetch_array($str)) {
    	$x=$row['ott_code'];
    	$dep=mysql_query("SELECT * FROM operation_theatertype WHERE ott_code='$x'");
    	$dep1=mysql_fetch_array($dep);
    	?>
	<tr>	
	<td align='center'><?php echo $i++ ?></td>
	<td ><?php  echo $row['ot_code'] ?></td>
	<td ><?php  echo $row['ot_name'] ?></td>
	<td ><?php  echo $row['ott_code'] ?></td>
	<td ><?php  echo $dep1['ott_name'] ?></td>
	<td ><?php  echo $row['ot_status'] ?></td>
	</tr>
<?php
}
echo "</table>";
echo "</center>";
?>
</body>
</html>
<?php
}
?>
</body>
</html>
