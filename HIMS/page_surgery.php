<?php
session_start();
$connect = mysql_connect ("localhost","root","") or die();
     mysql_select_db("hospital")or die();
      $output = ''; 

if(isset($_POST['submit']))
{

	if(isset($_POST['t1']))
	{

$str=mysql_query("SELECT * from surgery_master WHERE sg_code like '%".$_POST['t1']."%'");
}
else
{
	$str=mysql_query("SELECT * from surgery_master");
}
echo "<table border='1'>";
	echo "<tr>
	<td>S.no</td>
	<td>Tariff Code</td>
	<td>Tariff Name</td>
	<td>Surgery Code</td>
	<td> Procedure</td>
	<td>Surgery amount</td>
	<td>Surgery Type Code</td>
	<td>Surgery Type Name</td>
	<td>Estimated Time</td>
	<td>Department</td>
	<td>Effect From</td>
	<td>Effect To</td>
	<td>Remarks</td>
	<td>Status</td>
	</tr>";
	$i=1;
    while($row = mysql_fetch_array($str)) {
    	$x=$row['sg_dept'];
    	$dep=mysql_query("SELECT * FROM department_master WHERE dept_code='$x'");
    	$dep1=mysql_fetch_array($dep);
    	$y=$row['sg_tcode'];
    	$ta=mysql_query("SELECT * FROM tariff_master WHERE tariff_code='$y'");
    	$ta1=mysql_fetch_array($ta);
    	$z=$row['sg_sgtcode'];
    	$sgt=mysql_query("SELECT * FROM surgerytype_master WHERE st_code='$z'");
    	$sgt1=mysql_fetch_array($sgt);
    	?>
	<tr>	
	<td><?php echo $i++ ?></td>
	<td><?php  echo $row['sg_tcode'] ?></td>
	<td><?php  echo $ta1['tariff_name'] ?></td>
	<td><?php  echo $row['sg_code'] ?></td>
	<td><?php  echo $row['sg_procedure'] ?></td>
	<td><?php  echo $row['sg_amount'] ?></td>
	<td><?php  echo $row['sg_sgtcode'] ?></td>
	<td><?php  echo $sgt1['st_name'] ?></td>
	<td><?php  echo $row['sg_estime'] ?></td>
	<td><?php  echo $dep1['dept_name'] ?></td>
	<td><?php  echo $row['sg_effectfrom'] ?></td>
	<td><?php  echo $row['sg_effectto'] ?></td>
	<td><?php  echo $row['sg_remarks'] ?></td>
	<td><?php  echo $row['sg_status'] ?></td>
	
<?php
}
echo "</table>";
}
elseif(isset($_POST["export"]))
{
	if(isset($_POST['t1']))
	{

$str=mysql_query("SELECT * from surgery_master WHERE sg_code like '%".$_POST['t1']."%'");
}
else
{
	$str=mysql_query("SELECT * from surgery_master");
}
$output .='<table class="table" bordered="1">
	<tr>
	<td>S.no</td>
	<td>Tariff Code</td>
	<td>Tariff Name</td>
	<td>Surgery Code</td>
	<td> Procedure</td>
	<td>Surgery amount</td>
	<td>Surgery Type Code</td>
	<td>Surgery Type Name</td>
	<td>Estimated Time</td>
	<td>Department</td>
	<td>Effect From</td>
	<td>Effect To</td>
	<td>Remarks</td>
	<td>Status</td>
	</tr>';
	$i=1;
    while($row = mysql_fetch_array($str)) {
    	$x=$row['sg_dept'];
    	$dep=mysql_query("SELECT * FROM department_master WHERE dept_code='$x'");
    	$dep1=mysql_fetch_array($dep);
    	$y=$row['sg_tcode'];
    	$ta=mysql_query("SELECT * FROM tariff_master WHERE tariff_code='$y'");
    	$ta1=mysql_fetch_array($ta);
    	$z=$row['sg_sgtcode'];
    	$sgt=mysql_query("SELECT * FROM surgerytype_master WHERE st_code='$z'");
    	$sgt1=mysql_fetch_array($sgt);
    	
		$output .='	<tr>
		<td> '.$i++ .'</td>
		<td> '.$row['sg_tcode'].'</td>	
		<td> '.$ta1['tariff_name'].'</td>	
		<td> '.$row['sg_code'].'</td>
		<td> '.$row['sg_procedure'].'</td>		
		<td> '.$row['sg_amount'].'</td>
		<td> '.$row['sg_sgtcode'].'</td>
		<td> '.$sgt1['st_name'].'</td>		
		<td> '.$row['sg_estime'].'</td>
		<td> '.$dep1['dept_name'].'</td>		
		<td> '.$row['sg_effectfrom'].'</td>
		<td> '.$row['sg_effectto'].'</td>		
		<td> '.$row['sg_remarks'].'</td>
		<td> '.$row['sg_status'].'</td>
		</tr>';		

		}
		$output .= '</table>';
			header("Content-Type: application/xls");
			header("Content-Disposition: attachment; filename=surgery.xls");
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

$str=mysql_query("SELECT * from surgery_master WHERE sg_code like '%".$_POST['t1']."%'");
}
else
{
	$str=mysql_query("SELECT * from surgery_master");
}
echo "<center>";
echo "<table border='1'>";
	echo "<tr>
	<td align='center'>S.no</td>	
	<td align='center'>Tariff Code</td>
	<td align='center'>Tariff Name</td>
	<td align='center'>Surgery Code</td>
	<td align='center'> Procedure</td>
	<td align='center'>Surgery amount</td>
	<td align='center'>Surgery Type Code</td>
	<td align='center'>Surgery Type Name</td>
	<td align='center'>Estimated Time</td>
	<td align='center'>Department</td>
	<td align='center'>Effect From</td>
	<td align='center'>Effect To</td>
	<td align='center'>Remarks</td>
	<td align='center'>Status</td>	
	</tr>";
	$i=1;
    while($row = mysql_fetch_array($str)) {
    	$x=$row['sg_dept'];
    	$dep=mysql_query("SELECT * FROM department_master WHERE dept_code='$x'");
    	$dep1=mysql_fetch_array($dep);
    	$y=$row['sg_tcode'];
    	$ta=mysql_query("SELECT * FROM tariff_master WHERE tariff_code='$y'");
    	$ta1=mysql_fetch_array($ta);
    	$z=$row['sg_sgtcode'];
    	$sgt=mysql_query("SELECT * FROM surgerytype_master WHERE st_code='$z'");
    	$sgt1=mysql_fetch_array($sgt);
    	?>
	<tr>	
	<td align='center'><?php echo $i++ ?></td>
	<td><?php  echo $row['sg_tcode'] ?></td>
	<td><?php  echo $ta1['tariff_name'] ?></td>
	<td><?php  echo $row['sg_code'] ?></td>
	<td><?php  echo $row['sg_procedure'] ?></td>
	<td><?php  echo $row['sg_amount'] ?></td>
	<td><?php  echo $row['sg_sgtcode'] ?></td>
	<td><?php  echo $sgt1['st_name'] ?></td>
	<td><?php  echo $row['sg_estime'] ?></td>
	<td><?php  echo $dep1['dept_name'] ?></td>
	<td><?php  echo $row['sg_effectfrom'] ?></td>
	<td><?php  echo $row['sg_effectto'] ?></td>
	<td><?php  echo $row['sg_remarks'] ?></td>
	<td><?php  echo $row['sg_status'] ?></td>
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
