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
              <a href="specializationtable_search.php">
                Search
              </a>
              </li>
                <li><a href="specializationtable.php">View</a></li>               
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
$str="select * from specilization_master where spl_code='".$_GET['t7']."' OR spl_name like '%".$_GET['t1']."%'";
$result=$conn->query($str);
echo "<table border='1' class='act'>";
	echo "<tr><td>EDIT</td><td>SPLZN CODE</td><td>SPLZN NAME</td><td>SPLZN STATUS</td><td>SPLZN CREATED BY</td><td>SPLZN CREATED DATE</td><td>SPLZN MODIFIED BY</td><td>SPLZN MODIFIED DATE</td><td>DELETE STATUS</td></form></tr>";
    while($row = $result->fetch_assoc()) {
	echo "<tr><form action='specializationtable_edit.php' method='GET'><td><input type='submit' name='edit' value='edit'></td><td><input type='text' name='t7' id='t7' value='".$row['spl_code']."' readonly='readonly'><td><input type='text' name='t1' id='t1' value='".$row['spl_name']."' readonly='readonly'></td><td><input name='t2' id='t2' value='".$row['spl_status']."' readonly='readonly'></td><td><input type='text' name='t3' id='t3' value='".$row['spl_createby']."' readonly='readonly'></td><td><input type='text' name='t4' id='t4' value='".$row['spl_createdate']."' readonly='readonly'></td><td><input type='text' name='t6' id='t6' value='".$row['spl_modifyby']."' readonly='readonly'></td><td><input type='text' name='t8' id='t8' value='".$row['spl_modifydate']."' readonly='readonly'></td><td><input type='text' name='t5' id='t5' value='".$row['delete_status']."'></td></form></tr>";
}
echo "</table>";
?>  
</body>
</html>