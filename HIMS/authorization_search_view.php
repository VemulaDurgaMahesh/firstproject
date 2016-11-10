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
              <a href="authorization_search.php">
                Search
              </a>
              </li>
                <li><a href="authorization_table.php">View</a></li>
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
$str="select * from author_master where athname like '%".$_GET['t4']."%'";
$result=$conn->query($str);
echo "<table border=1 class='act'>";
	echo "<tr><td>EDIT</td><td>designtn</td><td>am_code</td><td>refcode</td><td>athname</td><td>opcnscn</td><td>ipcnscn</td><td>vocherapproval</td><td>opcrdt</td><td>ipcrdt</td><td>mfdapdtrans</td><td>opcncln</td><td>ipcncln</td><td>dscgewostlmnt</td><td>opphcnscn</td><td>patntbillcnvrsn</td><td>fnbdue</td><td>opphdue</td><td>fnbcnscn</td><td>createdby</td><td>createddate</td><td>modifyby</td><td>modifydate</td><td>status</td></form></tr>";
    while($row = $result->fetch_assoc()) {
	echo "<tr><form action='authorizationmaster_edit.php' method='GET'><td><input type='submit' name='edit' value='edit'></td><td><input type='text' name='t1' id='t1' value='".$row['designtn']."' readonly='readonly'></td><td><input type='text' name='t2' id='t2' value='".$row['am_code']."'></td><td><input type='text' name='t3' id='t3' value='".$row['refcode']."'></td><td><input type='text' name='t4' id='t4' value='".$row['athname']."' readonly='readonly'></td><td><input type='text' name='t5' id='t5' value='".$row['opcnscn']."' readonly='readonly'></td><td><input type='text' name='t6' id='t6' value='".$row['ipcnscn']."' readonly='readonly'></td><td><input type='text' name='t7' id='t7' value='".$row['vocherapproval']."' readonly='readonly'></td><td><input type='text' name='t8' id='t8' value='".$row['opcrdt']."' readonly='readonly'></td><td><input type='text' name='t9' id='t9' value='".$row['ipcrdt']."' readonly='readonly'></td><td><input type='text' name='t10' id='t10' value='".$row['mfdapdtrans']."' readonly='readonly'></td><td><input type='text' name='t11' id='t11' value='".$row['opcncln']."' readonly='readonly'></td><td><input type='text' name='t12' id='t12' value='".$row['ipcncln']."' readonly='readonly'></td>
    <td><input type='text' name='t13' id='t13' value='".$row['dscgewostlmnt']."' readonly='readonly'></td><td><input type='text' name='t14' id='t14' value='".$row['opphcnscn']."' readonly='readonly'></td><td><input type='text' name='t15' id='t15' value='".$row['patntbillcnvrsn']."' readonly='readonly'></td><td><input type='text' name='t16' id='t16' value='".$row['fnbdue']."' readonly='readonly'></td><td><input type='text' name='t17' id='t17' value='".$row['opphdue']."' readonly='readonly'></td><td><input type='text' name='t18' id='t18' value='".$row['fnbcnscn']."' readonly='readonly'></td><td><input type='text' name='t19' id='t19' value='".$row['createdby']."' readonly='readonly'></td><td><input type='text' name='t20' id='t20' value='".$row['createddate']."' readonly='readonly'></td><td><input type='text' name='t21' id='t21' value='".$row['modifyby']."' readonly='readonly'></td><td><input type='text' name='t22' id='t22' value='".$row['modifydate']."' readonly='readonly'></td><td><input type='text' name='t23' id='t23' value='".$row['status']."' readonly='readonly'></td></form></tr>";
}
echo "</table>";
?>  
</body>
</html>
