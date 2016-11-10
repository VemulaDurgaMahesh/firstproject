
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
              <a href="nursemaster_search.php">
                Search
              </a>
              </li>
                <li><a href="nursemastertable.php">View</a></li>
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
$str="SELECT * from nurse_master where ns_name like '%".$_GET['t2']."%' ";
$result=$conn->query($str);
echo "<table border=1 class='act'>";
	echo "<tr><td>EDIT</td><td>NURSE CODE</td><td>NURSE NAME</td><td>NURSE STATUS</td><td>CREATED BY</td><td>CREATED DATE</td><td>MODIFIED BY</td><td>MODIFIED DATE</td></form></tr>";
    while($row = $result->fetch_assoc()) {
	echo "<tr><form action='nursemaster_edit.php' method='GET'><td><input type='submit' name='edit' value='edit'></td><td><input type='text' name='t1' id='t1' value='".$row['ns_code']."' readonly='readonly'><td><input type='text' name='t2' id='t2' value='".$row['ns_name']."' ></td><td><input type='text' name='t3' id='t3' value='".$row['ns_status']."' readonly='readonly'></td><td><input type='text' name='t4' id='t4' value='".$row['ns_createdby']."' readonly='readonly'></td><td><input type='text' name='t5' id='t5' value='".$row['ns_createddate']."' readonly='readonly'></td><td><input type='text' name='t6' id='t6' value='".$row['ns_modifyby']."' readonly='readonly'></td><td><input type='text' name='t7' id='t7' value='".$row['ns_modifydate']."' readonly='readonly'></td></form></tr>";
}
echo "</table>";
?>  
</body>
</html>
