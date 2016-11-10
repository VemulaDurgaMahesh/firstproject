<?php
session_start();
$connect = mysql_connect ("localhost","root","") or die();
     mysql_select_db("hospital")or die();
      $output = ''; 

if(isset($_POST['submit']))
{
?    	
	if(isset($_POST['t1']))
	{

$str=mysql_query("SELECT * from organisation WHERE org_orname like '%".$_POST['t1']."%'");
}
else
{
	$str=mysql_query("SELECT * from organisation");
}
echo "<table border='1'>";
	echo "<tr>
	<td>S.no</td>
	<td>Organisation Code</td>	
	<td>Organisation Name</td>	
	<td>Contact Person</td>
	<td>Contract No</td>
	<td>Effect From</td>
	<td>Effect To</td>
	<td>IP Org%</td>	
	<td>OP Org%</td>
	<td>Consultaion No</td>
	<td>Consultation Days</td>
	<td>IP Emg%</td>	
	<td>OP Emg%</td>
	<td>Organisation Type</td>
	<td>Letter Required</td>
	<td>Authorisation Person</td>
	<td>Status</td>	
	</tr>";
	$i=1;
    while($row = mysql_fetch_array($str)) {
    	?>
	<tr>	
	<td><?php echo $i++ ?></td>
	<td><?php  echo $row['org_orcode'] ?></td>
	<td><?php  echo $row['org_orname'] ?></td>
	<td><?php  echo $row['org_cperson'] ?></td>
	<td><?php  echo $row['org_cno'] ?></td>
	<td><?php  echo $row['org_effectf'] ?></td>
	<td><?php  echo $row['org_effectt'] ?></td>
	<td><?php  echo $row['org_iporgp'] ?></td>
	<td><?php echo $row['org_oporgp'] ?></td>
	<td><?php echo $row['org_consulno'] ?></td>
	<td><?php echo $row['org_consulday'] ?></td>
	<td><?php echo $row['org_ipempp'] ?></td>
	<td><?php echo $row['org_opempp'] ?></td>
	<td><?php echo $row['org_origin'] ?></td>
	<td><?php echo 'Y' ?></td>
	<td><?php echo $row['org_aperson'] ?></td>	
	<td><?php echo $row['org_status'] ?></td>	
	</tr>
	
<?php
}
echo "</table>";
}
elseif(isset($_POST["export"]))
{
	if(isset($_POST['t1']))
	{

$str=mysql_query("SELECT * from organisation WHERE org_orname like '%".$_POST['t1']."%'");
}
else
{
	$str=mysql_query("SELECT * from organisation");
}
$output .='<table class="table" bordered="1">
	<tr>
	<td>S.no</td>
	<td>Organisation Code</td>	
	<td>Organisation Name</td>	
	<td>Contact Person</td>
	<td>Contract No</td>
	<td>Effect From</td>
	<td>Effect To</td>
	<td>IP Org%</td>	
	<td>OP Org%</td>
	<td>Consultaion No</td>
	<td>Consultation Days</td>
	<td>IP Emg%</td>	
	<td>OP Emg%</td>
	<td>Organisation Type</td>
	<td>Letter Required</td>
	<td>Authorisation Person</td>
	<td>Status</td>
	</tr>';
	$i=1;
	    while($row = mysql_fetch_array($str)) {   

		$output .='	<tr>
		<td> '.$i++ .'</td>		
		<td>'.$row['org_orcode'].'</td>
		<td>'.$row['org_orname'].'</td>
		<td>'.$row['org_cperson'].'</td>
		<td> '.$row['org_cno'].'</td>		
		<td> '.$row['org_effectf'].'</td>
		<td>'.$row['org_effectt'].'</td>
		<td>'.$row['org_iporgp'].'</td>
		<td>'.$row['org_oporgp'].'</td>
		<td> '.$row['org_consulno'].'</td>		
		<td> '.$row['org_consulday'].'</td>
		<td> '.$row['org_ipempp'].'</td>
		<td>'.$row['org_opempp'].'</td>
		<td>'.$row['org_origin'].'</td>
		<td>'.'Y'.'</td>		
		<td>'.$row['org_aperson'].'</td>
		<td>'.$row['org_status'].'</td>	

		</tr>';		

		}
		$output .= '</table>';
			header("Content-Type: application/xls");
			header("Content-Disposition: attachment; filename=organisation.xls");
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

$str=mysql_query("SELECT * from organisation WHERE org_orname like '%".$_POST['t1']."%'");
}
else
{
	$str=mysql_query("SELECT * from organisation");
}

echo "<center>";
echo "<table border='1'>";
	echo "<tr>
	<td align='center'>S.no</td>
	<td>Organisation Code</td>	
	<td>Organisation Name</td>	
	<td>Contact Person</td>
	<td>Contract No</td>
	<td>Effect From</td>
	<td>Effect To</td>
	<td>IP Org%</td>	
	<td>OP Org%</td>
	<td>Consultaion No</td>
	<td>Consultation Days</td>
	<td>IP Emg%</td>	
	<td>OP Emg%</td>
	<td>Organisation Type</td>
	<td>Letter Required</td>
	<td>Authorisation Person</td>
	<td>Status</td>
	</tr>";
	$i=1;
    while($row = mysql_fetch_array($str)) {
   	?>
	<tr>	
	<td><?php echo $i++ ?></td>
	<td><?php  echo $row['org_orcode'] ?></td>
	<td><?php  echo $row['org_orname'] ?></td>
	<td><?php  echo $row['org_cperson'] ?></td>
	<td><?php  echo $row['org_cno'] ?></td>
	<td><?php  echo $row['org_effectf'] ?></td>
	<td><?php  echo $row['org_effectt'] ?></td>
	<td><?php  echo $row['org_iporgp'] ?></td>
	<td><?php echo $row['org_oporgp'] ?></td>
	<td><?php echo $row['org_consulno'] ?></td>
	<td><?php echo $row['org_consulday'] ?></td>
	<td><?php echo $row['org_ipempp'] ?></td>
	<td><?php echo $row['org_opempp'] ?></td>
	<td><?php echo $row['org_origin'] ?></td>
	<td><?php echo 'Y' ?></td>
	<td><?php echo $row['org_aperson'] ?></td>	
	<td><?php echo $row['org_status'] ?></td></tr>
<?php
}
echo "</table>";
echo "</center>";
}
?>
</body>
</html>
