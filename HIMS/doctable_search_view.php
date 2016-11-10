<?php include('menu.php'); ?>
<html>
<style>
    .act { color:#F00; }
</style>
<body>
<p>
		<div>
<ul class="drop_menu">
               <li>
              <a href="doctable_search.php">
                Search
              </a>
              </li>
                <li><a href="doctable.php">View</a></li>               
				  </ul>
				  </div>
</p>
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
$str="select * from doctor where doc_drname like'%".$_GET['t4']."%' ";
$result=$conn->query($str);
echo "<table border='1' class='act'>";
	echo "<tr>
<td>EDIT</td>
<td>DOCTOR CONSULTATION TYPE</td>
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
</form></tr>";
    while($row = $result->fetch_assoc()) {
	echo "<tr><form action='doctormaster_edit.php' method='get'>
<td><input type='submit' name='edit' value='edit'></td>
<td><input type='text' name='t1' id='t1' value='".$row['doc_ctype']."' readonly='readonly'></td>
<td><input type='text' name='t2' id='t2' value='".$row['doc_drtype']."' readonly='readonly'></td>
<td><input type='text' name='t3' id='t3' value='".$row['doc_drcode']."' readonly='readonly'></td>
<td><input type='text' name='t4' id='t4' value='".$row['doc_drname']."' readonly='readonly'></td>
<td><input type='text' name='t5' id='t5' value='".$row['doc_aname']."' readonly='readonly'></td>
<td><input type='text' name='t6' id='t6' value='".$row['doc_speci']."' readonly='readonly'></td>
<td><input type='text' name='t7' id='t7' value='".$row['doc_desig']."' readonly='readonly'></td>
<td><input type='text' name='t8' id='t8' value='".$row['doc_dept']."' readonly='readonly'></td>
<td><input type='text' name='t9' id='t9' value='".$row['doc_regis']."' readonly='readonly'></td>
<td><input type='text' name='t10' id='t10' value='".$row['doc_quali']."' readonly='readonly'></td>
<td><input type='text' name='t11' id='t11' value='".$row['doc_dob']."' readonly='readonly'></td>
<td><input type='text' name='t12' id='t12' value='".$row['doc_cgtype']."' readonly='readonly'></td>
<td><input type='text' name='t13' id='t13' value='".$row['doc_ptype']."' readonly='readonly'></td>
<td><input type='text' name='t14' id='t14' value='".$row['doc_pan']."' readonly='readonly'></td>
<td><input type='text' name='t15' id='t15' value='".$row['doc_appno']."' readonly='readonly'></td>
<td><input type='text' name='t16' id='t16' value='".$row['doc_accno']."' readonly='readonly'></td>
<td><input type='text' name='t17' id='t17' value='".$row['doc_addr']."' readonly='readonly'></td>
<td><input type='text' name='t18' id='t18' value='".$row['doc_city']."' readonly='readonly'></td>
<td><input type='text' name='t19' id='t19' value='".$row['doc_state']."' readonly='readonly'></td>
<td><input type='text' name='t20' id='t20' value='".$row['doc_coun']."' readonly='readonly'></td>
<td><input type='text' name='t21' id='t21' value='".$row['doc_pin']."' readonly='readonly'></td>
<td><input type='text' name='t22' id='t22' value='".$row['doc_mob']."' readonly='readonly'></td>
<td><input type='text' name='t23' id='t23' value='".$row['doc_cperson']."' readonly='readonly'></td>
<td><input type='text' name='t24' id='t24' value='".$row['doc_email']."' readonly='readonly'></td>
<td><input type='text' name='t25' id='t25' value='".$row['doc_createdby']."' readonly='readonly'></td>
<td><input type='text' name='t26' id='t26' value='".$row['doc_createdate']."' readonly='readonly'></td>
<td><input type='text' name='t27' id='t27' value='".$row['doc_modifyby']."' readonly='readonly'></td>
<td><input type='text' name='t28' id='t28' value='".$row['doc_modifydate']."' readonly='readonly'></td>
<td><input type='text' name='t29' id='t29' value='".$row['doc_status']."' readonly='readonly'></td></form></tr>";
}
echo "</table>";
?>  
</body>
</html>
