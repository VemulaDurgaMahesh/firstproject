<?php
session_start();
?>
<?php include('menu.php'); ?>
<html>
<body>
<form action="#" method="post">

<table border=1>
	<tr><td>DOCTOR CONSULTATION TYPE</td>
<td>DOCTOR  TYPE</td>
<td>DOCTOR  CODE</td>
<td>DOCTOR NAME</td>
<td>DOCTOR ALIAS NAME</td>
<td>DOCTOR SPECIALIZATION</td>
<td>DOCTOR DESIGNATION</td>
<td>DOCTOR DEPARTMENT</td>
<td>DOCTOR REGISTRATION </td>
<td>DOCTOR QUALIFICATION</td>
<td>DOCTOR DATE OF BIRTH</td>
<td>DOCTOR CONSULTING TYPE</td>
<td>DOCTOR PAYMENT TYPE</td>
<td>DOCTOR PAN CARD NUMBER</td>
<td>DOCTOR APPLICATION NUMBER</td>
<td>DOCTOR ACCOUNT NUMBER</td>
<td>DOCTOR ADDRESS</td>
<td>DOCTOR CITY</td>
<td>DOCTOR STATE </td>
<td>DOCTOR COUNTRY</td>
<td>DOCTOR PINCODE</td>
<td>DOCTOR MOBILE NUMBER</td>
<td>DOCTOR CONTACT PERSON</td>
<td>DOCTOR EMAIL ID</td>
<td>DOCTOR CREATEDBY</td>
<td>DOCTOR CREATEDDATE</td>
<td>DOCTOR MODIFYBY</td>
<td>DOCTOR MODIFYDATE</td>
<td>DOCTOR STATUS</td>
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
	$str="UPDATE doctor SET doc_ctype='".$_POST['t1']."',doc_drtype='".$_POST['t2']."',doc_drname='".$_POST['t4']."',doc_aname='".$_POST['t5']."',doc_speci='".$_POST['t6']."',doc_desig='".$_POST['t7']."',doc_dept='".$_POST['t8']."',doc_regis='".$_POST['t9']."',doc_quali='".$_POST['t10']."',doc_dob='".$_POST['t11']."',doc_cgtype='".$_POST['t12']."',doc_ptype='".$_POST['t13']."',doc_pan='".$_POST['t14']."',doc_appno='".$_POST['t15']."',doc_accno='".$_POST['t16']."',doc_addr='".$_POST['t17']."',doc_city='".$_POST['t18']."',doc_state='".$_POST['t19']."',doc_coun='".$_POST['t20']."',doc_pin='".$_POST['t21']."',doc_mob='".$_POST['t22']."',doc_cperson='".$_POST['t23']."',doc_email='".$_POST['t24']."',doc_status='".$_POST['t29']."' WHERE doc_drcode='".$_POST['t3']."'";
	$result=$conn->query($str);
	?>
	<script>
	window.location.href='doctable.php';
	</script>
	<?php
}

}
?>
</body>
</html>