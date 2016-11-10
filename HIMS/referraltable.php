<?php
session_start();
?>
<html>
<body>
<form action="#" method="post">
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
$str="select * from referral";
$result=$conn->query($str);
echo "<table border=1>";
	echo "<tr><td>REF_RTYPE</td><td>REF_RFCODE</td><td>REF_RNAME</td><td>REF_ANAME</td><td>REF_SPECI</td><td>REF_DESIG</td><td>REF_DEPT</td><td>REF_REG</td><td>REF_QUALI</td><td>REF_DOB</td><td>REF_PROCODE</td><td>REF_INPAT</td><td>REF_INV</td><td>REF_OP</td><td>REF_PANNO</td><td>REF_ACCNO</td><td>REF_ADDR</td><td>REF_CITY</td><td>REF_STATE</td><td>REF_COUN</td><td>REF_PIN</td><td>REF_MOB</td><td>REF_CPERSON</td><td>REF_EMAIL</td><td>REF_CREATEDBY</td><td>REF_CREATEDDATE</td><td>REF_MODIFIEDBY</td><td>REF_MODIFIEDDATE</td><td>REF_STATUS</td><td>EDIT</td><td>DELETE</td></form></tr>";
    while($row = $result->fetch_assoc()) {
	echo "<tr><form action='#' method='post'><td><input type='text' name='t1' id='t1' value='".$row['ref_rtype']."' ></td><td><input type='text' name='t2' id='t2' value='".$row['ref_rfcode']."' readonly='readonly'></td><td><input type='text' name='t3' id='t3' value='".$row['ref_rname']."' ></td><td><input type='text' name='t4' id='t4' value='".$row['ref_aname']."' ></td><td><input type='text' name='t5' id='t5' value='".$row['ref_speci']."' ></td><td><input type='text' name='t6' id='t6' value='".$row['ref_desig']."' ></td><td><input type='text' name='t7' id='t7' value='".$row['ref_dept']."' ></td><td><input type='text' name='t8' id='t8' value='".$row['ref_reg']."' ></td><td><input type='text' name='t9' id='t9' value='".$row['ref_quali']."' ></td><td><input type='text' name='t10' id='t10' value='".$row['ref_dob']."' ></td><td><input type='text' name='t11' id='t11' value='".$row['ref_procode']."' ></td><td><input type='text' name='t12' id='t12' value='".$row['ref_inpat']."' ></td><td><input type='text' name='t13' id='t13' value='".$row['ref_inv']."' ></td><td><input type='text' name='t14' id='t14' value='".$row['ref_op']."' ></td><td><input type='text' name='t15' id='t15' value='".$row['ref_panno']."' ></td><td><input type='text' name='t16' id='t16' value='".$row['ref_accno']."' ></td><td><input type='text' name='t17' id='t17' value='".$row['ref_addr']."' ></td><td><input type='text' name='t18' id='t18' value='".$row['ref_city']."' ></td><td><input type='text' name='t19' id='t19' value='".$row['ref_state']."' ></td><td><input type='text' name='t20' id='t20' value='".$row['ref_coun']."' ></td><td><input type='text' name='t21' id='t21' value='".$row['ref_pin']."' ></td><td><input type='text' name='t22' id='t22' value='".$row['ref_mob']."' ></td><td><input type='text' name='t23' id='t23' value='".$row['ref_cperson']."' ></td><td><input type='text' name='t24' id='t24' value='".$row['ref_email']."' ></td><td><input type='text' name='t25' id='t25' value='".$row['ref_createdby']."' ></td><td><input type='text' name='t26' id='t26' value='".$row['ref_createddate']."' ></td><td><input type='text' name='t27' id='t27' value='".$row['ref_modifiedby']."' ></td><td><input type='text' name='t28' id='t28' value='".$row['ref_modifieddate']."' ></td><td><input type='text' name='t29' id='t29' value='".$row['ref_status']."' ></td><td><input type='submit' name='edit' value='edit'></td><td><input type='submit' name='del' value='delete'></td></form></tr>";
}
echo "</table>";
?>  
</form>
</body>
</html>
<?php
if($_SERVER['REQUEST_METHOD']=='POST')
{
	$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hospital";
$count=1;

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
if(isset($_POST['edit']))
{
	$str="UPDATE referral SET ref_rtype='".$_POST['t1']."',ref_rname='".$_POST['t3']."',ref_aname='".$_POST['t4']."',ref_speci='".$_POST['t5']."',ref_desig='".$_POST['t6']."',ref_dept='".$_POST['t7']."',ref_reg='".$_POST['t8']."',ref_quali='".$_POST['t9']."',ref_dob='".$_POST['t10']."',ref_procode='".$_POST['t11']."',ref_inpat='".$_POST['t12']."',ref_inv='".$_POST['t13']."',ref_op='".$_POST['t14']."',ref_panno='".$_POST['t15']."',ref_accno='".$_POST['t16']."',ref_addr='".$_POST['t17']."',ref_city='".$_POST['t18']."',ref_state='".$_POST['t19']."',ref_coun='".$_POST['t20']."',ref_pin='".$_POST['t21']."',ref_mob='".$_POST['t22']."',ref_cperson='".$_POST['t23']."',ref_email='".$_POST['t24']."',ref_createdby='".$_POST['t25']."',ref_createddate='".$_POST['t26']."',ref_modifiedby='".$_POST['t27']."',ref_modifieddate='".$_POST['t28']."',ref_status='".$_POST['t29']."' WHERE ref_rfcode='".$_POST['t2']."'";
	$result=$conn->query($str);
	//header("location:doctortable.php");
		
}
if(isset($_POST['del']))
{
	$str="DELETE FROM referral WHERE ref_rfcode='".$_POST['t2']."'";
	$result=$conn->query($str);
	//header("location:doctortable.php");
	
}
}
?>