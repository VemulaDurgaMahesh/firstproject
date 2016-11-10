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

if(isset($_POST['sn']))
	{
		$x=$_POST['sn'];
$str=mysql_query("SELECT * from package_master WHERE pm_tariffcode='$x'");
}
else
{
	$str=mysql_query("SELECT * from package_master");
}
echo "<table border='1'>";
	echo "<tr>
	<td>S.no</td>
	<td>District Code</td>
	<td>District Name</td>	
	<td>State</td>
	<td>Country</td>
	<td>Status</td>
	</tr>";
	$i=1;
    while($row = mysql_fetch_array($str)) {
   	?>
	<tr>	
	<td><?php echo $i++ ?></td>
	<td><?php  echo $row['pm_tariffcode'] ?></td>
	<td><?php  echo $row['pm_pkgname'] ?></td>
	<td><?php echo $row['pm_pkgdesigncode'] ?></td>
	<td><?php echo $row['pm_pkgtype'] ?></td>
	<td><?php echo $row['pm_pkgduration'] ?></td>
	
<?php
}
echo "</table>";

}

elseif(isset($_POST["export"]))
{
	if(isset($_POST['t1']))
	{

$str=mysql_query("SELECT * from package_master WHERE district_name like '%".$_POST['t1']."%'");
}
else
{
	$str=mysql_query("SELECT * from package_master");
}
$output .='<table class="table" bordered="1">
	<tr>
	<td>S.no</td>
	<td>District Code</td>
	<td>District Name</td>
	<td>State</td>
	<td>Country</td>
	<td>Status</td>
	
	</tr>';
	$i=1;
    while($row = mysql_fetch_array($str)) {

		$output .='	<tr>
		<td> '.$i++ .'</td>
		<td> '.$row['district_code'].'</td>		
		<td> '.$row['district_name'].'</td>
	<td>'.$dis1['state_name'].'</td>
	<td>'.$ct1['country_name'].'</td>
	<td>'.$row['district_status'].'</td>
		</tr>';		

		}
		$output .= '</table>';
			header("Content-Type: application/xls");
			header("Content-Disposition: attachment; filename=districts.xls");
			echo $output;
}

elseif(isset($_POST['print']))
{

}
?>
</body>
</html>
