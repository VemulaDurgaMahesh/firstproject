
<?php include('menu.php');
echo "<p>
    <div>
<ul class='drop_menu'>
               <li>
              <a href='optheater_search.php'>
                Search
              </a>
              </li>
                <li><a href='view_operation.php'>View</a></li>                
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
$str="SELECT * from operation_theater where ot_code='$x' OR ot_name like '%".$_GET['t1']."%'";
$result=$conn->query($str);
echo "<table border=1 class='act'>";
	echo "<tr>
	<td>OT Code</td>
	<td>OT Name</td>	
    <td>OT type Name </td>	
    <td>OT Type Code</td>
	<td>CREATED BY</td>
	<td>CREATED DATE</td>
	<td>MODIFIED BY</td>
	<td>MODIFIED DATE</td>
	<td>STATUS</td>
	<td>EDIT</td></form></tr>";
    while($row = $result->fetch_assoc()) {
    	
     	$x=$_GET['t7'];   
     	 $y=$row['ott_code'];
     	 $connect = mysql_connect ("localhost","root","") or die();
          mysql_select_db("hospital")or die();     	
         $ottname2 = mysql_query("SELECT ott_name FROM operation_theatertype WHERE ott_code = '$y'");
                         $optname3 = mysql_fetch_array($ottname2); 

	echo "<tr><form action='otheater_edit.php' method='GET'>
	<td><input type='text' name='t7' id='t7' value='".$row['ot_code']."' readonly='readonly'>
	<td><input type='text' name='t1' id='t1' value='".$row['ot_name']."' readonly='readonly'></td>	
	<td><input type='text' name='ottype' value='".$optname3['ott_name']."' readonly='readonly'></td>
  <td><input type='text' name='t9' id='t9' value='".$row['ott_code']."' readonly='readonly'></td>
	<td><input type='text' name='t3' id='t3' value='".$row['ot_createdby']."' readonly='readonly'></td>
	<td><input type='text' name='t4' id='t4' value='".$row['ot_createddate']."' readonly='readonly'></td>
	<td><input type='text' name='t6' id='t6' value='".$row['ot_modifyby']."' readonly='readonly'></td>
	<td><input type='text' name='t8' id='t8' value='".$row['ot_modifydate']."' readonly='readonly'></td>
	<td><input type='text' name='t5' id='t5' value='".$row['ot_status']."' readonly='readonly'></td>
	<td><input type='submit' name='edit' value='edit'></td></td></form></tr>";
}
echo "</table>";
?>  
</body>
</html>
