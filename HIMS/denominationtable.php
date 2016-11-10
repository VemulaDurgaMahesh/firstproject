<?php
session_start();
?>
<?php include('menu.php'); ?>
<html>
<body>
<form action="denomination_excel.php" method="post">
<p>
		<div>
<ul class="drop_menu">
               <li>
              <a href="denomination_search.php">
                Search
              </a>
              </li>
                <li><a href="denominationtable.php">View</a>
                </li>
                <li>
                  <button name="export_excel">Export</button>
                  </li>
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
$str="select * from denomination_master";
$result=$conn->query($str);
echo "<table border=1>";
	echo "<tr><td>EDIT</td><td>Denomination Code</td><td>Denomination Value</td><td>Denomination Status</td><td>Denomination Created By</td><td>Denomination Created date</td><td>Denom modify By</td><td>Denom Modify Date</td><td>Delete Status</td>
  </tr>";
     while($row = $result->fetch_assoc()) {
	echo "<tr><form action='denomination_edit.php' method='GET'><td><input type='submit' value='edit' name='edit'></td><td><input type='text' name='t1' id='t1' value='".$row['denom_code']."'></td><td><input type='text' name='t2' id='t2' value='".$row['denom_value']."' readonly='readonly'><td><input type='text' name='t3' id='t3' value='".$row['denom_status']."'></td><td><input type='text' name='t4' id='t4' value='".$row['denom_createby']."' readonly='readonly'></td><td><input type='text' name='t5' id='t5' value='".$row['denom_createdate']."' readonly='readonly'></td><td><input type='text' name='t6' id='t6' value='".$row['denom_modifyby']."' readonly='readonly'></td><td><input type='text' name='t7' id='t7' value='".$row['denom_modifydate']."' readonly='readonly'></td><td><input type='text' name='t8' id='t8' value='".$row['delete_status']."' readonly='readonly'></td></form></tr>";
}
echo "</table>";
?>  
</form>
</body>
</html>