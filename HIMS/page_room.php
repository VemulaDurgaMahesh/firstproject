<?php
session_start();
$connect = mysql_connect ("localhost","root","") or die();
     mysql_select_db("hospital")or die();
      $output = ''; 

if(isset($_POST['submit']))
{
	if(isset($_POST['t1']))
	{

$str=mysql_query("SELECT * from room_master WHERE ROOM_BLOCK like '%".$_POST['t1']."%'");
}
else
{
	$str=mysql_query("SELECT * from room_master");
}
echo "<table border='1'>";
	echo "<tr>
	<td>S.no</td>
	<td>Room Code</td>
	<td>No Of Beds</td>	
	<td>Ext no.</td>
	<td>Ward Name</td>
	<td>Active</td>	
	<td>Nurse name</td>
	<td>Block</td>
	<td>
	</tr>";
	$i=1;
    while($row = mysql_fetch_array($str)) {
    	$x=$row['ROOM_WARDCODE'];
    	$dep=mysql_query("SELECT * FROM ward_master WHERE WARD_CODE='$x'");
    	$dep1=mysql_fetch_array($dep);
    	?>
	<tr>	
	<td><?php echo $i++ ?></td>
	<td><?php  echo $row['ROOM_CODE'] ?></td>
	<td><?php  echo $row['ROOM_BEDNO'] ?></td>
	<td><?php  echo $row['ROOM_EXTEN'] ?></td>
	<td><?php  echo $dep1['WARD_NAME'] ?></td>
	<td><?php  echo $row['ROOM_STATUS'] ?></td>	
	<td><?php  echo $row['ROOM_NURSE'] ?></td>
	<td><?php  echo $row['ROOM_BLOCK'] ?></td></tr>
	
<?php
}
echo "</table>";
}
elseif(isset($_POST["export"]))
{
	if(isset($_POST['t1']))
	{

$str=mysql_query("SELECT * from room_master WHERE ROOM_BLOCK like '%".$_POST['t1']."%'");
}
else
{
	$str=mysql_query("SELECT * from room_master");
}
$output .='<table class="table" bordered="1">
	<tr>
	<td>S.no</td>
	<td>Room Code</td>
	<td>No Of Beds</td>	
	<td>Ext no.</td>
	<td>Ward Name</td>
	<td>Active</td>	
	<td>Nurse name</td>
	<td>Block</td>
	</tr>';
	$i=1;
    while($row = mysql_fetch_array($str)) {
    	$x=$row['ROOM_WARDCODE'];
    	$dep=mysql_query("SELECT * FROM ward_master WHERE WARD_CODE='$x'");
    	$dep1=mysql_fetch_array($dep);
    	
		$output .='	<tr>
		<td> '.$i++ .'</td>
		<td> '.$row['ROOM_CODE'].'</td>
	<td> '.$row['ROOM_BEDNO'].'</td>
	<td> '.$row['ROOM_EXTEN'].'</td>
	<td> '.$dep1['WARD_NAME'].'</td>
	<td> '.$row['ROOM_STATUS'].'</td>	
	<td> '.$row['ROOM_NURSE'].'</td>
	<td> '.$row['ROOM_BLOCK'].'</td></tr>';		

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

$str=mysql_query("SELECT * from room_master WHERE ROOM_BLOCK like '%".$_POST['t1']."%'");
}
else
{
	$str=mysql_query("SELECT * from room_master");
}
echo "<center>";
echo "<table border='1'>";
	echo "<tr>
	<td align='center'>S.no</td>	
	<td align='center'>Room Code</td>
	<td align='center'>No Of Beds</td>	
	<td align='center'>Ext no.</td>
	<td align='center'>Ward Name</td>
	<td align='center'>Active</td>	
	<td align='center'>Nurse name</td>
	<td align='center'>Block</td>	
	</tr>";
	$i=1;
    while($row = mysql_fetch_array($str)) {
    	$x=$row['ROOM_WARDCODE'];
    	$dep=mysql_query("SELECT * FROM ward_master WHERE WARD_CODE='$x'");
    	$dep1=mysql_fetch_array($dep);
    	?>
	<tr>	
	<td align='center'><?php echo $i++ ?></td>
	<td><?php  echo $row['ROOM_CODE'] ?></td>
	<td><?php  echo $row['ROOM_BEDNO'] ?></td>
	<td><?php  echo $row['ROOM_EXTEN'] ?></td>
	<td><?php  echo $dep1['WARD_NAME'] ?></td>
	<td><?php  echo $row['ROOM_STATUS'] ?></td>	
	<td><?php  echo $row['ROOM_NURSE'] ?></td>
	<td><?php  echo $row['ROOM_BLOCK'] ?></td>
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
