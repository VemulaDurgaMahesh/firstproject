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
$str="select * from denomination_master where WARDGRP_CODE='".$_GET['t7']."' OR WARDGRP_NAME like '%".$_GET['t1']."%' OR TARIFF_APPL='".$_GET['t2']."'";
$result=$conn->query($str);
echo "<table border=1>";
	echo "<tr><td>WARD GROUP CODE</td><td>WARD GROUP NAME</td><td>TARIFF APPLICATION</td><td>CREATED BY</td><td>CREATED DATE</td><td>MODIFIED BY</td><td>MODIFIED DATE</td><td>STATUS</td><td>EDIT</td></form></tr>";
    while($row = $result->fetch_assoc()) {
	echo "<tr><form action='wardgroupmaster_edit.php' method='GET'><td><input type='text' name='t7' id='t7' value='".$row['WARDGRP_CODE']."' readonly='readonly'><td><input type='text' name='t1' id='t1' value='".$row['WARDGRP_NAME']."' readonly='readonly'></td><td><input name='t2' id='t2' value='".$row['TARIFF_APPL']."' readonly='readonly'></td><td><input type='text' name='t3' id='t3' value='".$row['CREATED_BY']."' readonly='readonly'></td><td><input type='text' name='t4' id='t4' value='".$row['CREATED_TIME']."' readonly='readonly'></td><td><input type='text' name='t6' id='t6' value='".$row['MODIFIED_BY']."' readonly='readonly'></td><td><input type='text' name='t8' id='t8' value='".$row['MODIFIED_TIME']."' readonly='readonly'></td><td><input type='text' name='t5' id='t5' value='".$row['Status']."' ></td><td><input type='submit' name='edit' value='edit'></td></td></form></tr>";
}
echo "</table>";
?>  
</body>
</html>
