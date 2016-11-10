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

$str=mysql_query("SELECT * from doctor WHERE doc_drname like '%".$_POST['t1']."%'");
}
else
{
	$str=mysql_query("SELECT * from doctor");
}
echo "<table border='1' class='act'>";
	echo "<tr>
	<td>S.no</td>
	<td>Doctor Code</td>
	<td>Title</td>
	<td>Doctor Name</td>	
	<td>Designation</td>
	<td>Dept Name</td>
	<td>Specilisation</td>
	<td>Doctor Type</td>
	<td>Consulting Type</td>
	<td>Qualification</td>
	<td>DOB</td>
	<td>APP No.</td>
	<td>PAN No</td>
	<td>Address</td>
	<td>City</td>
	<td>District</td>
	<td>State</td>
	<td>Country</td>
	<td>Mobile No</td>
	<td>Email</td>
	<td>Alias</td>
	<td>Status</td>
	</tr>";
	$i=1;
    while($row = mysql_fetch_array($str)) {
    	
    	$x=$row['doc_city'];
    	$y=$row['doc_district'];
    	$z=$row['doc_state'];
    	$a=$row['doc_coun'];
    	$b=$row['doc_desig'];
    	$c=$row['doc_dept'];
    	$dsg=mysql_query("SELECT * FROM designation_master WHERE desg_code='$b'");$dsg11=mysql_fetch_array($dsg);
    	$dept=mysql_query("SELECT * FROM department_master WHERE dept_code='$c'");$dept1=mysql_fetch_array($dept);
    	$st=mysql_query("SELECT * FROM city_master WHERE city_code='$x'");$st1=mysql_fetch_array($st);
    	$ct=mysql_query("SELECT * FROM country_master WHERE country_code='$a'");$ct1=mysql_fetch_array($ct);
    	$cit=mysql_query("SELECT * FROM district_master WHERE district_code='$y'");$cit1=mysql_fetch_array($cit);
		$dis=mysql_query("SELECT * FROM state_master WHERE state_code='$z'");$dis1=mysql_fetch_array($dis);


    	?>
	<tr>	
	<td><?php echo $i++ ?></td>
	<td><?php  echo $row['doc_drcode'] ?></td>
	<td><?php  echo $row['dtitle'] ?></td>
	<td><?php  echo $row['doc_drname'] ?></td>
	<td><?php  echo $dsg11['desg_name'] ?></td>
	<td><?php  echo $dept1['dept_name'] ?></td>
	<td><?php  echo $row['doc_speci'] ?></td>
	<td><?php echo $row['doc_drtype'] ?></td>
	<td><?php echo $row['doc_cgtype'] ?></td>
	<td><?php echo $row['doc_quali'] ?></td>
	<td><?php echo $row['doc_dob'] ?></td>
	<td><?php echo $row['doc_appno'] ?></td>
	<td><?php echo $row['doc_pan'] ?></td>
	<td><?php echo $row['doc_addr'] ?></td>
	<td><?php echo $st1['city_name'] ?></td>
	<td><?php echo $cit1['district_name'] ?></td>
	<td><?php echo $dis1['state_name'] ?></td>
	<td><?php echo $ct1['country_name'] ?></td>
	<td><?php echo $row['doc_mob'] ?></td>
	<td><?php echo $row['doc_email'] ?></td>	
	<td><?php echo $row['doc_aname'] ?></td>
	<td><?php echo $row['doc_status'] ?></td></tr>
	
<?php
}
echo "</table>";
}
elseif(isset($_POST["export"]))
{
	if(isset($_POST['t1']))
	{

$str=mysql_query("SELECT * from doctor WHERE doc_drname like '%".$_POST['t1']."%'");
}
else
{
	$str=mysql_query("SELECT * from doctor");
}
$output .='<table class="table" bordered="1">
	<tr>
	<td>S.no</td>
	<td>Doctor Code</td>
	<td>Title</td>
	<td>Doctor Name</td>	
	<td>Designation</td>
	<td>Dept Name</td>
	<td>Specilisation</td>
	<td>Doctor Type</td>
	<td>Consulting Type</td>
	<td>Qualification</td>
	<td>DOB</td>
	<td>APP No.</td>
	<td>PAN No</td>
	<td>Address</td>
	<td>City</td>
	<td>District</td>
	<td>State</td>
	<td>Country</td>
	<td>Mobile No</td>
	<td>Email</td>
	<td>Alias</td>
	<td>Status</td>
	
	</tr>';
	$i=1;
    while($row = mysql_fetch_array($str)) {
    	
		$x=$row['doc_city'];
    	$y=$row['doc_district'];
    	$z=$row['doc_state'];
    	$a=$row['doc_coun'];
    	$b=$row['doc_desig'];
    	$c=$row['doc_dept'];
    	$dsg=mysql_query("SELECT * FROM designation_master WHERE desg_code='$b'");$dsg11=mysql_fetch_array($dsg);
    	$dept=mysql_query("SELECT * FROM department_master WHERE dept_code='$c'");$dept1=mysql_fetch_array($dept);
    	$st=mysql_query("SELECT * FROM city_master WHERE city_code='$x'");$st1=mysql_fetch_array($st);
    	$ct=mysql_query("SELECT * FROM country_master WHERE country_code='$a'");$ct1=mysql_fetch_array($ct);
    	$cit=mysql_query("SELECT * FROM district_master WHERE district_code='$y'");$cit1=mysql_fetch_array($cit);
		$dis=mysql_query("SELECT * FROM state_master WHERE state_code='$z'");$dis1=mysql_fetch_array($dis);

		$output .='	<tr>
		<td> '.$i++ .'</td>
		<td> '.$row['doc_drcode'].'</td>		
		<td> '.$row['dtitle'].'</td>
		<td>'.$row['doc_drname'].'</td>
		<td>'.$dsg11['desg_name'].'</td>
		<td>'.$dept1['dept_name'].'</td>
		<td> '.$row['doc_speci'].'</td>		
		<td> '.$row['doc_drtype'].'</td>
		<td>'.$row['doc_cgtype'].'</td>
		<td>'.$row['doc_quali'].'</td>
		<td>'.$row['doc_dob'].'</td>
		<td> '.$row['doc_appno'].'</td>		
		<td> '.$row['doc_pan'].'</td>
		<td> '.$row['doc_addr'].'</td>
		<td>'.$st1['city_name'].'</td>
		<td>'.$cit1['district_name'].'</td>
		<td>'.$dis1['state_name'].'</td>
		<td> '.$ct1['country_name'].'</td>		
		<td> '.$row['doc_mob'].'</td>
		<td>'.$row['doc_email'].'</td>
		<td>'.$row['doc_aname'].'</td>
		<td>'.$row['doc_status'].'</td>
		
		</tr>';		

		}
		$output .= '</table>';
			header("Content-Type: application/xls");
			header("Content-Disposition: attachment; filename=doctors.xls");
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

$str=mysql_query("SELECT * from doctor WHERE doc_drname like '%".$_POST['t1']."%'");
}
else
{
	$str=mysql_query("SELECT * from doctor");
}
echo "<center>";
echo "<table border='1' class='act'>";
	echo "<tr>
	<td align='center'>S.no</td>
	<td>Doctor Code</td>
	<td>Title</td>
	<td>Doctor Name</td>	
	<td>Designation</td>
	<td>Dept Name</td>
	<td>Specilisation</td>
	<td>Doctor Type</td>
	<td>Consulting Type</td>
	<td>Qualification</td>
	<td>DOB</td>
	<td>APP No.</td>
	<td>PAN No</td>
	<td>Address</td>
	<td>City</td>
	<td>District</td>
	<td>State</td>
	<td>Country</td>
	<td>Mobile No</td>
	<td>Email</td>
	<td>Alias</td>
	<td>Status</td>
	</tr>";
	$i=1;
    while($row = mysql_fetch_array($str)) {
    	
    	$x=$row['doc_city'];
    	$y=$row['doc_district'];
    	$z=$row['doc_state'];
    	$a=$row['doc_coun'];
    	$b=$row['doc_desig'];
    	$c=$row['doc_dept'];
    	$dsg=mysql_query("SELECT * FROM designation_master WHERE desg_code='$b'");$dsg11=mysql_fetch_array($dsg);
    	$dept=mysql_query("SELECT * FROM department_master WHERE dept_code='$c'");$dept1=mysql_fetch_array($dept);
    	$st=mysql_query("SELECT * FROM city_master WHERE city_code='$x'");$st1=mysql_fetch_array($st);
    	$ct=mysql_query("SELECT * FROM country_master WHERE country_code='$a'");$ct1=mysql_fetch_array($ct);
    	$cit=mysql_query("SELECT * FROM district_master WHERE district_code='$y'");$cit1=mysql_fetch_array($cit);
		$dis=mysql_query("SELECT * FROM state_master WHERE state_code='$z'");$dis1=mysql_fetch_array($dis);


    	?>
	<tr>	
	<td><?php echo $i++ ?></td>
	<td><?php  echo $row['doc_drcode'] ?></td>
	<td><?php  echo $row['dtitle'] ?></td>
	<td><?php  echo $row['doc_drname'] ?></td>
	<td><?php  echo $dsg11['desg_name'] ?></td>
	<td><?php  echo $dept1['dept_name'] ?></td>
	<td><?php  echo $row['doc_speci'] ?></td>
	<td><?php echo $row['doc_drtype'] ?></td>
	<td><?php echo $row['doc_cgtype'] ?></td>
	<td><?php echo $row['doc_quali'] ?></td>
	<td><?php echo $row['doc_dob'] ?></td>
	<td><?php echo $row['doc_appno'] ?></td>
	<td><?php echo $row['doc_pan'] ?></td>
	<td><?php echo $row['doc_addr'] ?></td>
	<td><?php echo $st1['city_name'] ?></td>
	<td><?php echo $cit1['district_name'] ?></td>
	<td><?php echo $dis1['state_name'] ?></td>
	<td><?php echo $ct1['country_name'] ?></td>
	<td><?php echo $row['doc_mob'] ?></td>
	<td><?php echo $row['doc_email'] ?></td>	
	<td><?php echo $row['doc_aname'] ?></td>
	<td><?php echo $row['doc_status'] ?></td></tr>
<?php
}
echo "</table>";
echo "</center>";
}
?>
</body>
</html>
