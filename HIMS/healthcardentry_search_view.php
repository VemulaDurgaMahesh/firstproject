<?php
session_start();
?>
<?php include('menu.php'); ?>
<html>
<body>
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
$str="select * from health_cards where ID='".$_GET['t1']."' OR card_code='".$_GET['t2']."' OR card_name='".$_GET['t3']."' OR card_maxno='".$_GET['t4']."' OR includeallmembers='".$_GET['t5']."' OR validyears='".$_GET['t6']."' OR validdays='".$_GET['t7']."' OR cardamount='".$_GET['t8']."' OR autoprefix='".$_GET['t9']."' OR conc_registration='".$_GET['t10']."' OR conc_consultations='".$_GET['t11']."' OR conc_opbilling='".$_GET['t12']."' OR ip_servicecharges='".$_GET['t13']."' OR ip_consultationandprofessional='".$_GET['t14']."' OR ip_investigation='".$_GET['t15']."' OR ip_proceduralcharges='".$_GET['t16']."' OR ip_wardcharges='".$_GET['t17']."' OR ip_pharmacychrges='".$_GET['t18']."' OR createdby='".$_GET['t22']."' OR createddate='".$_GET['t23']."' OR modifiedby='".$_GET['t24']."' OR modifieddate='".$_GET['t25']."' OR status='".$_GET['t26']."'";
$result=$conn->query($str);
echo "<table border=1>";
echo "<tr><td>EDIT</td><td>ID</td><td>CARD TYPE CD</td><td>CARD TYPE NAME</td><td>MAX MEMBERS</td><td>INCLUDE ALL NUMBERS</td><td>VALID YEARS</td><td>VALID DAYS</td><td>CARD AMOUNT</td><td>AUTO PREFIX</td><td>REGISTRATIONS</td><td>CONSULTATIONS</td><td>OP BUILDING</td><td>IP SERVICE CHARGES</td><td>IP CONSULTATION AND PROFESSIONAL CHARGES</td><td>IP INVESTIGATION CHARGES</td><td>IP PROCEDURE CHARGES</td><td>IP WARD CHARGES</td><td>PHARMACY CHARGES</td><td> CREATEDBY</td><td> CREATEDATE</td><td> MODIFIEDBY</td><td> MODIFIEDDATE</td><td> STATUS</td></tr>";
    while($row = $result->fetch_assoc()) {
	echo "<tr><form action='healthcardentry_edit.php' method='GET'><td>
	<input type='submit' name='edit' value='edit'></td>
	<td><input type='text' name='t1' id='t1' value='".$row['ID']."'></td>
	<td><input type='text' name='t2' id='t2' value='".$row['card_code']."' readonly='readonly'></td>
	<td><input name='t3' id='t3' value='".$row['card_name']."'></td>
	<td><input name='t4' id='t4' value='".$row['card_maxno']."'></td>
	<td><input name='t5' id='t5' value='".$row['includeallmembers']."'></td>
	<td><input name='t6' id='t6' value='".$row['validyears']."'></td>
	<td><input name='t7' id='t7' value='".$row['validdays']."'></td>
	<td><input name='t8' id='t8' value='".$row['cardamount']."'></td>
	<td><input name='t9' id='t9' value='".$row['autoprefix']."'></td>
	<td><input name='t10' id='t10' value='".$row['conc_registration']."'></td>
	<td><input name='t11' id='t11' value='".$row['conc_consultations']."'></td>
	<td><input name='t12' id='t12' value='".$row['conc_opbilling']."'></td>
	<td><input name='t13' id='t13' value='".$row['ip_servicecharges']."'></td>
	<td><input name='t14' id='t14' value='".$row['ip_consultationandprofessional']."'></td>
	<td><input name='t15' id='t15' value='".$row['ip_investigation']."'></td>
	<td><input name='t16' id='t16' value='".$row['ip_proceduralcharges']."'></td>
	<td><input name='t17' id='t17' value='".$row['ip_wardcharges']."'></td>
	<td><input name='t18' id='t18' value='".$row['ip_pharmacychrges']."'></td>
	<td><input name='t22' id='t22' value='".$row['createdby']."'></td>
	<td><input name='t23' id='t23' value='".$row['createddate']."'></td>
	<td><input name='t24' id='t24' value='".$row['modifiedby']."'></td>
	<td><input name='t25' id='t25' value='".$row['modifieddate']."'></td>
	<td><input name='t26' id='t26 value=''".$row['status']."'></td></form></tr>";
}
echo "</table>";
?>  
</body>
</html>
