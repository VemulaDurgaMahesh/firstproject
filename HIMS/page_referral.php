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

$str=mysql_query("SELECT * from referral WHERE ref_rname like '%".$_POST['t1']."%'");
}
else
{
	$str=mysql_query("SELECT * from referral");
}
echo "<table border='1'>";
	echo "<tr>
	<td>S.no</td>
	<td>Referral Code</td>
	<td>Title</td>
	<td>Referral Name</td>	
	<td>Referral Type</td>
	<td>Status</td>
	<td>Mobile No</td>
	<td>Address</td>
	<td>City</td>	
	<td>State</td>
	<td>Country</td>
	<td>OP Cosultaion(%)</td>
	<td>Investigations</td>
	<td>In Patient(%)</td>
	<td>PAN No</td>
	<td>DOB</td>
	<td>PRO Names</td>
	<td>Specilization</td>
	<td>Designation</td>
	<td>Acc No</td>
	<td>Alias</td>
	<td>Procode</td>	
	</tr>";
	$i=1;
    while($row = mysql_fetch_array($str)) {
    	
    	$x=$row['ref_city'];
    	$y=$row['ref_speci'];
    	$z=$row['ref_state'];
    	$a=$row['ref_coun'];
    	$b=$row['ref_desig'];
    	//$c=$row['doc_dept'];
    	$dsg=mysql_query("SELECT * FROM designation_master WHERE desg_code='$b'");$dsg1=mysql_fetch_array($dsg);
    	//$dept=mysql_query("SELECT * FROM department_master WHERE dept_code='$c'");$dept1=mysql_fetch_array($dept);
    	$st=mysql_query("SELECT * FROM city_master WHERE city_code='$x'");$st1=mysql_fetch_array($st);
    	$ct=mysql_query("SELECT * FROM country_master WHERE country_code='$a'");$ct1=mysql_fetch_array($ct);
    	$cit=mysql_query("SELECT * FROM specilization_master WHERE spl_code='$y'");$cit1=mysql_fetch_array($cit);
		$dis=mysql_query("SELECT * FROM state_master WHERE state_code='$z'");$dis1=mysql_fetch_array($dis);


    	?>
	<tr>	
	<td><?php echo $i++ ?></td>
	<td><?php  echo $row['ref_rfcode'] ?></td>
	<td><?php  echo $row['ref_title'] ?></td>
	<td><?php  echo $row['ref_rname'] ?></td>
	<td><?php  echo $row['ref_rtype'] ?></td>
	<td><?php  echo $row['ref_status'] ?></td>
	<td><?php  echo $row['ref_mob'] ?></td>
	<td><?php  echo $row['ref_addr'] ?></td>
	<td><?php echo $st1['city_name'] ?></td>
	<td><?php echo $dis1['state_name'] ?></td>
	<td><?php echo $ct1['country_name'] ?></td>
	<td><?php echo $row['ref_op'] ?></td>
	<td><?php echo $row['ref_inv'] ?></td>
	<td><?php echo $row['ref_inpat'] ?></td>
	<td><?php echo $row['ref_panno'] ?></td>
	<td><?php echo $row['ref_dob'] ?></td>
	<td><?php echo 'nul' ?></td>
	<td><?php echo $cit1['spl_name'] ?></td>
	<td><?php echo $dsg1['desg_name'] ?></td>
	<td><?php echo $row['ref_accno'] ?></td>
	<td><?php echo $row['ref_aname'] ?></td>	
	<td><?php echo $row['ref_procode'] ?></td>
	</tr>
	
<?php
}
echo "</table>";
}
elseif(isset($_POST["export"]))
{
	if(isset($_POST['t1']))
	{

$str=mysql_query("SELECT * from referral WHERE ref_rname like '%".$_POST['t1']."%'");
}
else
{
	$str=mysql_query("SELECT * from referral");
}

$output .='<table class="table" bordered="1">
	<tr>
	<td>S.no</td>
	<td>Referral Code</td>
	<td>Title</td>
	<td>Referral Name</td>	
	<td>Referral Type</td>
	<td>Status</td>
	<td>Mobile No</td>
	<td>Address</td>
	<td>City</td>	
	<td>State</td>
	<td>Country</td>
	<td>OP Cosultaion(%)</td>
	<td>Investigations</td>
	<td>In Patient(%)</td>
	<td>PAN No</td>
	<td>DOB</td>
	<td>PRO Names</td>
	<td>Specilization</td>
	<td>Designation</td>
	<td>Acc No</td>
	<td>Alias</td>
	<td>Procode</td>	
	
	</tr>';
	$i=1;
    while($row = mysql_fetch_array($str)) {
    		$x=$row['ref_city'];
    	$y=$row['ref_speci'];
    	$z=$row['ref_state'];
    	$a=$row['ref_coun'];
    	$b=$row['ref_desig'];
    	//$c=$row['doc_dept'];
    	$dsg=mysql_query("SELECT * FROM designation_master WHERE desg_code='$b'");$dsg1=mysql_fetch_array($dsg);
    	//$dept=mysql_query("SELECT * FROM department_master WHERE dept_code='$c'");$dept1=mysql_fetch_array($dept);
    	$st=mysql_query("SELECT * FROM city_master WHERE city_code='$x'");$st1=mysql_fetch_array($st);
    	$ct=mysql_query("SELECT * FROM country_master WHERE country_code='$a'");$ct1=mysql_fetch_array($ct);
    	$cit=mysql_query("SELECT * FROM specilization_master WHERE spl_code='$y'");$cit1=mysql_fetch_array($cit);
		$dis=mysql_query("SELECT * FROM state_master WHERE state_code='$z'");$dis1=mysql_fetch_array($dis);

		$output .='	<tr>
		<td> '.$i++ .'</td>				
		<td> '.$row['ref_rfcode'].'</td>
		<td>'.$row['ref_title'].'</td>
		<td>'.$row['ref_rname'].'</td>
		<td>'.$row['ref_rtype'].'</td>
		<td> '.$row['ref_status'].'</td>		
		<td> '.$row['ref_mob'].'</td>
		<td>'.$row['ref_addr'].'</td>
		<td>'.$st1['city_name'].'</td>
		<td>'.$dis1['state_name'].'</td>
		<td> '.$ct1['country_name'].'</td>		
		<td> '.$row['ref_op'].'</td>
		<td> '.$row['ref_inv'].'</td>
		<td>'.$row['ref_inpat'].'</td>
		<td>'.$row['ref_dob'].'</td>
		<td>'.'nul'.'</td>
		<td> '.$cit1['spl_name'].'</td>		
		<td> '.$dsg1['desg_name'].'</td>
		<td>'.$row['ref_accno'].'</td>
		<td>'.$row['ref_aname'].'</td>
		<td>'.$row['ref_procode'].'</td>		
		</tr>';		

		}
		$output .= '</table>';
			header("Content-Type: application/xls");
			header("Content-Disposition: attachment; filename=Referral.xls");
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

$str=mysql_query("SELECT * from referral WHERE ref_rname like '%".$_POST['t1']."%'");
}
else
{
	$str=mysql_query("SELECT * from referral");
}

