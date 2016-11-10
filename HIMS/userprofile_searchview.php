<?php
session_start();
?>
<?php include('menu.php'); 
echo "<p>
    <div>
<ul class='drop_menu'>
               <li>
              <a href='userprofile_search.php'>
                Search
              </a>
              </li>
                <li><a href='view_userprofile.php'>View</a></li>                
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
$str="SELECT DISTINCT profile_code from profile where profile_code='".$_GET['t7']."' or profile_name like '%".$_GET['t1']."%' or user_groupcode='".$_GET['ottype']."' or dept_code ='".$_GET['ottype1']."' ";
$result=$conn->query($str);
echo "<table border=1 class='act'>";
	echo "<tr>
	<td>EDIT</td>
  <td>Profile code</td>
  <td>Profile Name</td>
  <td>User Group Code</td>
  <td>User Group Name</td>
  <td>Depaetment Code</td>
  <td>Depaetment Name</td>
  <td>CREATED BY</td>
  <td>CREATED DATE</td>
  <td>MODIFIED BY</td>
  <td>MODIFIED DATE</td>
  <td>STATUS</td>
  <td></td></tr>";
    while($row = $result->fetch_assoc()) {
    	$connect = mysql_connect ("localhost","root","") or die();
     mysql_select_db("hospital")or die();
     $x1=$row['profile_code'];
      $str1="SELECT DISTINCT * FROM profile WHERE profile_code='$x1'";
          $result1=mysql_query($str1);
          $row1 = mysql_fetch_array($result1);
          $x=$row1['dept_code'];
      $y=$row1['user_groupcode'];	
        $ottname = mysql_query("SELECT dept_name FROM department_master WHERE dept_code = '$x'");
                         $optname1 = mysql_fetch_array($ottname);  
        $usergname = mysql_query("SELECT user_categoryname FROM user_groupmaster WHERE user_categorycode = '$y'");
                         $usergname1 = mysql_fetch_array($usergname);  
	echo "<tr><tr><form action='userprofile_edit.php' method='get'>
  <td><input type='submit' name='edit' value='edit'></td>
  <td><input type='text' name='t7' value='".$row['profile_code']."' readonly='readonly'></td>
  <td><input type='text' name='t1' value='".$row1['profile_name']."' readonly='readonly'></td>  
  <td><input type='text' name='t9' value='".$row1['user_groupcode']."' readonly='readonly'></td>
  <td><input type='text' name='ottype' value='".$usergname1['user_categoryname']."' readonly='readonly'></td>
  <td><input type='text' name='t10' value='".$row1['dept_code']."' readonly='readonly'></td>
  <td><input type='text' name='ottype1' value='".$optname1['dept_name']."' readonly='readonly'></td>  
  <td><input type='text' name='t3' value='".$row1['createby']."' readonly='readonly'></td>
  <td><input type='text' name='t4'  value='".$row1['createdate']."' readonly='readonly'></td>
  <td><input type='text' name='t6' value='".$row1['modifyby']."' readonly='readonly'></td>
  <td><input type='text' name='t8' value='".$row1['modifydate']."' readonly='readonly'></td>
  <td><input type='text' name='t5' value='".$row1['status']."' readonly='readonly'></td>
	
	</form></tr>";
}
echo "</table>";
?>  
</body>
</html>
