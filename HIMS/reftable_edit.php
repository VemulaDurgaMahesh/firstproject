<?php
session_start();
?>
<?php include('menu.php'); ?>
<html>
<body>
<form action="#" method="post">

<table border=1>
	<tr><td>REFFERENCE TYPE</td>
<td>REFFERENCE CODE</td>
<td>REFFERENCE NAME</td>
<td>REFFERENCE ALIAS NAME</td>
<td>REFFERENCE SPECIALIZATION</td>
<td>REFFERENCE DESIGNATION</td>
<td>REFFERENCE DEPARTMENT</td>
<td>REFFERENCE REGINATAION</td>
<td>REFFERENCE QUALIFICATION</td>
<td>REFFERENCE DATE OF BIRTH</td>
<td>REFFERENCE PRO CODE</td>
<td>REFFERENCE IN PATIENT</td>
<td>REFFERENCE INVESTIGATION</td>
<td>REFFERENCE OP CONSULTATIONS</td>
<td>REFFERENCE PAN NUMBER</td>
<td>REFFERENCE ACCOUNT NO</td>
<td>REFFERENCE ADDRESS</td>
<td>REFFERENCE CITY</td>
<td>REFFERENCE STATE</td>
<td>REFFERENCE COUNTRY</td>
<td>REFFERENCE PINCODE</td>
<td>REFFERENCE MOBILE NUMBER</td>
<td>REFFERENCE CONTACT PERSON</td>
<td>REFFERENCE EMAIL</td>
<td>REFFERENCE CREATED BY</td>
<td>REFFERENCE CREATED DATE</td>
<td>REFFERENCE MODIFIED BY</td>
<td>REFFERENCE MODIFIED DATE</td>
<td>REFFERENCE STATUS</td>


<td>EDIT</td></form></tr>
    <?php
	echo "<tr><form action='#' method='post'><td><input type='text' name='t1' id='t1'value='".$_GET['t1']."'></td>
<td><input type='text' name='t2' id='t2'value='".$_GET['t2']."'></td>
<td><input type='text' name='t3' id='t3'value='".$_GET['t3']."'></td>
<td><input type='text' name='t4' id='t4'value='".$_GET['t4']."'></td>
<td><input type='text' name='t5' id='t5'value='".$_GET['t5']."'></td>
<td><input type='text' name='t6' id='t6'value='".$_GET['t6']."'></td>
<td><input type='text' name='t7' id='t7'value='".$_GET['t7']."'></td>
<td><input type='text' name='t8' id='t8'value='".$_GET['t8']."'></td>
<td><input type='text' name='t9' id='t9'value='".$_GET['t9']."'></td>
<td><input type='text' name='t10' id='t10'value='".$_GET['t10']."'></td>
<td><input type='text' name='t11' id='t11'value='".$_GET['t11']."'></td>
<td><input type='text' name='t12' id='t12'value='".$_GET['t12']."'></td>
<td><input type='text' name='t13' id='t13'value='".$_GET['t13']."'></td>
<td><input type='text' name='t14' id='t14'value='".$_GET['t14']."'></td>
<td><input type='text' name='t15' id='t15'value='".$_GET['t15']."'></td>
<td><input type='text' name='t16' id='t16'value='".$_GET['t16']."'></td>
<td><input type='text' name='t17' id='t17'value='".$_GET['t17']."'></td>
<td><input type='text' name='t18' id='t18'value='".$_GET['t18']."'></td>
<td><input type='text' name='t19' id='t19'value='".$_GET['t19']."'></td>
<td><input type='text' name='t20' id='t20'value='".$_GET['t20']."'></td>
<td><input type='text' name='t21' id='t21'value='".$_GET['t21']."'></td>
<td><input type='text' name='t22' id='t22'value='".$_GET['t22']."'></td>
<td><input type='text' name='t23' id='t23'value='".$_GET['t23']."'></td>
<td><input type='text' name='t24' id='t24'value='".$_GET['t24']."'></td>
<td><input type='text' name='t25' id='t25'value='".$_GET['t25']."'></td>
<td><input type='text' name='t26' id='t26'value='".$_GET['t26']."'></td>
<td><input type='text' name='t27' id='t27'value='".$_GET['t27']."'></td>
<td><input type='text' name='t28' id='t28'value='".$_GET['t28']."'></td>
<td><input type='text' name='t29' id='t29'value='".$_GET['t29']."'></td>

<td><input type='submit' name='ed' value='edit'></td></td></form></tr>";?>
</table>
</form>

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
if(isset($_POST['ed']))
{
	$str="UPDATE referral SET ref_rtype='".$_POST['t1']."',ref_rname='".$_POST['t3']."',ref_aname='".$_POST['t4']."',ref_speci='".$_POST['t5']."',ref_desig='".$_POST['t6']."',ref_dept='".$_POST['t7']."',ref_reg='".$_POST['t8']."',ref_quali='".$_POST['t9']."',ref_dob='".$_POST['t10']."',ref_procode='".$_POST['t11']."',ref_inpat='".$_POST['t12']."',ref_inv='".$_POST['t13']."',ref_op='".$_POST['t14']."',ref_panno='".$_POST['t15']."',ref_accno='".$_POST['t16']."',ref_addr='".$_POST['t17']."',ref_city='".$_POST['t18']."',ref_state='".$_POST['t19']."',ref_coun='".$_POST['t20']."',ref_pin='".$_POST['t21']."',ref_mob='".$_POST['t22']."',ref_cperson='".$_POST['t23']."',ref_email='".$_POST['t24']."',ref_createdby='".$_POST['t25']."',ref_createddate='".$_POST['t26']."',ref_modifiedby='".$_POST['t27']."',ref_modifieddate='".$_POST['t28']."',ref_status='".$_POST['t29']."' WHERE ref_rfcode='".$_POST['t2']."'";
	$result=$conn->query($str);
	?>
	<script>
	window.location.href='reftable.php';
	</script>
	<?php
}

}
?>
</body>
</html>