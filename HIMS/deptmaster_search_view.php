
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
              <a href="deptmaster_search.php">
                Search
              </a>
              </li>
                <li><a href="deptmastertable.php">View</a></li>
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
$str="select * from department_master where dept_code='".$_GET['t1']."' OR dept_name like '%".$_GET['t2']."%'";
$result=$conn->query($str);
echo "<table border='1' class='act'>";
	echo "<tr><td>EDIT</td><td>DEPARTMENT CODE</td><td>DEPARTMENT NAME</td><td>DEPARTMENT STATUS</td><td>CREATED BY</td><td>CREATED DATE</td><td>MODIFIED BY</td><td>MODIFIED DATE</td><td>STATUS</td></form></tr>";
	
    while($row = $result->fetch_assoc()) {
	echo "<tr><form action='departmentmaster_edit.php' method='GET'><td><input type='submit' name='edit' value='edit'></td><td><input type='text' name='t1' id='t1' value='".$row['dept_code']."' readonly='readonly'><td><input type='text' name='t2' id='t2' value='".$row['dept_name']."'></td><td><input type='text' name='t3' id='t3' value='".$row['dept_status']."' readonly='readonly'></td><td><input type='text' name='t4' id='t4' value='".$row['dept_createby']."' readonly='readonly'></td><td><input type='text' name='t5' id='t5' value='".$row['dept_createdate']."' readonly='readonly'></td><td><input type='text' name='t6' id='t6' value='".$row['dept_modifyby']."' readonly='readonly'></td><td><input type='text' name='t7' id='t7' value='".$row['dept_modifydate']."' readonly='readonly'></td><td><input type='text' name='t8' id='t8' value='".$row['dept_status']."' ></td></form></tr>";
}
echo "</table>";
?>  
</body>
</html>
