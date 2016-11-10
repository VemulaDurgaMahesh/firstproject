<?php include('menu.php'); ?>
<html>
<style>
    .act { color:#F00; }
    .act1 {color:#2E2EFE;} 
</style>
<body>
<form action="" method="post">
<p>
		<div>
<ul class="drop_menu">
               <li>
              <a href="designationmaster_search.php">
                Search
              </a>
              </li>
                <li><a href="designationmastertable.php">View</a></li>
                <li>
                 <a> <button name="export_excel" formaction="designationmaster_excel.php" >Export</button></a>
                 </li>
                  <li>
      <p> <a><label  for="titlecode" class="act1">&nbsp;&nbsp;&nbsp;&nbsp;From Date</label>
                 <input name="fromdate" type="date"  id="popupDatepicker" placeholder="Pick from date" class="form-control">
                <label for="titlecode" class="act1" >To Date</label>
                <input name="todate" type="date"  id="popupDatepicker1" placeholder="Pick to date" class="form-control">
                <button type="submit" name="submit" class="act1">Submit</button></a>
      </p>
      </li> 
				  </ul>
				  </div>
</p>
</form>
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
$str="SELECT * from designation_master WHERE desg_createdate between '$appdate' and '$appdate1'";
$result=$conn->query($str);
       if($result->num_rows > 0)
       {
        echo "<table border='1' class='act'>";
  echo "<tr><td>EDIT</td><td>DESIGNATION CODE</td><td>DESIGNATION NAME</td><td>DESIGNATION STATUS</td><td>CREATED BY</td><td>CREATED DATE</td><td>MODIFIED BY</td><td>MODIFIED DATE</td><td>DELETE STATUS</td></form></tr>";
     while($row = $result->fetch_assoc()) {
  echo "<tr><form action='designationmaster_edit.php' method='GET'><td><input type='submit' value='Edit' name='edit'></td><td><input type='text' name='t1' id='t1' value='".$row['desg_code']."' readonly='readonly'><td><input type='text' name='t2' id='t2' value='".$row['desg_name']."' ></td><td><input type='text' name='t3' id='t3' value='".$row['desg_status']."' readonly='readonly'></td><td><input type='text' name='t4' id='t4' value='".$row['desg_createby']."' readonly='readonly'></td><td><input type='text' name='t5' id='t5' value='".$row['desg_createdate']."' readonly='readonly'></td><td><input type='text' name='t6' id='t6' value='".$row['desg_modifyby']."' readonly='readonly'></td><td><input type='text' name='t7' id='t7' value='".$row['desg_modifydate']."' readonly='readonly'></td><td><input type='text' name='t8' id='t8' value='".$row['delete_status']."' ></td></td></form></tr>";
}
echo "</table>";
}
  else
  {
    ?>
        <script>alert('No data Found');window.location.href='designationmastertable.php';</script>
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
$str="select * from designation_master";
$result=$conn->query($str);
echo "<table border='1' class='act'>";
	echo "<tr><td>EDIT</td><td>DESIGNATION CODE</td><td>DESIGNATION NAME</td><td>DESIGNATION STATUS</td><td>CREATED BY</td><td>CREATED DATE</td><td>MODIFIED BY</td><td>MODIFIED DATE</td><td>DELETE STATUS</td></form></tr>";
     while($row = $result->fetch_assoc()) {
	echo "<tr><form action='designationmaster_edit.php' method='GET'><td><input type='submit' value='Edit' name='edit'></td><td><input type='text' name='t1' id='t1' value='".$row['desg_code']."' readonly='readonly'><td><input type='text' name='t2' id='t2' value='".$row['desg_name']."' ></td><td><input type='text' name='t3' id='t3' value='".$row['desg_status']."' readonly='readonly'></td><td><input type='text' name='t4' id='t4' value='".$row['desg_createby']."' readonly='readonly'></td><td><input type='text' name='t5' id='t5' value='".$row['desg_createdate']."' readonly='readonly'></td><td><input type='text' name='t6' id='t6' value='".$row['desg_modifyby']."' readonly='readonly'></td><td><input type='text' name='t7' id='t7' value='".$row['desg_modifydate']."' readonly='readonly'></td><td><input type='text' name='t8' id='t8' value='".$row['delete_status']."' ></td></td></form></tr>";
}
echo "</table>";
}
?>  
</body>
</html>