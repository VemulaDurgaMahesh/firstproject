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
              <a href="designationmaster_search.php">
                Search
              </a>
              </li>
                <li><a href="designationmastertable.php">View</a></li>              
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
$str="select * from designation_master where desg_code='".$_GET['t1']."' OR desg_name like '%".$_GET['t2']."%' ";
$result=$conn->query($str);
echo "<table border='1' class='act'>";
	echo "<tr><td>EDIT</td><td>DESIGNATION CODE</td><td>DESIGNATION NAME</td><td>DESIGNATION STATUS</td><td>CREATED BY</td><td>CREATED DATE</td><td>MODIFIED BY</td><td>MODIFIED DATE</td><td>DELETE STATUS</td></form></tr>";
    while($row = $result->fetch_assoc()) {
	echo "<tr><form action='designationmaster_edit.php' method='GET'><td><input type='submit' name='edit' value='edit'></td><td><input type='text' name='t1' id='t1' value='".$row['desg_code']."' readonly='readonly'><td><input type='text' name='t2' id='t2' value='".$row['desg_name']."' ></td><td><input type='text' name='t3' id='t3' value='".$row['desg_status']."' readonly='readonly'></td><td><input type='text' name='t4' id='t4' value='".$row['desg_createby']."' readonly='readonly'></td><td><input type='text' name='t5' id='t5' value='".$row['desg_createdate']."' readonly='readonly'></td><td><input type='text' name='t6' id='t6' value='".$row['desg_modifyby']."' readonly='readonly'></td><td><input type='text' name='t7' id='t7' value='".$row['desg_modifydate']."' readonly='readonly'></td><td><input type='text' name='t8' id='t8' value='".$row['delete_status']."' ></td></form></tr>";
}
echo "</table>";
?>  
</body>
</html>
