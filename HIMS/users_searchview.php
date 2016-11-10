<?php
session_start();
?>
<?php include('menu.php'); 
echo "<p>
    <div>
<ul class='drop_menu'>
               <li>
              <a href='usermaster_search.php'>
                Search
              </a>
              </li>
                <li><a href='view_usermaster.php'>View</a></li>                
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
$str="SELECT * from users_masters where user_name like '%".$_GET['t1']."%' or user_id='".$_GET['t2']."' or user_designation='".$_GET['t3']."' or user_designationcode ='".$_GET['t4']."' or user_deptcode='".$_GET['t6']."'";
$result=$conn->query($str);
echo "<table border=1 class='act'>";
	echo "<tr>
	<td>EDIT</td>
  <td>User Name</td>
    <td>User ID</td>
    <td>Designation</td>
    <td>Designation Code</td>     
    <td>Department Code</td>
    <td>Department Name</td>
    <td>Profile Code</td>   
    <td>Profile Name</td> 
  <td>CREATED BY</td>
  <td>CREATED DATE</td>
  <td>MODIFIED BY</td>
  <td>MODIFIED DATE</td>
  <td>STATUS</td>
  <td></td></tr>";
    while($row = $result->fetch_assoc()) {
    	$connect = mysql_connect ("localhost","root","") or die();
     mysql_select_db("hospital")or die();	
        $sg_dept = $row['user_deptcode'];
        $stde = mysql_query("SELECT dept_name From department_master WHERE dept_code='$sg_dept'");
        $stdep = mysql_fetch_array($stde); 
        $profilena = $row['user_profilecode'];
        $profilenam = mysql_query("SELECT profile_name  From profile WHERE profile_code='$profilena'");
        $profilename = mysql_fetch_array($profilenam);  
	echo "<tr><form action='usermaster_edit.php' method='get'>
  <td><input type='submit' name='edit' value='edit'></td>
	<td><input type='text' name='t1' value='".$row['user_name']."' readonly='readonly'></td>
	<td><input type='text' name='t2' value='".$row['user_id']."' readonly='readonly'></td>
	<td><input type='text' name='t3' value='".$row['user_designation']."' readonly='readonly'></td>
	<td><input type='text' name='t4' value='".$row['user_designationcode']."' readonly='readonly'></td>
	<td><input type='text' name='t6' value='".$row['user_deptcode']."' readonly='readonly'></td>
	<td><input type='text' name='t7' value='".$stdep['dept_name']."' readonly='readonly'></td>
	<td><input type='text' name='t8' value='".$row['user_profilecode']."' readonly='readonly'></td>
	<td><input type='text' name='t9' value='".$profilename['profile_name']."' readonly='readonly'></td>
	<td><input type='text' name='t12' value='".$row['user_createby']."' readonly='readonly'></td>
	<td><input type='text' name='t13' value='".$row['user_createdate']."' readonly='readonly'></td>
	<td><input type='text' name='t14' value='".$row['user_modifyby']."' readonly='readonly'></td>
	<td><input type='text' name='t15' value='".$row['user_modifydate']."' readonly='readonly'></td>	
	<td><input type='text' name='t16' value='".$row['user_status']."' readonly='readonly'></td>
	<td><input type='hidden' name='t17' value='".$row['id']."' readonly='readonly'></td>
	<td><input type='hidden' name='t18' value='".$row['user_sign']."' readonly='readonly'></td>
	<td><input type='hidden' name='t19' value='".$row['user_password']."' readonly='readonly'></td>
  <td><input type='hidden' name='t20' value='".$row['user_scode']."' readonly='readonly'></td>
	</form></tr>";
}
echo "</table>";
?>  
</body>
</html>
