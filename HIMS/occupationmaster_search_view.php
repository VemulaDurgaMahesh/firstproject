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
              <a href="occupationmaster_search.php">
                Search
              </a>
              </li>
                <li><a href="occupationmastertable.php">View</a></li>               
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
$str="select * from occupation_master where occ_code='".$_GET['t1']."' OR occ_name like '%".$_GET['t2']."%' ";
$result=$conn->query($str);
echo "<table border='1' class='act'>";
	echo "<tr><td>EDIT</td><td>OCCUPATION CODE</td><td>OCCUPATION NAME</td><td>OCCUPATION CREATEDBY</td><td>OCCUPATION CREATEDDATE</td><td>OCCUPATION MODIFIED BY</td><td>OCCUPATION MODIFIED DATE</td><td>OCCUPATION STATUS</td><td>DELETE STATUS</td></form></tr>";
     while($row = $result->fetch_assoc()) {
	echo "<tr><form action='occupationmaster_edit.php' method='GET'><td><input type='submit' name='edit' value='edit'></td><td><input type='text' name='t1' id='t1' value='".$row['occ_code']."'></td><td><input type='text' name='t2' id='t2' value='".$row['occ_name']."'></td><td><input type='text' name='t3' id='t3' value='".$row['occ_createby']."' readonly='readonly'></td><td><input type='text' name='t4' id='t4' value='".$row['occ_createdate']."' readonly='readonly'></td><td><input type='text' name='t5' id='t5' value='".$row['occ_modifyby']."' readonly='readonly'></td><td><input type='text' name='t6' id='t6' value='".$row['occ_modifydate']."' readonly='readonly'></td><td><input type='text' name='t7' id='t7' value='".$row['occ_status']."' readonly='readonly'></td><td><input type='text' name='t8' id='t8' value='".$row['delete_status']."' readonly='readonly'></td></form></tr>";
}
echo "</table>";
?>  
</body>
</html>
