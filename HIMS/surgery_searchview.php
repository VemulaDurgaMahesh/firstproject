<?php include('menu.php'); 
echo "<p>
    <div>
<ul class='drop_menu'>
               <li>
              <a href='surgery_search.php'>
                Search
              </a>
              </li>
                <li><a href='view_surgery.php'>View</a></li>                
          </ul>
          </div>
</p>";
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
$str="SELECT * from surgery_master where sg_code='".$_GET['t1']."' or sg_tcode='".$_GET['t2']."' or sg_procedure like '%".$_GET['t3']."%' or sg_sgtcode ='".$_GET['t5']."' or sg_dept='".$_GET['t6']."'";
$result=$conn->query($str);
echo "<table border=1 class='act'>";
	echo "<tr>
  <td>EDIT</td>
	<td>Surgery Design Code</td>
    <td>Tariff Code</td>
    <td>Surgery code</td>
    <td>Surgery Name</td>
    <td>Surgery Type Code</td>
    <td>Department Code</td>
    <td>Department Name</td>
    <td>Surgery Amount</td>
    <td>Estimated Time</td>
    <td>Effect From</td>
    <td>Effect to</td>
    <td>Remarks</td>
	<td>CREATED BY</td>
	<td>CREATED DATE</td>
	<td>MODIFIED BY</td>
	<td>MODIFIED DATE</td>
	<td>STATUS</td>
	</tr>";
    while($row = $result->fetch_assoc()) {
    	$connect = mysql_connect ("localhost","root","") or die();
     mysql_select_db("hospital")or die();
	$sg_procedure=$row['sg_procedure'];
    	$sgpna = mysql_query("SELECT soc_servicename From soc_masters WHERE soc_servicecode='$sg_procedure'");
        $sgpnam = mysql_fetch_array($sgpna);
        $sg_dept = $row['sg_dept'];
        $stde = mysql_query("SELECT dept_name From department_master WHERE dept_code='$sg_dept'");
        $stdep = mysql_fetch_array($stde);  
	echo "<tr><form action='surgery_edit.php' method='get'>
  <td><input type='submit' name='edit' value='edit'></td>
	<td><input type='text' name='t1' value='".$row['sg_code']."' readonly='readonly'></td>
	<td><input type='text' name='t2' value='".$row['sg_tcode']."' readonly='readonly'></td>
	<td><input type='text' name='t3' value='".$row['sg_procedure']."' readonly='readonly'></td>
	<td><input type='text' name='t4' value='".$sgpnam['soc_servicename']."' readonly='readonly'></td>
	<td><input type='text' name='t5' value='".$row['sg_sgtcode']."' readonly='readonly'></td>
	<td><input type='text' name='t6' value='".$row['sg_dept']."' readonly='readonly'></td>
	<td><input type='text' name='t7' value='".$stdep['dept_name']."' readonly='readonly'></td>
	<td><input type='text' name='t8' value='".$row['sg_amount']."' readonly='readonly'></td>
	<td><input type='text' name='t9' value='".$row['sg_estime']."' readonly='readonly'></td>
	<td><input type='text' name='t10' value='".$row['sg_effectfrom']."' readonly='readonly'></td>
	<td><input type='text' name='t11' value='".$row['sg_effectto']."' readonly='readonly'></td>
	<td><input type='text' name='t16' value='".$row['sg_remarks']."' readonly='readonly'></td>
	<td><input type='text' name='t12' value='".$row['sg_createdby']."' readonly='readonly'></td>	
	<td><input type='text' name='t13' value='".$row['sg_createddate']."' readonly='readonly'></td>
	<td><input type='text' name='t14' value='".$row['sg_modifyby']."' readonly='readonly'></td>
	<td><input type='text' name='t15' value='".$row['sg_modifydate']."' readonly='readonly'></td>
	<td><input type='text' name='t17' value='".$row['sg_status']."' readonly='readonly'></td>
	</form></tr>";
}
echo "</table>";
?>  
</body>
</html>
