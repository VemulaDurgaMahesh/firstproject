
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
              <a href="nursemaster_search.php">
                Search
              </a>
              </li>
                <li><a href="nursemastertable.php">View</a></li>
                <li>                
              <a> <button name="export_excel" formaction="nursemaster_excel.php" >Export</button></a>
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
$str="SELECT * from nurse_master WHERE ns_createddate between '$appdate' and '$appdate1'";
$result=$conn->query($str);
       if($result->num_rows > 0)
       {
echo "<table border=1 class='act'>";
  echo "<tr><td>EDIT</td><td>NURSE CODE</td><td>NURSE NAME</td><td>NURSE STATUS</td><td>CREATED BY</td><td>CREATED DATE</td><td>MODIFIED BY</td><td>MODIFIED DATE</td></form></tr>";
     while($row = $result->fetch_assoc()) {
  echo "<tr><form action='nursemaster_edit.php' method='GET'><td><input type='submit' name='edit' value='edit'></td><td><input type='text' name='t1' id='t1' value='".$row['ns_code']."' readonly='readonly'><td><input type='text' name='t2' id='t2' value='".$row['ns_name']."' ></td><td><input type='text' name='t3' id='t3' value='".$row['ns_status']."' readonly='readonly'></td><td><input type='text' name='t4' id='t4' value='".$row['ns_createdby']."' readonly='readonly'></td><td><input type='text' name='t5' id='t5' value='".$row['ns_createddate']."' readonly='readonly'></td><td><input type='text' name='t6' id='t6' value='".$row['ns_modifyby']."' readonly='readonly'></td><td><input type='text' name='t7' id='t7' value='".$row['ns_modifydate']."' readonly='readonly'></td></form></tr>";
}
echo "</table>";
  }
  else
  {
    ?>
        <script>alert('No data Found');window.location.href='view_area.php';</script>
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
$str="SELECT * from nurse_master";
$result=$conn->query($str);
echo "<table border=1 class='act'>";
	echo "<tr><td>EDIT</td><td>NURSE CODE</td><td>NURSE NAME</td><td>NURSE STATUS</td><td>CREATED BY</td><td>CREATED DATE</td><td>MODIFIED BY</td><td>MODIFIED DATE</td></form></tr>";
     while($row = $result->fetch_assoc()) {
	echo "<tr><form action='nursemaster_edit.php' method='GET'><td><input type='submit' name='edit' value='edit'></td><td><input type='text' name='t1' id='t1' value='".$row['ns_code']."' readonly='readonly'><td><input type='text' name='t2' id='t2' value='".$row['ns_name']."' ></td><td><input type='text' name='t3' id='t3' value='".$row['ns_status']."' readonly='readonly'></td><td><input type='text' name='t4' id='t4' value='".$row['ns_createdby']."' readonly='readonly'></td><td><input type='text' name='t5' id='t5' value='".$row['ns_createddate']."' readonly='readonly'></td><td><input type='text' name='t6' id='t6' value='".$row['ns_modifyby']."' readonly='readonly'></td><td><input type='text' name='t7' id='t7' value='".$row['ns_modifydate']."' readonly='readonly'></td></form></tr>";
}
echo "</table>";
}
?>  
</body>
</html>