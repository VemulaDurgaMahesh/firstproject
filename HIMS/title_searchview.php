
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
              <a href="title_search.php">
                Search
              </a>
              </li>
                <li><a href="view_title.php">View</a></li>                
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
$str="SELECT * from title_master where title_code='".$_GET['t7']."' OR title_title like '%".$_GET['t1']."%'";
$result=$conn->query($str);
echo "<table border=1 class='act'>";
	echo "<tr>
	<td>EDIT</td>
	<td>Title Code</td>
    <td>Title Name</td>		
	<td>CREATED BY</td>
	<td>CREATED DATE</td>
	<td>MODIFIED BY</td>
	<td>MODIFIED DATE</td>
	<td>STATUS</td>
	</form></tr>";
    while($row = $result->fetch_assoc()) {
	echo "<tr><form action='title_edit.php' method='get'>
	<td><input type='submit' name='edit' value='edit'></td>
	<td><input type='text' name='t7' value='".$row['title_code']."' readonly='readonly'></td>
	<td><input type='text' name='t1' value='".$row['title_title']."' readonly='readonly'></td>
	<td><input type='text' name='t3' value='".$row['title_createdby']."' readonly='readonly'></td>
	<td><input type='text' name='t4'  value='".$row['title_createddate']."' readonly='readonly'></td>
	<td><input type='text' name='t6' value='".$row['title_modifyby']."' readonly='readonly'></td>
	<td><input type='text' name='t8' value='".$row['title_modifydate']."' readonly='readonly'></td>
	<td><input type='text' name='t5' value='".$row['title_status']."' readonly='readonly'></td>
	</form></tr>";
}
echo "</table>";
?>  
</body>
</html>
