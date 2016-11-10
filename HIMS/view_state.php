
<?php include('menu.php'); ?>
<html>
<style>
    .act { color:#F00;}
    .act1 {color:#2E2EFE;} 
</style>
<body>
<form action="" method="post">
<p>
    <div>
<ul class="drop_menu">
               <li>
              <a href="state_search.php">
                Search
              </a>
              </li>
                <li><a href="view_state.php">View</a></li> 
                <li>                
              <a> <button name="export_excel" formaction="state_excel.php" >Export</button></a>
              </li> 
              <li>
			<p>	<a><label  for="titlecode" class="act1">&nbsp;&nbsp;&nbsp;&nbsp;From Date</label>
                 <input name="fromdate" type="date"  id="popupDatepicker" placeholder="Pick from date" class="form-control">
                <label for="titlecode" class="act1" >To Date</label>
                <input name="todate" type="date"  id="popupDatepicker1" placeholder="Pick to date" class="form-control">
                <button type="submit" name="submit" class="act1">Submit</button></a>
			</p>
			</li>                   
          </ul>
          </div>
</p>
<?php 


if(isset($_POST['submit']))
{
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
 $appdate=$_POST['fromdate'];  
     $appdate1=$_POST['todate']; 
$str="SELECT * from state_master WHERE s_createdate between '$appdate' and '$appdate1'";
$result=$conn->query($str);
       if($result->num_rows > 0)
       {
echo "<table border='1' class='act'>";
	echo "<tr>
	<td>EDIT</td>
	<td>State CODE</td>
	<td>State NAME</td>
	<td>Country Name</td>
	<td>Country Code</td>
	<td>CREATED BY</td>
	<td>CREATED DATE</td>
	<td>MODIFIED BY</td>
	<td>MODIFIED DATE</td>
	<td>STATUS</td>
	</tr>";
    while($row = $result->fetch_assoc()) {
    	$x=$row['country_code'];
    	$connect = mysql_connect ("localhost","root","") or die();
        mysql_select_db("hospital")or die();
        $b = mysql_query(" SELECT * FROM country_master WHERE country_code='$x'") or die(mysql_error());
        $cname = mysql_fetch_array($b);
	echo "<tr><form action='state_edit.php' method='get'><td>
	<input type='submit' name='edit' value='edit'></td>
	<td><input type='text' name='t7' id='t7' value='".$row['state_code']."' readonly='readonly'></td>
	<td><input type='text' name='t1' id='t1' value='".$row['state_name']."' readonly='readonly'></td>
	<td><input name='t2' id='t2' value='".$cname['country_name']."' readonly='readonly'></td>
	<td><input type='text' name='t9' id='t9' value='".$row['country_code']."' readonly='readonly'></td>
	<td><input type='text' name='t3' id='t3' value='".$row['s_createby']."' readonly='readonly'></td>
	<td><input type='text' name='t4' id='t4' value='".$row['s_createdate']."' readonly='readonly'></td>
	<td><input type='text' name='t6' id='t6' value='".$row['s_modifyby']."' readonly='readonly'></td>
	<td><input type='text' name='t8' id='t8' value='".$row['s_modifydate']."' readonly='readonly'></td>
	<td><input type='text' name='t5' id='t5' value='".$row['state_status']."' readonly='readonly'></td></form></tr>";
}
echo "</table>";
	}
	else
	{
		?>
        <script>alert('No data Found');window.location.href='view_state.php';</script>
        <?php
	}
	
}
else
{
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
$str="SELECT * from state_master";
$result=$conn->query($str);
echo "<table border='1' class='act'>";
	echo "<tr>
	<td>EDIT</td>
	<td>State CODE</td>
	<td>State NAME</td>
	<td>Country Name</td>
	<td>Country Code</td>
	<td>CREATED BY</td>
	<td>CREATED DATE</td>
	<td>MODIFIED BY</td>
	<td>MODIFIED DATE</td>
	<td>STATUS</td>
	</tr>";
    while($row = $result->fetch_assoc()) {
    	$x=$row['country_code'];
    	$connect = mysql_connect ("localhost","root","") or die();
                         mysql_select_db("hospital")or die();
                      $b = mysql_query(" SELECT * FROM country_master WHERE country_code='$x'") or die(mysql_error());
                      $cname = mysql_fetch_array($b);
	echo "<tr><form action='state_edit.php' method='get'><td>
	<input type='submit' name='edit' value='edit'></td>
	<td><input type='text' name='t7' id='t7' value='".$row['state_code']."' readonly='readonly'></td>
	<td><input type='text' name='t1' id='t1' value='".$row['state_name']."' readonly='readonly'></td>
	<td><input name='t2' id='t2' value='".$cname['country_name']."' readonly='readonly'></td>
	<td><input type='text' name='t9' id='t9' value='".$row['country_code']."' readonly='readonly'></td>
	<td><input type='text' name='t3' id='t3' value='".$row['s_createby']."' readonly='readonly'></td>
	<td><input type='text' name='t4' id='t4' value='".$row['s_createdate']."' readonly='readonly'></td>
	<td><input type='text' name='t6' id='t6' value='".$row['s_modifyby']."' readonly='readonly'></td>
	<td><input type='text' name='t8' id='t8' value='".$row['s_modifydate']."' readonly='readonly'></td>
	<td><input type='text' name='t5' id='t5' value='".$row['state_status']."' readonly='readonly'></td></form></tr>";
}
echo "</table>";
}
?>  
</form>
</body>
</html>