
<?php include('menu.php'); 
echo "<p>
    <div>
<ul class='drop_menu'>
               <li>
              <a href='surgerytype_search.php'>
                Search
              </a>
              </li>
                <li><a href='viewsurgery_type.php'>View</a></li>                
          </ul>
          </div>
</p";
?>
<html>
<style>
    .act { color:#F00; }
</style>
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
$str="SELECT * from surgerytype_master where st_code='".$_GET['t7']."' OR st_name like '%".$_GET['t1']."%'";
$result=$conn->query($str);
echo "<table border=1 class='act'>";
	echo "<tr>
	<td>EDIT</td>
	<td>Surgery Type Code</td>
	<td>Surgery Type Name</td>	
	<td>CREATED BY</td>
	<td>CREATED DATE</td>
	<td>MODIFIED BY</td>
	<td>MODIFIED DATE</td>
	<td>STATUS</td>
	</form></tr>";
    while($row = $result->fetch_assoc()) {
	echo "<tr><form action='surgerytype_edit.php' method='GET'>
	<td><input type='submit' name='edit' value='edit'></td>
	<td><input type='text' name='t7' id='t7' value='".$row['st_code']."' readonly='readonly'>
	<td><input type='text' name='t1' id='t1' value='".$row['st_name']."' readonly='readonly'></td>	
	<td><input type='text' name='t3' id='t3' value='".$row['st_createdby']."' readonly='readonly'></td>
	<td><input type='text' name='t4' id='t4' value='".$row['st_createddate']."' readonly='readonly'></td>
	<td><input type='text' name='t6' id='t6' value='".$row['st_modifyby']."' readonly='readonly'></td>
	<td><input type='text' name='t8' id='t8' value='".$row['st_modifydate']."' readonly='readonly'></td>
	<td><input type='text' name='t5' id='t5' value='".$row['st_status']."' ></td>
	</form></tr>";
}
echo "</table>";
?>  
</body>
</html>
