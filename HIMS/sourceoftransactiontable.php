<?php
session_start();
?>
<?php include('menu.php'); ?>
<html>
<body>
<form action="specializationtable_edit.php" method="get">
<?php 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hospital";


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$str="select * from soc_masters";
$result=$conn->query($str);
echo "<table border=1>";
	echo "<tr><td>EDIT</td><td>soc_type</td><td>soc_code</td><td>soc_tariffname</td><td>soc_servicegroupname</td><td>soc_billinghead</td><td>soc_servicename</td><td>soc_servicecode</td><td>soc_charge</td><td>soc_hospitalper</td><td>soc_hospitalcharge</td><td>soc_doctorper</td><td>soc_doctorcharge</td><td>soc_instructions</td><td>soc_applicationfor</td><td>soc_createdby</td><td>soc_createdtime</td><td>soc_modifiedby</td><td>soc_modifiedtime</td><td>soc_status</td></form></tr>";
																									
    while($row = $result->fetch_assoc()) {
		$str1="select * from tariff_master t,soc_masters s where s.soc_tariffname=t.tariff_code and s.soc_tariffname='".$row['soc_tariffname']."'";
		$result1=$conn->query($str1);
		$row1 = $result1->fetch_assoc();
		$str2="select * from billing b,soc_masters s where s.soc_billinghead=b.billing_sno and s.soc_billinghead='".$row['soc_billinghead']."'";
		$result2=$conn->query($str2);
		$row2 = $result2->fetch_assoc();
	echo "<tr><form action='specializationmaster_edit.php' method='GET'><td><input type='submit' name='edit' value='edit'></td><td><input type='text' name='t7' id='t7' value='".$row['soc_type']."' readonly='readonly'><td><input type='text' name='t1' id='t1' value='".$row['soc_code']."' readonly='readonly'></td><td><input name='t2' id='t2' value='".$row1['tariff_name']."' readonly='readonly'></td><td><input type='text' name='t3' id='t3' value='".$row['soc_servicegroupname']."' readonly='readonly'></td><td><input type='text' name='t4' id='t4' value='".$row2['billing_header']."' readonly='readonly'></td><td><input type='text' name='t6' id='t6' value='".$row['soc_servicename']."' readonly='readonly'></td><td><input type='text' name='t8' id='t8' value='".$row['soc_servicecode']."' readonly='readonly'></td><td><input type='text' name='t5' id='t5' value='".$row['soc_charge']."' ></td><td><input type='text' name='t5' id='t5' value='".$row['soc_hospitalper']."' ></td><td><input type='text' name='t5' id='t5' value='".$row['soc_hospitalcharge']."' ></td><td><input type='text' name='t5' id='t5' value='".$row['soc_doctorper']."' ></td><td><input type='text' name='t5' id='t5' value='".$row['soc_doctorcharge']."' ></td><td><input type='text' name='t5' id='t5' value='".$row['soc_instructions']."' ></td><td><input type='text' name='t5' id='t5' value='".$row['soc_applicationfor']."' ></td><td><input type='text' name='t5' id='t5' value='".$row['soc_createdby']."' ></td><td><input type='text' name='t5' id='t5' value='".$row['soc_createdtime']."' ></td><td><input type='text' name='t5' id='t5' value='".$row['soc_modifiedby']."' ></td><td><input type='text' name='t5' id='t5' value='".$row['soc_modifiedtime']."' ></td><td><input type='text' name='t5' id='t5' value='".$row['soc_status']."' ></td></form></tr>";
} 																																			                                                                                                                          																																																																																																																																																																				 																																																							       																																																																																																																																																				
echo "</table>";
?>  
</form>
</body>
</html>