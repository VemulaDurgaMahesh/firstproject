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
              <a href="categorymaster_search.php">
                Search
              </a>
              </li>
                <li><a href="categorymastertable.php">View</a></li>
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
$str="select * from category_master where cat_name like '%".$_GET['t2']."%'";
$result=$conn->query($str);
echo "<table border=1 class='act'>";
	echo "<tr><td>EDIT</td><td>CATEGORY CODE</td><td>CATEGORY NAME</td><td>CATEGORY WOD</td><td>CATEGORY STATUS</td><td>CATEGORY CREATED BY</td><td>CATEGORY CREATED DATE</td><td>CATEGORY MODIFIED BY</td><td>CATEGORY MODIFIED DATE</td></form></tr>";
    while($row = $result->fetch_assoc()) {
	echo "<tr><form action='categorymaster_edit.php' method='GET'><td><input type='submit' name='edit' value='edit'></td><td><input type='text' name='t1' id='t1' value='".$row['cat_code']."' readonly='readonly'><td><input type='text' name='t2' id='t2' value='".$row['cat_name']."'></td><td><input type='text' name='t3' id='t3' value='".$row['cat_wod']."' readonly='readonly' ></td><td><input type='text' name='t4' id='t4' value='".$row['cat_status']."' readonly='readonly'></td><td><input type='text' name='t5' id='t5' value='".$row['cat_createdby']."' readonly='readonly'></td><td><input type='text' name='t6' id='t6' value='".$row['cat_createddate']."' readonly='readonly'></td><td><input type='text' name='t7' id='t7' value='".$row['cat_modifiedby']."' readonly='readonly'></td><td><input type='text' name='t8' id='t8' value='".$row['cat_modifieddate']."' readonly='readonly'></td></form></tr>";
}
echo "</table>";
?>  
</body>
</html>
