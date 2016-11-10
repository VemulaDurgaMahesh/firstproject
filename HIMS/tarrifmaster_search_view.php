
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
         <a href="tarrifmaster_search.php">
                Search
              </a>
              </li>
                <li><a href="tarrifmastertable.php">View</a></li>
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
$str="select * from tariff_master where tariff_name like '%".$_GET['t2']."%'";
$result=$conn->query($str);
echo "<table border=1 class='act'>";
	echo "<tr><td>EDIT</td><td>TARRIF CODE</td><td>TARRIF NAME</td><td>TARRIF CONTACTPERSON</td><td>TARRIF EFFECTFROM</td><td>TARRIF EFFECTTO</td><td>TARRIF STATUS</td><td>TARRIF CREATED BY</td><td>TARRIF CREATED DATE</td><td>TARRIF MODIFIED BY</td><td>TARRIF MODIFIED DATE</td></form></tr>";
   while($row = $result->fetch_assoc()) {
	echo "<tr><form action='tarrifmaster_edit.php' method='GET'><td><input type='submit' name='edit' value='edit'></td><td><input type='text' name='t1' id='t1' value='".$row['tariff_code']."' readonly='readonly'><td><input type='text' name='t2' id='t2' value='".$row['tariff_name']."'></td><td><input type='text' name='t3' id='t3' value='".$row['tariff_contactperson']."'></td><td><input type='text' name='t4' id='t4' value='".$row['tariff_effectfrom']."'></td><td><input type='text' name='t5' id='t5' value='".$row['tariff_effectto']."'></td><td><input type='text' name='t6' id='t6' value='".$row['tariff_status']."' readonly='readonly'></td><td><input type='text' name='t7' id='t7' value='".$row['tariff_createdby']."' readonly='readonly'></td><td><input type='text' name='t8' id='t8' value='".$row['tariff_createddate']."' readonly='readonly'></td><td><input type='text' name='t9' id='t9' value='".$row['tariff_modifyby']."' readonly='readonly'></td><td><input type='text' name='t10' id='t10' value='".$row['tariff_modifydate']."' readonly='readonly'></td></form></tr>";
}
echo "</table>";
?>  
</body>
</html>
