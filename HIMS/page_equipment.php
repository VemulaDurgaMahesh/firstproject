<?php
session_start();
$connect = mysql_connect ("localhost","root","") or die();
     mysql_select_db("hospital")or die();
      $output = ''; 
?>
<html>
<?php
if(isset($_POST['submit']))
{

	if(isset($_POST['t1']))
	{

$str=mysql_query("SELECT * from equipment_master WHERE eqp_name like '%".$_POST['t1']."%'");
}
else
{
	$str=mysql_query("SELECT * from equipment_master");
}
echo "<table border='1'>";
	echo "<tr>
	<td>S.no</td>
	<td>Group Name</td>
	<td>Equipment Code</td>
	<td>Equipment Name</td>
	<td>Level</td>
	<td>Block</td>
	<td>Wing</td>
	<td>Extension Num</td>
	<td>Status</td>
	</tr>";
	$i=1;
    while($row = mysql_fetch_array($str)) {
     	?>
	<tr>	
	<td><?php echo $i++ ?></td>
	<td><?php  echo $row['eqp_groupname'] ?></td>
	<td><?php  echo $row['eqp_code'] ?></td>
	<td><?php  echo $row['eqp_name'] ?></td>
	<td><?php  echo $row['eqp_level'] ?></td>
	<td><?php  echo $row['eqp_block'] ?></td>
	<td><?php  echo $row['eqp_wing'] ?></td>	
	<td><?php  echo $row['eqp_extensionno'] ?></td>
	<td><?php  echo $row['eqp_status'] ?></td>
	
<?php
}
echo "</table>";
}
elseif(isset($_POST["export"]))
{
	if(isset($_POST['t1']))
	{

$str=mysql_query("SELECT * from equipment_master WHERE eqp_name like '%".$_POST['t1']."%'");
}
else
{
	$str=mysql_query("SELECT * from equipment_master");
}$output .='<table class="table" bordered="1">
	<tr>
	<td>S.no</td>
	<td>Group Name</td>
	<td>Equipment Code</td>
	<td>Equipment Name</td>
	<td>Level</td>
	<td>Block</td>
	<td>Wing</td>
	<td>Extension Num</td>
	<td>Status</td>
	</tr>';
	$i=1;
    while($row = mysql_fetch_array($str)) {    	
    	
		$output .='	<tr>
		<td> '.$i++ .'</td>
		<td> '.$row['eqp_groupname'].'</td>	
		<td> '.$row['eqp_code'].'</td>	
		<td> '.$row['eqp_name'].'</td>
		<td> '.$row['eqp_level'].'</td>		
		<td> '.$row['eqp_block'].'</td>
		<td> '.$row['eqp_wing'].'</td>
		<td> '.$row['eqp_extensionno'].'</td>				
		<td> '.$row['eqp_status'].'</td>
		</tr>';		

		}
		$output .= '</table>';
			header("Content-Type: application/xls");
			header("Content-Disposition: attachment; filename=Equipments.xls");
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

$str=mysql_query("SELECT * from equipment_master WHERE eqp_name like '%".$_POST['t1']."%'");
}
else
{
	$str=mysql_query("SELECT * from equipment_master");
}
echo "<center>";
echo "<table border='1'>";
	echo "<tr>
	<td>S.no</td>
	<td>Group Name</td>
	<td>Equipment Code</td>
	<td>Equipment Name</td>
	<td>Level</td>
	<td>Block</td>
	<td>Wing</td>
	<td>Extension Num</td>
	<td>Status</td>	
	</tr>";
	$i=1;
    while($row = mysql_fetch_array($str)) {
    	
    	?>
	<tr>	
	<td align='center'><?php echo $i++ ?></td>
	<td><?php  echo $row['eqp_groupname'] ?></td>
	<td><?php  echo $row['eqp_code'] ?></td>
	<td><?php  echo $row['eqp_name'] ?></td>
	<td><?php  echo $row['eqp_level'] ?></td>
	<td><?php  echo $row['eqp_block'] ?></td>
	<td><?php  echo $row['eqp_wing'] ?></td>	
	<td><?php  echo $row['eqp_extensionno'] ?></td>
	<td><?php  echo $row['eqp_status'] ?></td>
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
