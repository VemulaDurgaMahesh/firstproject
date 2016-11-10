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
$str="select * from doctor";
$result=$conn->query($str);
echo "<table border=1>";
	echo "<tr><td>doc_ctype</td><td>doc_drtype</td><td>doc_drcode</td><td>doc_drname</td><td>doc_aname</td><td>doc_speci</td><td>doc_desig</td><td>doc_dept</td><td>doc_regis</td><td>doc_quali</td><td>doc_dob</td><td>doc_cgtype</td><td>doc_ptype</td><td>doc_pan</td><td>doc_appno</td><td>doc_accno</td><td>doc_addr</td><td>doc_city</td><td>doc_state</td><td>doc_coun</td><td>doc_pin</td><td>doc_mob</td><td>doc_cperson</td><td>doc_email</td><td>doc_createdby</td><td>doc_createdate</td><td>doc_modifyby</td><td>doc_modifydate</td><td>doc_status</td><td>EDIT</td><td>DELETE</td></form></tr>";
    while($row = $result->fetch_assoc()) {
	echo "<tr><form action='#' method='post'><td><input type='text' name='t1' id='t1' value='".$row['doc_ctype']."' ></td><td><input type='text' name='t2' id='t2' value='".$row['doc_drtype']."' ></td><td><input name='t3' id='t3' value='".$row['doc_drcode']."' readonly='readonly' ></td><td><input type='text' name='t4' id='t4' value='".$row['doc_drname']."' ></td><td><input type='text' name='t5' id='t5' value='".$row['doc_aname']."' ></td><td><input type='text' name='t6' id='t6' value='".$row['doc_speci']."' ></td><td><input type='text' name='t7' id='t7' value='".$row['doc_desig']."' ></td><td><input type='text' name='t8' id='t8' value='".$row['doc_dept']."' ></td><td><input type='text' name='t9' id='t9' value='".$row['doc_regis']."' ></td><td><input type='text' name='t10' id='t10' value='".$row['doc_quali']."' ></td><td><input type='text' name='t11' id='t11' value='".$row['doc_dob']."' ></td><td><input type='text' name='t12' id='t12' value='".$row['doc_cgtype']."' ></td><td><input type='text' name='t13' id='t13' value='".$row['doc_ptype']."' ></td><td><input type='text' name='t14' id='t14' value='".$row['doc_pan']."' ></td><td><input type='text' name='t15' id='t15' value='".$row['doc_appno']."' ></td><td><input type='text' name='t17' id='t17' value='".$row['doc_accno']."' ></td><td><input type='text' name='t18' id='t18' value='".$row['doc_addr']."' ></td><td><input type='text' name='t19' id='t19' value='".$row['doc_city']."' ></td><td><input type='text' name='t20' id='t20' value='".$row['doc_state']."' ></td><td><input type='text' name='t21' id='t21' value='".$row['doc_coun']."' ></td><td><input type='text' name='t22' id='t22' value='".$row['doc_pin']."' ></td><td><input type='text' name='t23' id='t23' value='".$row['doc_mob']."' ></td><td><input type='text' name='t24' id='t24' value='".$row['doc_cperson']."' ></td><td><input type='text' name='t25' id='t25' value='".$row['doc_email']."' ></td><td><input type='text' name='t26' id='t26' value='".$row['doc_createdby']."' ></td><td><input type='text' name='t27' id='t27' value='".$row['doc_createdate']."' ></td><td><input type='text' name='t28' id='t28' value='".$row['doc_modifyby']."' ></td><td><input type='text' name='t29' id='t29' value='".$row['doc_modifydate']."' ></td><td><input type='text' name='t30' id='t30' value='".$row['doc_status']."' ></td><td><input type='submit' name='edit' value='edit'></td><td><input type='submit' name='del' value='delete'></td></form></tr>";
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
	$str="UPDATE doctor SET doc_status='".$_POST['t30']."' WHERE doc_drcode='".$_POST['t3']."'";
	$result=$conn->query($str);
	//header("location:doctortable.php");
		
}
if(isset($_POST['del']))
{
	$str="DELETE FROM doctor WHERE doc_drcode='".$_POST['t3']."'";
	$result=$conn->query($str);
	//header("location:doctortable.php");
	
}
}
?>