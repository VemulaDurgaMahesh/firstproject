<?php include('menu.php'); ?>
<html>
<style>
    .act { color:#F00; }
    .act1 {color:#2E2EFE;} 
</style>
<body>
<form action="" method="post">
<p>
	<ul class="drop_menu">
               <li>
              <a href="reftable_search.php">
                Search
              </a>
              </li>
                <li><a href="reftable.php">View</a></li>
                <li>
                 <a> <button name="export_excel" formaction="reftable_excel.php" >Export</button></a>
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
$str="SELECT * from referral WHERE ref_createddate between '$appdate' and '$appdate1'";
$result=$conn->query($str);
       if($result->num_rows > 0)
       {
        echo "<table border='1' class='act'>";
  echo "<tr>
<td>EDIT</td>
<td>REFFERENCE TYPE</td>
<td>REFFERENCE CODE</td>
<td>REFFERENCE NAME</td>
<td>REFFERENCE ALIAS NAME</td>
<td>REFFERENCE SPECIALIZATION</td>
<td>REFFERENCE DESIGNATION</td>
<td>REFFERENCE DEPARTMENT</td>
<td>REFFERENCE REGINATAION</td>
<td>REFFERENCE QUALIFICATION</td>
<td>REFFERENCE DATE OF BIRTH</td>
<td>REFFERENCE PRO CODE</td>
<td>REFFERENCE IN PATIENT</td>
<td>REFFERENCE INVESTIGATION</td>
<td>REFFERENCE OP CONSULTATIONS</td>
<td>REFFERENCE PAN NUMBER</td>
<td>REFFERENCE ACCOUNT NO</td>
<td>REFFERENCE ADDRESS</td>
<td>REFFERENCE CITY</td>
<td>REFFERENCE STATE</td>
<td>REFFERENCE COUNTRY</td>
<td>REFFERENCE PINCODE</td>
<td>REFFERENCE MOBILE NUMBER</td>
<td>REFFERENCE CONTACT PERSON</td>
<td>REFFERENCE EMAIL</td>
<td>REFFERENCE CREATED BY</td>
<td>REFFERENCE CREATED DATE</td>
<td>REFFERENCE MODIFIED BY</td>
<td>REFFERENCE MODIFIED DATE</td>
<td>REFFERENCE STATUS</td>
</form></tr>";
    while($row = $result->fetch_assoc()) {
  echo "<tr><form action='referralmaster_edit.php' method='get'>
<td><input type='submit' name='edit' value='edit'></td>
<td><input type='text' name='t1' id='t1' value='".$row['ref_rtype']."' readonly='readonly'></td>
<td><input type='text' name='t2' id='t2' value='".$row['ref_rfcode']."' readonly='readonly'></td>
<td><input type='text' name='t3' id='t3' value='".$row['ref_rname']."' readonly='readonly'></td>
<td><input type='text' name='t4' id='t4' value='".$row['ref_aname']."' readonly='readonly'></td>
<td><input type='text' name='t5' id='t5' value='".$row['ref_speci']."' readonly='readonly'></td>
<td><input type='text' name='t6' id='t6' value='".$row['ref_desig']."' readonly='readonly'></td>
<td><input type='text' name='t7' id='t7' value='".$row['ref_dept']."' readonly='readonly'></td>
<td><input type='text' name='t8' id='t8' value='".$row['ref_reg']."' readonly='readonly'></td>
<td><input type='text' name='t9' id='t9' value='".$row['ref_quali']."' readonly='readonly'></td>
<td><input type='text' name='t10' id='t10' value='".$row['ref_dob']."' readonly='readonly'></td>
<td><input type='text' name='t11' id='t11' value='".$row['ref_procode']."' readonly='readonly'></td>
<td><input type='text' name='t12' id='t12' value='".$row['ref_inpat']."' readonly='readonly'></td>
<td><input type='text' name='t13' id='t13' value='".$row['ref_inv']."' readonly='readonly'></td>
<td><input type='text' name='t14' id='t14' value='".$row['ref_op']."' readonly='readonly'></td>
<td><input type='text' name='t15' id='t15' value='".$row['ref_panno']."' readonly='readonly'></td>
<td><input type='text' name='t16' id='t16' value='".$row['ref_accno']."' readonly='readonly'></td>
<td><input type='text' name='t17' id='t17' value='".$row['ref_addr']."' readonly='readonly'></td>
<td><input type='text' name='t18' id='t18' value='".$row['ref_city']."' readonly='readonly'></td>
<td><input type='text' name='t19' id='t19' value='".$row['ref_state']."' readonly='readonly'></td>
<td><input type='text' name='t20' id='t20' value='".$row['ref_coun']."' readonly='readonly'></td>
<td><input type='text' name='t21' id='t21' value='".$row['ref_pin']."' readonly='readonly'></td>
<td><input type='text' name='t22' id='t22' value='".$row['ref_mob']."' readonly='readonly'></td>
<td><input type='text' name='t23' id='t23' value='".$row['ref_cperson']."' readonly='readonly'></td>
<td><input type='text' name='t24' id='t24' value='".$row['ref_email']."' readonly='readonly'></td>
<td><input type='text' name='t25' id='t25' value='".$row['ref_createdby']."' readonly='readonly'></td>
<td><input type='text' name='t26' id='t26' value='".$row['ref_createddate']."' readonly='readonly'></td>
<td><input type='text' name='t27' id='t27' value='".$row['ref_modifiedby']."' readonly='readonly'></td>
<td><input type='text' name='t28' id='t28' value='".$row['ref_modifieddate']."' readonly='readonly'></td>
<td><input type='text' name='t29' id='t29' value='".$row['ref_status']."' readonly='readonly'></td>
</form></tr>";
}
echo "</table>";
}
  else
  {
    ?>
        <script>alert('No data Found');window.location.href='reftable.php';</script>
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
$str="select * from referral";
$result=$conn->query($str);
echo "<table border='1' class='act'>";
	echo "<tr>
<td>EDIT</td>
<td>REFFERENCE TYPE</td>
<td>REFFERENCE CODE</td>
<td>REFFERENCE NAME</td>
<td>REFFERENCE ALIAS NAME</td>
<td>REFFERENCE SPECIALIZATION</td>
<td>REFFERENCE DESIGNATION</td>
<td>REFFERENCE DEPARTMENT</td>
<td>REFFERENCE REGINATAION</td>
<td>REFFERENCE QUALIFICATION</td>
<td>REFFERENCE DATE OF BIRTH</td>
<td>REFFERENCE PRO CODE</td>
<td>REFFERENCE IN PATIENT</td>
<td>REFFERENCE INVESTIGATION</td>
<td>REFFERENCE OP CONSULTATIONS</td>
<td>REFFERENCE PAN NUMBER</td>
<td>REFFERENCE ACCOUNT NO</td>
<td>REFFERENCE ADDRESS</td>
<td>REFFERENCE CITY</td>
<td>REFFERENCE STATE</td>
<td>REFFERENCE COUNTRY</td>
<td>REFFERENCE PINCODE</td>
<td>REFFERENCE MOBILE NUMBER</td>
<td>REFFERENCE CONTACT PERSON</td>
<td>REFFERENCE EMAIL</td>
<td>REFFERENCE CREATED BY</td>
<td>REFFERENCE CREATED DATE</td>
<td>REFFERENCE MODIFIED BY</td>
<td>REFFERENCE MODIFIED DATE</td>
<td>REFFERENCE STATUS</td>
</form></tr>";
    while($row = $result->fetch_assoc()) {
	echo "<tr><form action='referralmaster_edit.php' method='get'>
<td><input type='submit' name='edit' value='edit'></td>
<td><input type='text' name='t1' id='t1' value='".$row['ref_rtype']."' readonly='readonly'></td>
<td><input type='text' name='t2' id='t2' value='".$row['ref_rfcode']."' readonly='readonly'></td>
<td><input type='text' name='t3' id='t3' value='".$row['ref_rname']."' readonly='readonly'></td>
<td><input type='text' name='t4' id='t4' value='".$row['ref_aname']."' readonly='readonly'></td>
<td><input type='text' name='t5' id='t5' value='".$row['ref_speci']."' readonly='readonly'></td>
<td><input type='text' name='t6' id='t6' value='".$row['ref_desig']."' readonly='readonly'></td>
<td><input type='text' name='t7' id='t7' value='".$row['ref_dept']."' readonly='readonly'></td>
<td><input type='text' name='t8' id='t8' value='".$row['ref_reg']."' readonly='readonly'></td>
<td><input type='text' name='t9' id='t9' value='".$row['ref_quali']."' readonly='readonly'></td>
<td><input type='text' name='t10' id='t10' value='".$row['ref_dob']."' readonly='readonly'></td>
<td><input type='text' name='t11' id='t11' value='".$row['ref_procode']."' readonly='readonly'></td>
<td><input type='text' name='t12' id='t12' value='".$row['ref_inpat']."' readonly='readonly'></td>
<td><input type='text' name='t13' id='t13' value='".$row['ref_inv']."' readonly='readonly'></td>
<td><input type='text' name='t14' id='t14' value='".$row['ref_op']."' readonly='readonly'></td>
<td><input type='text' name='t15' id='t15' value='".$row['ref_panno']."' readonly='readonly'></td>
<td><input type='text' name='t16' id='t16' value='".$row['ref_accno']."' readonly='readonly'></td>
<td><input type='text' name='t17' id='t17' value='".$row['ref_addr']."' readonly='readonly'></td>
<td><input type='text' name='t18' id='t18' value='".$row['ref_city']."' readonly='readonly'></td>
<td><input type='text' name='t19' id='t19' value='".$row['ref_state']."' readonly='readonly'></td>
<td><input type='text' name='t20' id='t20' value='".$row['ref_coun']."' readonly='readonly'></td>
<td><input type='text' name='t21' id='t21' value='".$row['ref_pin']."' readonly='readonly'></td>
<td><input type='text' name='t22' id='t22' value='".$row['ref_mob']."' readonly='readonly'></td>
<td><input type='text' name='t23' id='t23' value='".$row['ref_cperson']."' readonly='readonly'></td>
<td><input type='text' name='t24' id='t24' value='".$row['ref_email']."' readonly='readonly'></td>
<td><input type='text' name='t25' id='t25' value='".$row['ref_createdby']."' readonly='readonly'></td>
<td><input type='text' name='t26' id='t26' value='".$row['ref_createddate']."' readonly='readonly'></td>
<td><input type='text' name='t27' id='t27' value='".$row['ref_modifiedby']."' readonly='readonly'></td>
<td><input type='text' name='t28' id='t28' value='".$row['ref_modifieddate']."' readonly='readonly'></td>
<td><input type='text' name='t29' id='t29' value='".$row['ref_status']."' readonly='readonly'></td>
</form></tr>";
}
echo "</table>";
}
?>  
</body>
</html>