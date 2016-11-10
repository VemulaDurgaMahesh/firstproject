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
              <a href="servicegrouptable_search.php">
                Search
              </a>
              </li>
                <li><a href="servicegrouptable.php">View</a></li>              
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
$str="select * from servicegroup_master where servicegroup_code='".$_GET['t7']."' OR servicegroup_name like '%".$_GET['t1']."%'";
$result=$conn->query($str);
echo "<table border=1 class='act'>";
	echo "<tr><td>EDIT</td><td>SERVICE GROUP CODE</td><td>SERVICE GROUP NAME</td><td>SERVICE GROUP DPT CODE</td><td>SERVICE GROUP STATUS</td><td>SERVICE GROUP CREATED BY</td><td>SERVICE GROUP CREATED NAME</td><td>SEVICE GROUP MODIFY BY</td><td>SERVICE GROUP MODIFY DATE</td></form></tr>";
    while($row = $result->fetch_assoc()) {
	echo "<tr><form action='servicegroup_master_edit.php' method='GET'><td><input type='submit' name='edit' value='edit'></td><td><input type='text' name='t7' id='t7' value='".$row['servicegroup_code']."' readonly='readonly'><td><input type='text' name='t1' id='t1' value='".$row['servicegroup_name']."' readonly='readonly'></td><td><input name='t2' id='t2' value='".$row['servicegroup_dptcode']."' readonly='readonly'></td><td><input type='text' name='t4' id='t4' value='".$row['servicegroup_status']."' readonly='readonly'></td><td><input type='text' name='t6' id='t6' value='".$row['servicegroup_createdby']."' readonly='readonly'></td><td><input type='text' name='t8' id='t8' value='".$row['servicegroup_createdname']."' readonly='readonly'></td><td><input type='text' name='t5' id='t5' value='".$row['servicegroup_modifyby']."' ></td><td><input type='text' name='t9' id='t9' value='".$row['servicegroup_modifydate']."' ></td></form></tr>";
}
echo "</table>";
?>  
</body>
</html>