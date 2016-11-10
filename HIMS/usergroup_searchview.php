<?php include('menu.php');
echo "<p>
    <div>
<ul class='drop_menu'>
               <li>
              <a href='usergroup_search.php'>
                Search
              </a>
              </li>
                <li><a href='view_usergroup.php'>View</a></li>                
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
$x=$_GET['t7'];
//$y=$_GET['ottype'];
//$connect = mysql_connect ("localhost","root","") or die();
////    	$ottn = mysql_query("SELECT ott_code FROM operation_theatertype WHERE ott_name like '%".$_GET['ottype']."%'");
//        $optna1 = mysql_fetch_array($ottn);
//
$str="SELECT * from user_groupmaster where user_categorycode='$x' OR user_categoryname like '%".$_GET['t1']."%'";
$result=$conn->query($str);
echo "<table border=1 class='act'>";
	echo "<tr>
	<td>User Category Code</td>
  <td>User Category Name</td> 
    <td>Dept Name </td>
  <td>Dept code</td>
	<td>CREATED BY</td>
	<td>CREATED DATE</td>
	<td>MODIFIED BY</td>
	<td>MODIFIED DATE</td>
	<td>STATUS</td>
	<td>EDIT</td></form></tr>";
    while($row = $result->fetch_assoc()) {
    	
     	$x=$_GET['t7'];   
     	 $y=$row['user_categorydeptcode'];
     	 $connect = mysql_connect ("localhost","root","") or die();
          mysql_select_db("hospital")or die();     	
         $ottname2 = mysql_query("SELECT dept_name FROM department_master WHERE dept_code = '$y'");
                         $optname3 = mysql_fetch_array($ottname2); 

	echo "<tr><form action='otheater_edit.php' method='GET'>
	<td><input type='text' name='t7' id='t7' value='".$row['user_categorycode']."' readonly='readonly'>
	<td><input type='text' name='t1' id='t1' value='".$row['user_categoryname']."' readonly='readonly'></td>	
	<td><input type='text' name='ottype' value='".$optname3['dept_name']."' readonly='readonly'></td>
  <td><input type='text' name='t9' id='t9' value='".$row['user_categorydeptcode']."' readonly='readonly'></td>
	<td><input type='text' name='t3' id='t3' value='".$row['user_groupcreateby']."' readonly='readonly'></td>
	<td><input type='text' name='t4' id='t4' value='".$row['user_groupcreatedate']."' readonly='readonly'></td>
	<td><input type='text' name='t6' id='t6' value='".$row['user_groupmodifyby']."' readonly='readonly'></td>
	<td><input type='text' name='t8' id='t8' value='".$row['user_groupmodifydate']."' readonly='readonly'></td>
	<td><input type='text' name='t5' id='t5' value='".$row['user_categorystatus']."' readonly='readonly'></td>
	<td><input type='submit' name='edit' value='edit'></td></td></form></tr>";
}
echo "</table>";
?>  
</body>
</html>
