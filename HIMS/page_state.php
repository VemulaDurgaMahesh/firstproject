<?php
session_start();
$connect = mysql_connect ("localhost","root","") or die();
     mysql_select_db("hospital")or die();
      $output = ''; 

if(isset($_POST['submit']))
{
?>
<html>
<body>
 <?php 
    	
	if(isset($_POST['t1']))
	{

$str=mysql_query("SELECT * from state_master WHERE state_name like '%".$_POST['t1']."%'");
}
else
{
	$str=mysql_query("SELECT * from state_master");
}
echo "<table border='1'>";
	echo "<tr>
	<td>S.no</td>
	<td>State CODE</td>
	<td>State NAME</td>
	<td>Country Name</td>
	<td>Country Code</td>
	<td>Status</td>
	
	</tr>";
	$i=1;
    while($row = mysql_fetch_array($str)) {
    	$x=$row['country_code'];

                      $b = mysql_query(" SELECT * FROM country_master WHERE country_code='$x'") or die(mysql_error());
                      $cname = mysql_fetch_array($b);?>
	<tr>	
	<td><?php echo $i++ ?></td>
	<td><?php  echo $row['state_code'] ?></td>
	<td><?php  echo $row['state_name'] ?></td>
	<td><?php  echo $cname['country_name'] ?></td>
	<td><?php  echo $row['country_code'] ?></td>
	<td><?php  echo $row['state_status'] ?></td>	
<?php
}
echo "</table>";
}
elseif(isset($_POST["export"]))
{
	if(isset($_POST['t1']))
	{
$x1=$_POST['t7'];
$str=mysql_query("SELECT * from state_master WHERE state_name like '%".$_POST['t1']."%'");
}
else
{
	$str=mysql_query("SELECT * from state_master");
}
$output .='<table class="table" bordered="1">
	<tr>
	<td>S.no</td>
	<td>State CODE</td>
	<td>State NAME</td>
	<td>Country Name</td>
	<td>Country Code</td>
	<td>Status</td>	
	</tr>';
	$i=1;
    while($row = mysql_fetch_array($str)) {
    	$x=$row['country_code'];
                     $b = mysql_query(" SELECT * FROM country_master WHERE country_code='$x'") or die(mysql_error());
                     $cname = mysql_fetch_array($b);
		$output .='	<tr>
		<td> '.$i++ .'</td>
		<td> '.$row['state_code'].'</td>
		<td> '.$row['state_name'].'</td>
		<td> '.$cname['country_name'].'</td>
		<td> '.$row['country_code'].'</td>
		<td> '.$row['state_status'].'</td></tr>';		

		}
		$output .= '</table>';
			header("Content-Type: application/xls");
			header("Content-Disposition: attachment; filename=states.xls");
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
$str=mysql_query("SELECT * from state_master WHERE state_name like '%".$_POST['t1']."%'");
}
else
{
	$str=mysql_query("SELECT * from state_master");
}
echo "<center>";
echo "<table border='1'>";
	echo "<tr>
	<td align='center'>S.no</td>
	<td align='center'>State CODE</td>
	<td align='center'>State NAME</td>
	<td align='center'>Country Name</td>
	<td align='center'>Country Code</td>
	
	</tr>";
	$i=1;
    while($row = mysql_fetch_array($str)) {
    	$x=$row['country_code'];

                      $b = mysql_query(" SELECT * FROM country_master WHERE country_code='$x'") or die(mysql_error());
                      $cname = mysql_fetch_array($b);
    ?>
	<tr>	
	<td align='center'><?php echo $i++ ?></td>
	<td align='center'><?php  echo $row['state_code'] ?></td>
	<td align='center'><?php  echo $row['state_name'] ?></td>
	<td align='center'><?php  echo $cname['country_name'] ?></td>
	<td align='center'><?php  echo $row['country_code'] ?></td>	
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