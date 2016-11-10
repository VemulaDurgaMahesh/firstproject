
<?php include('menu.php'); ?>
<html>
<style>
    .act { color:#F00; }
</style>
<body>
<p>
<ul class="drop_menu">
               <li>
              <a href="specimentable_search.php">Search </a>
              </li>
                <li><a href="specimentable.php">View</a></li>
                </ul>
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
$str="SELECT * from specimen_master where specimen_code='".$_GET['t1']."' OR specimen_name like '%".$_GET['t2']."%' ";
$result=$conn->query($str);
echo "<table border=1 class='demo'>";
	echo "<tr><td>EDIT</td><td>SPECIMEN CODE</td><td>SPECIMEN NAME</td><td>CREATED BY</td><td>CREATED DATE</td><td>MODIFIED BY</td><td>MODIFIED DATE</td><td>STATUS</td></form></tr>";
    while($row = $result->fetch_assoc()) {
	echo "<tr><form action='specimenmaster_edit.php' method='GET'>
	<td><input type='submit' name='edit' value='edit'></td>
	<td><input type='text' name='t1' id='t1' value='".$row['specimen_code']."' readonly='readonly'></td>
	<td><input type='text' name='t2' id='t2' value='".$row['specimen_name']."' readonly='readonly'></td>
	<td><input type='text' name='t3' id='t3' value='".$row['specimen_creatdby']."' readonly='readonly'></td>
	<td><input type='text' name='t4' id='t4' value='".$row['specimen_createddate']."' readonly='readonly'></td>
	<td><input type='text' name='t5' id='t5' value='".$row['specimen_modifyby']."' readonly='readonly'></td>
	<td><input type='text' name='t6' id='t6' value='".$row['specimen_modifydate']."' readonly='readonly' ></td>
	<td><input type='text' name='t7' id='t7' value='".$row['specimen_status']."' readonly='readonly'></td></form></tr>";
}
echo "</table>";
?>  
</body>
</html>
