<html>
<style>
    .act { color:#F00; }
</style>
<body>
<?php include('menu.php'); ?>
<p>
    <div>
<ul class="drop_menu">
               <li>
              <a href="country_search.php">
                Search
              </a>
              </li>
                <li><a href="view_country.php">View</a></li>                
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
$str="SELECT * from country_master where country_code='".$_GET['t7']."' OR country_name like '%".$_GET['t1']."%'";
$result=$conn->query($str);
echo "<table border=1 class='act'>";
	echo "<tr>
	<td>EDIT</td>
	<td>Country Code</td>
	<td>Country Name</td>
	<td>CREATED BY</td>
	<td>CREATED DATE</td>
	<td>MODIFIED BY</td>
	<td>MODIFIED DATE</td>
	<td>STATUS</td>
	</tr>";
    while($row = $result->fetch_assoc()) {
	echo "<tr><form action='country_edit.php' method='get'>
	<td><input type='submit' name='edit' value='edit'></td>
	<td><input type='text' name='t7' value='".$row['country_code']."' readonly='readonly'></td>
	<td><input type='text' name='t1' value='".$row['country_name']."' readonly='readonly'></td>
	<td><input type='text' name='t3' value='".$row['country_createdby']."' readonly='readonly'></td>
	<td><input type='text' name='t4'  value='".$row['country_createddate']."' readonly='readonly'></td>
	<td><input type='text' name='t6' value='".$row['country_modifyby']."' readonly='readonly'></td>
	<td><input type='text' name='t8' value='".$row['country_modifydate']."' readonly='readonly'></td>
	<td><input type='text' name='t5' value='".$row['country_status']."' readonly='readonly'></td>
	</form></tr>";
}
echo "</table>";
?>  
</body>
</html>
