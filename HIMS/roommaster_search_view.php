<?php
session_start();
?>
<?php include('menu.php'); ?>
<html>
<body>
<p>
	<ul class="drop_menu">
               <li>
              <a href="roommaster_search.php">
                Search
              </a>
              </li>
                <li><a href="roommastertable.php">View</a></li>
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
$str="select * from room_master where ROOM_WARDNAME like '%".$_GET['t2']."%' ";
$result=$conn->query($str);
echo "<table border=1>";
	echo "<tr><td>EDIT</td><td>WARD CODE</td><td>WARD NAME</td><td>ROOM CODE</td><td>ROOM BLOCK</td><td>ROOM BEDNUMBER</td><td>ROOM LEVEL</td><td>ROOM EXTEN</td><td>ROOM NURSE</td><td>CREATED BY</td><td>CREATED DATE</td><td>MODIFIED BY</td><td>MODIFIED DATE</td><td>ROOM STATUS</td></form></tr>";
    while($row = $result->fetch_assoc()) {
	echo "<tr><form action='roommaster_edit.php' method='GET'><td><input type='submit' name='edit' value='edit'></td><td><input type='text' name='t1' id='t1' value='".$row['ROOM_WARDCODE']."' readonly='readonly'></td><td><input type='text' name='t2' id='t2' value='".$row['ROOM_WARDNAME']."'></td><td><input name='t3' id='t3' value='".$row['ROOM_CODE']."'></td><td><input name='t4' id='t4' value='".$row['ROOM_BLOCK']."'></td><td><input name='t5' id='t5' value='".$row['ROOM_BEDNO']."'></td><td><input type='text' name='t6' id='t6' value='".$row['ROOM_LEVEL']."'></td><td><input type='text' name='t7' id='t7' value='".$row['ROOM_EXTEN']."'></td><td><input type='text' name='t8' id='t8' value='".$row['ROOM_NURSE']."'></td><td><input type='text' name='t9' id='t9' value='".$row['ROOM_CREATEBY']."' readonly='readonly'></td><td><input type='text' name='t10' id='t10' value='".$row['ROOM_CREATEDATE']."' readonly='readonly'></td><td><input type='text' name='t11' id='t11' value='".$row['ROOM_MODIFYBY']."' readonly='readonly'></td><td><input type='text' name='t12' id='t12' value='".$row['ROOM_MODIFYDATE']."' readonly='readonly'></td><td><input type='text' name='t13' id='t13' value='".$row['ROOM_STATUS']."' readonly='readonly'></td></td></form></tr>";
}
echo "</table>";
?>  
</body>
</html>