echo "<center>";
echo "<table border='1'>";
	echo "<tr>
	<td align='center'>S.no</td>
	<td>Referral Code</td>
	<td>Title</td>
	<td>Referral Name</td>	
	<td>Referral Type</td>
	<td>Status</td>
	<td>Mobile No</td>
	<td>Address</td>
	<td>City</td>	
	<td>State</td>
	<td>Country</td>
	<td>OP Cosultaion(%)</td>
	<td>Investigations</td>
	<td>In Patient(%)</td>
	<td>PAN No</td>
	<td>DOB</td>
	<td>PRO Names</td>
	<td>Specilization</td>
	<td>Designation</td>
	<td>Acc No</td>
	<td>Alias</td>
	<td>Procode</td>
	</tr>";
	$i=1;
    while($row = mysql_fetch_array($str)) {
    	$x=$row['ref_city'];
    	$y=$row['ref_speci'];
    	$z=$row['ref_state'];
    	$a=$row['ref_coun'];
    	$b=$row['ref_desig'];
    	//$c=$row['doc_dept'];
    	$dsg=mysql_query("SELECT * FROM designation_master WHERE desg_code='$b'");$dsg1=mysql_fetch_array($dsg);
    	//$dept=mysql_query("SELECT * FROM department_master WHERE dept_code='$c'");$dept1=mysql_fetch_array($dept);
    	$st=mysql_query("SELECT * FROM city_master WHERE city_code='$x'");$st1=mysql_fetch_array($st);
    	$ct=mysql_query("SELECT * FROM country_master WHERE country_code='$a'");$ct1=mysql_fetch_array($ct);
    	$cit=mysql_query("SELECT * FROM specilization_master WHERE spl_code='$y'");$cit1=mysql_fetch_array($cit);
		$dis=mysql_query("SELECT * FROM state_master WHERE state_code='$z'");$dis1=mysql_fetch_array($dis);


    	?>
	<tr>	
	<td><?php echo $i++ ?></td>
	<td><?php  echo $row['ref_rfcode'] ?></td>
	<td><?php  echo $row['ref_title'] ?></td>
	<td><?php  echo $row['ref_rname'] ?></td>
	<td><?php  echo $row['ref_rtype'] ?></td>
	<td><?php  echo $row['ref_status'] ?></td>
	<td><?php  echo $row['ref_mob'] ?></td>
	<td><?php  echo $row['ref_addr'] ?></td>
	<td><?php echo $st1['city_name'] ?></td>
	<td><?php echo $dis1['state_name'] ?></td>
	<td><?php echo $ct1['country_name'] ?></td>
	<td><?php echo $row['ref_op'] ?></td>
	<td><?php echo $row['ref_inv'] ?></td>
	<td><?php echo $row['ref_inpat'] ?></td>
	<td><?php echo $row['ref_panno'] ?></td>
	<td><?php echo $row['ref_dob'] ?></td>
	<td><?php echo 'nul' ?></td>
	<td><?php echo $cit1['spl_name'] ?></td>
	<td><?php echo $dsg1['desg_name'] ?></td>
	<td><?php echo $row['ref_accno'] ?></td>
	<td><?php echo $row['ref_aname'] ?></td>	
	<td><?php echo $row['ref_procode'] ?></td></tr>
<?php
}
echo "</table>";
echo "</center>";
}
?>
</body>
</html>
