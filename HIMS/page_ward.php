<?php
session_start();
$connect = mysql_connect ("localhost","root","") or die();
     mysql_select_db("hospital")or die();
      $output = ''; 

if(isset($_POST['submit']))
{
if(isset($_POST['t1']))
	{
$str=mysql_query("SELECT * from ward_master WHERE WARD_NAME like '%".$_POST['t1']."%'");
}
else
{
	$str=mysql_query("SELECT * from ward_master");
}
echo "<table border='1'>";
	echo "<tr>
	<td>S.no</td>
	<td>Ward Code</td>
	<td>Ward Name</td>
	<td>Category Code</td>
	<td>Category Name</td>
	<td>Tariff Code</td>
	<td>Tariff Name</td>
	<td>Ward Status</td>	
	</tr>";
	$i=1;
    while($row = mysql_fetch_array($str)) {
    	$x=$row['WARD_TARIFF'];
    	$y=$row['WARD_GRPCODE'];
    	$dep=mysql_query("SELECT * FROM tariff_master WHERE tariff_code='$x'");
    	$dep1=mysql_fetch_array($dep);
    	$wg=mysql_query("SELECT * FROM wardgrop_master WHERE WARDGRP_CODE='$y'");
    	$wg1=mysql_fetch_array($wg);
    	?>
	<tr>	
	<td><?php echo $i++ ?></td>
	<td><?php  echo $row['WARD_CODE'] ?></td>
	<td><?php  echo $row['WARD_NAME'] ?></td>
	<td><?php  echo $row['WARD_GRPCODE'] ?></td>
	<td><?php  echo $wg1['WARDGRP_NAME'] ?></td>
	<td><?php  echo $row['WARD_TARIFF'] ?></td>
	<td><?php  echo $dep1['tariff_name'] ?></td>
	<td><?php  echo $row['WARD_ACTIVE'] ?></td>
	
<?php
}
echo "</table>";
}
elseif(isset($_POST["export"]))
{
	if(isset($_POST['t1']))
	{
$str=mysql_query("SELECT * from ward_master WHERE WARD_NAME like '%".$_POST['t1']."%'");
}
else
{
	$str=mysql_query("SELECT * from ward_master");
}
$output .='<table class="table" bordered="1">
	<tr>
	<td>S.no</td>
	<td>Ward Code</td>
	<td>Ward Name</td>
	<td>Category Code</td>
	<td>Category Name</td>
	<td>Tariff Code</td>
	<td>Tariff Name</td>
	<td>Ward Status</td>
	</tr>';
	$i=1;
    while($row = mysql_fetch_array($str)) {
    	$x=$row['WARD_TARIFF'];
    	$y=$row['WARD_GRPCODE'];
    	$dep=mysql_query("SELECT * FROM tariff_master WHERE tariff_code='$x'");
    	$dep1=mysql_fetch_array($dep);
    	$wg=mysql_query("SELECT * FROM wardgrop_master WHERE WARDGRP_CODE='$y'");
    	$wg1=mysql_fetch_array($wg);
    	
		$output .='	<tr>
		<td> '.$i++ .'</td>
		<td> '.$row['WARD_CODE'].'</td>		
		<td> '.$row['WARD_NAME'].'</td>
		<td> '.$row['WARD_GRPCODE'].'</td>		
		<td> '.$wg1['WARDGRP_NAME'].'</td>
	<td> '.$row['WARD_TARIFF'].'</td>
	<td> '.$dep1['tariff_name'].'</td>
		<td> '.$row['WARD_TARIFF'].'</td>
		<td> '.$row['WARD_ACTIVE'].'</td></tr>';		

		}
		$output .= '</table>';
			header("Content-Type: application/xls");
			header("Content-Disposition: attachment; filename=wards.xls");
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
$str=mysql_query("SELECT * from ward_master WHERE WARD_NAME like '%".$_POST['t1']."%'");
}
else
{
	$str=mysql_query("SELECT * from ward_master");
}echo "<center>";
echo "<table border='1'>";
	echo "<tr>
		<td align='center'>S.no</td>	
	<td align='center'>Ward Code</td>
	<td align='center'>Ward Name</td>
	<td align='center'>Category Code</td>
	<td align='center'>Category Name</td>
	<td align='center'>Tariff Code</td>
	<td align='center'>Tariff Name</td>
	<td align='center'>Ward Status</td>	
	</tr>";
	$i=1;
    while($row = mysql_fetch_array($str)) {
    	$x=$row['WARD_TARIFF'];
    	$y=$row['WARD_GRPCODE'];
    	$dep=mysql_query("SELECT * FROM tariff_master WHERE tariff_code='$x'");
    	$dep1=mysql_fetch_array($dep);
    	$wg=mysql_query("SELECT * FROM wardgrop_master WHERE WARDGRP_CODE='$y'");
    	$wg1=mysql_fetch_array($wg);
    	?>
	<tr>	
	<td align='center'><?php echo $i++ ?></td>
	<td align='center'><?php  echo $row['WARD_CODE'] ?></td>
	<td align='center'><?php  echo $row['WARD_NAME'] ?></td>
	<td align='center'><?php  echo $row['WARD_GRPCODE'] ?></td>
	<td align='center'><?php  echo $wg1['WARDGRP_NAME'] ?></td>
	<td align='center'><?php  echo $row['WARD_TARIFF'] ?></td>
	<td align='center'><?php  echo $dep1['tariff_name'] ?></td>
	<td align='center'><?php  echo $row['WARD_ACTIVE'] ?></td>
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
