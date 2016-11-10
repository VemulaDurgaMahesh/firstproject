<?php
session_start();
?>
<?php include('menu.php'); ?>
<html>
<body>
<p>
		<div>
<ul class="drop_menu">
               <li>
              <a href="healthcardholder_search.php">
                Search
              </a>
              </li>
                <li><a href="healthcardholdertable.php">View</a></li>
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
$str="select * from healthcardholder where cardno = '".$_GET['t3']."' ";
$result=$conn->query($str);
echo "<table border=1>";
	echo "<tr><td>EDIT</td><td>CHONo</td><td>CARD TYPE CODE</td><td>CARD NO</td><td>CARD VALID FROM</td><td>CARD VALID TO</td><td>ADDRESS</td><td>CREATED BY</td><td>CREATED DATE</td><td>MODIFIED BY</td><td>MODIFIED DATE</td><td>STATUS</td></tr>";
    while($row = $result->fetch_assoc()) {
	echo "<tr><form action='healthcardtype_edit.php' method='GET'><td>
	<input type='submit' name='edit' value='edit'></td>
	<td><input type='text' name='t1' id='t1' value='".$row['chono']."' readonly='readonly'></td>
	<td><input type='text' name='t2' id='t2' value='".$row['card_type1']."' readonly='readonly'></td>
	<td><input name='t3' id='t3' value='".$row['cardno']."' readonly='readonly'></td>
	<td><input name='t4' id='t4' value='".$row['cardvalidfrom']."' readonly='readonly'></td>
	<td><input name='t5' id='t5' value='".$row['cardvalidto']."' readonly='readonly'></td>
	<td><input name='t6' id='t6' value='".$row['address']."' readonly='readonly'></td>
	<td><input name='t7' id='t7' value='".$row['createdby']."' readonly='readonly'></td>
	<td><input name='t8' id='t8' value='".$row['createddate']."' readonly='readonly'></td>
	<td><input name='t9' id='t9' value='".$row['modifiedby']."' readonly='readonly'></td>
	<td><input name='t10' id='t10' value='".$row['modifieddate']."' readonly='readonly'></td>
	<td><input name='t11' id='t11' value='".$row['status']."' readonly='readonly'></td></form></tr>";
}
echo "</table>";
?>  
</body>
</html>