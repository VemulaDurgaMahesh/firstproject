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
              <a href="healthcardentry_search.php">
                Search
              </a>
              </li>
                <li><a href="healthcardentrytable.php">View</a></li>
                <li>                
              <a> <button name="export_excel" formaction="healthcardentry_excel.php" >Export</button></a>
              </li> 
              <li>                
              <a> <button name="" formaction="" >Print</button></a>
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
  $connect = mysql_connect ("localhost","root","") or die();
       mysql_select_db("hospital")or die(); 
       $appdate=$_POST['fromdate'];  
     $appdate1=$_POST['todate'];                                           
 $str="SELECT * from author_master WHERE createddate between '$appdate' and '$appdate1'";
       $result=mysql_query($str);
       if(mysql_num_rows($result) > 0)
       {
       	echo "<table border='1' class='act'>";
	echo "<tr><td>EDIT</td><td>ID</td><td>CARD TYPE CD</td><td>CARD TYPE NAME</td><td>MAX MEMBERS</td><td>INCLUDE ALL NUMBERS</td><td>VALID YEARS</td><td>VALID DAYS</td><td>CARD AMOUNT</td><td>AUTO PREFIX</td><td>REGISTRATIONS</td><td>CONSULTATIONS</td><td>OP BUILDING</td><td>IP SERVICE CHARGES</td><td>IP CONSULTATION AND PROFESSIONAL CHARGES</td><td>IP INVESTIGATION CHARGES</td><td>IP PROCEDURE CHARGES</td><td>IP WARD CHARGES</td><td>PHARMACY CHARGES</td><td>ALLOW TO CHANGE HEALTH CARD AMOUNT</td><td> CREATEDBY</td><td> CREATEDATE</td><td> MODIFIEDBY</td><td> MODIFIEDDATE</td><td> STATUS</td></tr>";
    while($row = $result->fetch_assoc()) {
	echo "<tr><form action='healthcardentry_edit.php' method='GET'><td>
	<input type='submit' name='edit' value='edit'></td>
	<td><input type='text' name='t1' id='t1' value='".$row['ID']."'></td>
	<td><input type='text' name='t2' id='t2' value='".$row['card_code']."' readonly='readonly'></td>
	<td><input name='t3' id='t3' value='".$row['card_name']."'></td>
	<td><input name='t4' id='t4' value='".$row['card_maxno']."'></td>
	<td><input name='t5' id='t5' value='".$row['includeallmembers']."'></td>
	<td><input name='t6' id='t6' value='".$row['validyears']."'></td>
	<td><input name='t7' id='t7' value='".$row['validdays']."'></td>
	<td><input name='t8' id='t8' value='".$row['cardamount']."'></td>
	<td><input name='t9' id='t9' value='".$row['autoprefix']."'></td>
	<td><input name='t10' id='t10' value='".$row['conc_registration']."'></td>
	<td><input name='t11' id='t11' value='".$row['conc_consultations']."'></td>
	<td><input name='t12' id='t12' value='".$row['conc_opbilling']."'></td>
	<td><input name='t13' id='t13' value='".$row['ip_servicecharges']."'></td>
	<td><input name='t14' id='t14' value='".$row['ip_consultationandprofessional']."'></td>
	<td><input name='t15' id='t15' value='".$row['ip_investigation']."'></td>
	<td><input name='t16' id='t16' value='".$row['ip_proceduralcharges']."'></td>
	<td><input name='t17' id='t17' value='".$row['ip_wardcharges']."'></td>
	<td><input name='t18' id='t18' value='".$row['ip_pharmacychrges']."'></td>
	<td><input name='t19' id='t19' value='".$row['allowhealthamt']."'></td>
	<td><input name='t22' id='t22' value='".$row['createdby']."'></td>
	<td><input name='t23' id='t23' value='".$row['createddate']."'></td>
	<td><input name='t24' id='t24' value='".$row['modifiedby']."'></td>
	<td><input name='t25' id='t25' value='".$row['modifieddate']."'></td>
	<td><input name='t26' id='t26' value='".$row['status']."'></td></form></tr>";
}
echo "</table>";
}
  else
  {
    ?>
        <script>alert('No data Found');window.location.href='authorization_table.php';</script>
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
$str="select * from health_cards";
$result=$conn->query($str);
echo "<table border='1' class='act'>";
	echo "<tr><td>EDIT</td><td>ID</td><td>CARD TYPE CD</td><td>CARD TYPE NAME</td><td>MAX MEMBERS</td><td>INCLUDE ALL NUMBERS</td><td>VALID YEARS</td><td>VALID DAYS</td><td>CARD AMOUNT</td><td>AUTO PREFIX</td><td>REGISTRATIONS</td><td>CONSULTATIONS</td><td>OP BUILDING</td><td>IP SERVICE CHARGES</td><td>IP CONSULTATION AND PROFESSIONAL CHARGES</td><td>IP INVESTIGATION CHARGES</td><td>IP PROCEDURE CHARGES</td><td>IP WARD CHARGES</td><td>PHARMACY CHARGES</td><td>ALLOW TO CHANGE HEALTH CARD AMOUNT</td><td> CREATEDBY</td><td> CREATEDATE</td><td> MODIFIEDBY</td><td> MODIFIEDDATE</td><td> STATUS</td></tr>";
    while($row = $result->fetch_assoc()) {
	echo "<tr><form action='healthcardentry_edit.php' method='GET'><td>
	<input type='submit' name='edit' value='edit'></td>
	<td><input type='text' name='t1' id='t1' value='".$row['ID']."'></td>
	<td><input type='text' name='t2' id='t2' value='".$row['card_code']."' readonly='readonly'></td>
	<td><input name='t3' id='t3' value='".$row['card_name']."'></td>
	<td><input name='t4' id='t4' value='".$row['card_maxno']."'></td>
	<td><input name='t5' id='t5' value='".$row['includeallmembers']."'></td>
	<td><input name='t6' id='t6' value='".$row['validyears']."'></td>
	<td><input name='t7' id='t7' value='".$row['validdays']."'></td>
	<td><input name='t8' id='t8' value='".$row['cardamount']."'></td>
	<td><input name='t9' id='t9' value='".$row['autoprefix']."'></td>
	<td><input name='t10' id='t10' value='".$row['conc_registration']."'></td>
	<td><input name='t11' id='t11' value='".$row['conc_consultations']."'></td>
	<td><input name='t12' id='t12' value='".$row['conc_opbilling']."'></td>
	<td><input name='t13' id='t13' value='".$row['ip_servicecharges']."'></td>
	<td><input name='t14' id='t14' value='".$row['ip_consultationandprofessional']."'></td>
	<td><input name='t15' id='t15' value='".$row['ip_investigation']."'></td>
	<td><input name='t16' id='t16' value='".$row['ip_proceduralcharges']."'></td>
	<td><input name='t17' id='t17' value='".$row['ip_wardcharges']."'></td>
	<td><input name='t18' id='t18' value='".$row['ip_pharmacychrges']."'></td>
	<td><input name='t19' id='t19' value='".$row['allowhealthamt']."'></td>
	<td><input name='t22' id='t22' value='".$row['createdby']."'></td>
	<td><input name='t23' id='t23' value='".$row['createddate']."'></td>
	<td><input name='t24' id='t24' value='".$row['modifiedby']."'></td>
	<td><input name='t25' id='t25' value='".$row['modifieddate']."'></td>
	<td><input name='t26' id='t26' value='".$row['status']."'></td></form></tr>";
}
echo "</table>";
}
?>  
</form>
</body>
</html>