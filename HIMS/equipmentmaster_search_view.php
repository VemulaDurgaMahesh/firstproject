<?php include('menu.php'); ?>
<html>
<style>
    .act { color:#F00; }
    .act1 {color:#2E2EFE;} 
</style>
<body>
		<p>
		<div>
<ul class="drop_menu">
               <li>
              <a href="equipmentmaster_search.php">
                Search
              </a>
              </li>
                <li><a href="equipmentmastertable.php">View</a></li>               
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
$str="select * from equipment_master where eqp_name like '%".$_GET['t2']."%' ";
$result=$conn->query($str);
echo "<table border=1 class='act'>";
	echo "<tr><td>EDIT</td><td>EQUIPMENT GROUP NAME</td><td>EQUIPMENT CODE</td><td>EQUIPMENT NAME</td><td>EQUIPMENT STATUS</td><td>CREATED BY</td><td>CREATED DATE</td><td>MODIFIED BY</td><td>MODIFIED DATE</td><td>EQUIPMENT LEVEL</td><td>EQUIPMENT BLOCK</td><td>EQUIPMENT WING</td><td>EXTENSION NUMBER</td></form></tr>";
     while($row = $result->fetch_assoc()) {
	echo "<tr><form action='equipmentmaster_edit.php' method='GET'><td><input type='submit' name='edit' value='edit'></td><td><input type='text' name='t12' id='t12' value='".$row['eqp_groupname']."' ></td><td><input type='text' name='t1' id='t1' value='".$row['eqp_code']."' readonly='readonly'><td><input type='text' name='t2' id='t2' value='".$row['eqp_name']."' ></td><td><input type='text' name='t3' id='t3' value='".$row['eqp_status']."' readonly='readonly'></td><td><input type='text' name='t4' id='t4' value='".$row['eqp_createdby']."' readonly='readonly'></td><td><input type='text' name='t5' id='t5' value='".$row['eqp_createddate']."' readonly='readonly'></td><td><input type='text' name='t6' id='t6' value='".$row['eqp_modifyby']."' readonly='readonly'></td><td><input type='text' name='t7' id='t7' value='".$row['eqp_modifydate']."' readonly='readonly'></td><td><input type='text' name='t8' id='t8' value='".$row['eqp_level']."' ></td><td><input type='text' name='t9' id='t9' value='".$row['eqp_block']."' ></td><td><input type='text' name='t10' id='t10' value='".$row['eqp_wing']."' ></td><td><input type='text' name='t11' id='t11' value='".$row['eqp_extensionno']."' ></td></form></tr>";
}
echo "</table>";
?>  
</body>
</html>
