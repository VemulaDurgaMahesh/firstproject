<?php
session_start();
?>
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
              <a href="wardmaster_search.php">
                Search
              </a>
              </li>
                <li><a href="wardmastertable.php">View</a></li>                
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
$str="select * from ward_master where  WARD_NAME like '%".$_GET['t2']."%'";
$result=$conn->query($str);
echo "<table border=1 class='act'>";
	echo "<tr><td>EDIT</td><td>WARD CODE</td><td>WARD NAME</td><td>WARD GROUP CODE</td><td>WARD GROUP NAME</td><td>WARD TARIFF</td><td>CREATED BY</td><td>CREATED DATE</td><td>MODIFIED BY</td><td>MODIFIED DATE</td><td>WARD ACTIVE</td></form></tr>";
    while($row = $result->fetch_assoc()) {
	echo "<tr><form action='wardmaster_edit.php' method='GET'><td><input type='submit' name='edit' value='edit'></td><td><input type='text' name='t1' id='t1' value='".$row['WARD_CODE']."'></td><td><input type='text' name='t2' id='t2' value='".$row['WARD_NAME']."'></td><td><input name='t3' id='t3' value='".$row['WARD_GRPCODE']."'></td><td><input name='t4' id='t4' value='".$row['WARD_GRPNAME']."'></td><td><input name='t5' id='t5' value='".$row['WARD_TARIFF']."' readonly='readonly'></td><td><input type='text' name='t6' id='t6' value='".$row['WARD_CREATEDBY']."' readonly='readonly'></td><td><input type='text' name='t7' id='t7' value='".$row['WARD_CREATEDTIME']."' readonly='readonly'></td><td><input type='text' name='t8' id='t8' value='".$row['WARD_MODIFIEDBY']."' readonly='readonly'></td><td><input type='text' name='t9' id='t9' value='".$row['WARD_MODIFIEDTIME']."' readonly='readonly'></td><td><input type='text' name='t10' id='t10' value='".$row['WARD_ACTIVE']."' ></td></form></tr>";
}
echo "</table>";
?>  
</body>
</html>
