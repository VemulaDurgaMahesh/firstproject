<?php
session_start();
?>
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
              <a href="sourceofconsultation_search.php">
                Search
              </a>
              </li>
                <li><a href="socconstable.php">View</a></li>                
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
$str="select * from soc_consultation where soc_tname like '%".$_GET['t1']."%'  OR soc_conname like '%".$_GET['t3']."%' ";
$result=$conn->query($str);
echo "<table border=1 class='act'>";
echo "<tr><td>EDIT</td><td>TARRIF NAME</td>
<td>CONSULTANT CODE</td>
<td>CONSULTANCY NAME</td>
<td>NORMAL CHARGES </td>
<td>NORMAL HOSPITAL CHARGES</td>
<td>EMEREGENCY CHARGES</td>
<td>EMEREGENCY HOSPITAL CHARGES</td>
<td>REVISIT CHARGES</td>
<td>REVISIT HOSPITAL CHAREGES</td>
<td>REGISTRATION FEE</td>
<td>NUMBER OF DAYS</td>
<td>NUMBER OF VISITS</td>
<td>CREATED BY</td>
<td>CREATED DATE</td>
<td>MODIFIED BY</td>
<td>MODIFIEDDATE</td>
<td>STATUS</td>
</tr>";
    while($row = $result->fetch_assoc()) {
	echo "<tr><form action='sourceofconsultation_edit.php' method='GET'><td><input type='submit' value='Edit'></td>

<td><input type='text' name='t1' id='t1' value='".$row['soc_tname']."' readonly='readonly'></td>
<td><input type='text' name='t2' id='t2' value='".$row['soc_concode']."' readonly='readonly'></td>
<td><input type='text' name='t3' id='t3' value='".$row['soc_conname']."' readonly='readonly'></td>
<td><input type='text' name='t4' id='t4' value='".$row['soc_nch']."' readonly='readonly'></td>
<td><input type='text' name='t5' id='t5' value='".$row['soc_nchch']."' readonly='readonly'></td>
<td><input type='text' name='t6' id='t6' value='".$row['soc_emch']."' readonly='readonly'></td>
<td><input type='text' name='t7' id='t7' value='".$row['soc_emhch']."' readonly='readonly'></td>
<td><input type='text' name='t8' id='t8' value='".$row['soc_rech']."' readonly='readonly'></td>
<td><input type='text' name='t9' id='t9' value='".$row['soc_rehch']."' readonly='readonly'></td>
<td><input type='text' name='t10' id='t10' value='".$row['soc_regfee']."' readonly='readonly'></td>
<td><input type='text' name='t11' id='t11' value='".$row['soc_nod']."' readonly='readonly'></td>
<td><input type='text' name='t12' id='t12' value='".$row['soc_nov']."' readonly='readonly'></td>
<td><input type='text' name='t13' id='t13' value='".$row['soc_createdby']."' readonly='readonly'></td>
<td><input type='text' name='t14' id='t14' value='".$row['soc_createddate']."' readonly='readonly'></td>
<td><input type='text' name='t15' id='t15' value='".$row['soc_modifiedby']."' readonly='readonly'></td>
<td><input type='text' name='t16' id='t16' value='".$row['soc_modifieddate']."' readonly='readonly'></td>
<td><input type='text' name='t17' id='t17' value='".$row['soc_status']."' readonly='readonly'></td>
</form></tr>";
}
echo "</table>";
echo "</table>";
?>  
</body>
</html>
