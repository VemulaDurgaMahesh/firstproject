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
	$str=mysql_query("SELECT * from city_master WHERE city_name like '%".$_POST['t1']."%'");
}
else
{
	$str=mysql_query("SELECT * from city_master");
}
echo "<table border='1' class='act'>";
	echo "<tr>
	<td>S.no</td>
	<td>City Code</td>
	<td>City Name</td>	
	<td>Pincode</td>
	<td>District</td>
	<td>State</td>
	<td>Country</td>
	<td>Status</td>
	</tr>";
	$i=1;
    while($row = mysql_fetch_array($str)) {
    	$y=$row['district_code'];
    	$z=$row['state_code'];
    	$a=$row['country_code'];
    	$ct=mysql_query("SELECT * FROM country_master WHERE country_code='$a'");$ct1=mysql_fetch_array($ct);
    	$cit=mysql_query("SELECT * FROM district_master WHERE district_code='$y'");$cit1=mysql_fetch_array($cit);
		$dis=mysql_query("SELECT * FROM state_master WHERE state_code='$z'");$dis1=mysql_fetch_array($dis);
    	?>
	<tr>	
	<td><?php echo $i++ ?></td>
	<td><?php  echo $row['city_code'] ?></td>
	<td><?php  echo $row['city_name'] ?></td>
	<td><?php echo $row['city_pin'] ?></td>
	<td><?php echo $cit1['district_name'] ?></td>
	<td><?php echo $dis1['state_name'] ?></td>
	<td><?php echo $ct1['country_name'] ?></td>
	<td><?php echo $row['city_status'] ?></td>
	</tr>
	
<?php
}
echo "</table>";
}
elseif(isset($_POST["export"]))
{
	if(isset($_POST['t1']))
	{

$str=mysql_query("SELECT * from city_master WHERE city_name like '%".$_POST['t1']."%'");
}
else
{
	$str=mysql_query("SELECT * from city_master");
}
$output .='<table class="table" bordered="1">
	<tr>
	<td>S.no</td>
	<td>City Code</td>
	<td>City Name</td>
	<td>Pincode</td>
	<td>District</td>
	<td>State</td>
	<td>Country</td>
	<td>Status</td>
	
	</tr>';
	$i=1;
    while($row = mysql_fetch_array($str)) {
    	$y=$row['district_code'];
    	$z=$row['state_code'];
    	$a=$row['country_code'];
    	$ct=mysql_query("SELECT * FROM country_master WHERE country_code='$a'");$ct1=mysql_fetch_array($ct);
    	$cit=mysql_query("SELECT * FROM district_master WHERE district_code='$y'");$cit1=mysql_fetch_array($cit);
		$dis=mysql_query("SELECT * FROM state_master WHERE state_code='$z'");$dis1=mysql_fetch_array($dis);
		$output .='	<tr>
		<td> '.$i++ .'</td>
		<td> '.$row['city_code'].'</td>		
		<td> '.$row['city_name'].'</td>
		<td>'.$row['city_pin'].'</td>
	<td>'.$cit1['district_name'].'</td>
	<td>'.$dis1['state_name'].'</td>
	<td>'.$ct1['country_name'].'</td>
	<td>'.$row['city_status'].'</td>
		</tr>';		

		}
		$output .= '</table>';
			header("Content-Type: application/xls");
			header("Content-Disposition: attachment; filename=cities.xls");
			echo $output;
}

elseif(isset($_POST['print']))
{
?>
<html>
<style>
    .act { color:#F00; }
</style>
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

$str=mysql_query("SELECT * from city_master WHERE city_name like '%".$_POST['t1']."%'");
}
else
{
	$str=mysql_query("SELECT * from city_master");
}
echo "<center>";
echo "<table border='1' class='act'>";
	echo "<tr>
	<td align='center'>S.no</td>
	<td align='center'>City Code</td>
	<td align='center'>City Name</td>
	<td align='center'>Pincode</td>
	<td align='center'>District</td>
	<td align='center'>State</td>
	<td align='center'>Country</td>
	<td align='center'>Status</td>	
	</tr>";
	$i=1;
    while($row = mysql_fetch_array($str)) {
    	$y=$row['district_code'];
    	$z=$row['state_code'];
    	$a=$row['country_code'];
    	$ct=mysql_query("SELECT * FROM country_master WHERE country_code='$a'");$ct1=mysql_fetch_array($ct);
    	$cit=mysql_query("SELECT * FROM district_master WHERE district_code='$y'");$cit1=mysql_fetch_array($cit);
		$dis=mysql_query("SELECT * FROM state_master WHERE state_code='$z'");$dis1=mysql_fetch_array($dis);
    	?>
	<tr>	
	<td align='center'><?php echo $i++ ?></td>
	<td align='center'><?php  echo $row['city_code'] ?></td>
	<td align='center'> <?php  echo $row['city_name'] ?></td>
	<td align='center'><?php echo $row['city_pin'] ?></td>
	<td align='center'><?php echo $cit1['district_name'] ?></td>
	<td align='center'><?php echo $dis1['state_name'] ?></td>
	<td align='center'><?php echo $ct1['country_name'] ?></td>
	<td align='center'><?php echo $row['city_status'] ?></td>
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
