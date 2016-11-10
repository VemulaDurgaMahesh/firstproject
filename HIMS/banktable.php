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
              <a href="bankmaster_search.php">
                Search
              </a>
              </li>
                <li><a href="banktable.php">View</a></li>
                 <li>                
              <a> <button name="export_excel" formaction="bankmaster_excel.php" >Export</button></a>
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
$str="SELECT * from bank_master WHERE bank_createddate between '$appdate' and '$appdate1'";
$result=$conn->query($str);
       if($result->num_rows > 0)
       {
echo "<table border=1 class='act'>";
  echo "<tr><td>Edit</td><td>Bank code</td><td>BANK NAME</td><td>BANK BRANCH</td><td>BANK ADDRESS</td><td>BANK STATUS</td><td>BANK CREATED BY</td><td>BANK CREATED DATE</td><td> BANK MODIFIED BY</td><td>BANK MODIFIED DATE</td><td>BANK ACCOUNT TYPE</td><td>BANK ACCOUNT NUMBER</td><td>BANK MICR</td><td>BANK IFSC</td><td>BANK BSR</td></form></tr>";
    while($row = $result->fetch_assoc()) {
  echo "<tr><form action='bankmaster_edit.php' method='get'><td><input type='submit' name='edit' value='edit'></td><td><input type='text' name='t1' id='t1' value='".$row['bank_code']."' readonly='readonly'></td><td><input type='text' name='t2' id='t2' value='".$row['bank_name']."' readonly='readonly'></td><td><input name='t3' id='t3' value='".$row['bank_branch']."'></td><td><input type='text' name='t4' id='t4' value='".$row['bank_address']."'></td><td><input type='text' name='t5' id='t5' value='".$row['bank_status']."' readonly='readonly'></td><td><input type='text' name='t6' id='t6' value='".$row['bank_createdby']."' readonly='readonly'></td><td><input type='text' name='t7' id='t7' value='".$row['bank_createddate']."' readonly='readonly'></td><td><input type='text' name='t8' id='t8' value='".$row['bank_modifyby']."' readonly='readonly'></td><td><input type='text' name='t9' id='t9' value='".$row['bank_modifydate']."' readonly='readonly'></td><td><input type='text' name='t10' id='t10' value='".$row['bank_acctype']."' readonly='readonly'></td><td><input type='text' name='t11' id='t11' value='".$row['bank_accno']."' readonly='readonly'></td><td><input type='text' name='t12' id='t12' value='".$row['bank_micr']."' readonly='readonly'></td><td><input type='text' name='t13' id='t13' value='".$row['bank_ifsc']."' readonly='readonly'></td><td><input type='text' name='t14' id='t14' value='".$row['bank_bsr']."' readonly='readonly'></td></td></form></tr>";
}
echo "</table>";
  }
  else
  {
    ?>
        <script>alert('No data Found');window.location.href='banktable.php';</script>
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
$str="SELECT * from bank_master";
$result=$conn->query($str);
echo "<table border=1 class='act'>";
	echo "<tr><td>Edit</td><td>Bank code</td><td>BANK NAME</td><td>BANK BRANCH</td><td>BANK ADDRESS</td><td>BANK STATUS</td><td>BANK CREATED BY</td><td>BANK CREATED DATE</td><td> BANK MODIFIED BY</td><td>BANK MODIFIED DATE</td><td>BANK ACCOUNT TYPE</td><td>BANK ACCOUNT NUMBER</td><td>BANK MICR</td><td>BANK IFSC</td><td>BANK BSR</td></form></tr>";
    while($row = $result->fetch_assoc()) {
	echo "<tr><form action='bankmaster_edit.php' method='get'><td><input type='submit' name='edit' value='edit'></td><td><input type='text' name='t1' id='t1' value='".$row['bank_code']."' readonly='readonly'></td><td><input type='text' name='t2' id='t2' value='".$row['bank_name']."' readonly='readonly'></td><td><input name='t3' id='t3' value='".$row['bank_branch']."'></td><td><input type='text' name='t4' id='t4' value='".$row['bank_address']."'></td><td><input type='text' name='t5' id='t5' value='".$row['bank_status']."' readonly='readonly'></td><td><input type='text' name='t6' id='t6' value='".$row['bank_createdby']."' readonly='readonly'></td><td><input type='text' name='t7' id='t7' value='".$row['bank_createddate']."' readonly='readonly'></td><td><input type='text' name='t8' id='t8' value='".$row['bank_modifyby']."' readonly='readonly'></td><td><input type='text' name='t9' id='t9' value='".$row['bank_modifydate']."' readonly='readonly'></td><td><input type='text' name='t10' id='t10' value='".$row['bank_acctype']."' readonly='readonly'></td><td><input type='text' name='t11' id='t11' value='".$row['bank_accno']."' readonly='readonly'></td><td><input type='text' name='t12' id='t12' value='".$row['bank_micr']."' readonly='readonly'></td><td><input type='text' name='t13' id='t13' value='".$row['bank_ifsc']."' readonly='readonly'></td><td><input type='text' name='t14' id='t14' value='".$row['bank_bsr']."' readonly='readonly'></td></td></form></tr>";
}
echo "</table>";
}
?>  
</form>
</body>
</html>