<html lang="en">
<head>
	<meta charset="utf-8">
	<title> Referral Master </title>
<link rel="stylesheet" type="text/css" href="menu.css" />
<meta charset='utf-8'>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="styles.css">
   <script src="jquery-latest.min.js" type="text/javascript"></script>
   <script src="script.js"></script>
	<link rel="stylesheet" type="text/css" href="css/menu.css" />
<link rel="stylesheet" type="text/css" href="css/default.css" />
<script type="text/javascript" src="jquery-1.4.1.min.js"></script>
<script type="text/javascript">
$(document).ready(function()
{
		
	$(".tar1").change(function() {
		var id=$(this).val();
          $("#tn1").val(id);
        })	
	$(".tar2").change(function() {
		var id=$(this).val();
          $("#tn2").val(id);
        })	
	$(".tar3").change(function() {
		var id=$(this).val();
          $("#tn3").val(id);
        })	
	$(".city").change(function() {
		var id=$(this).val();
          $("#city1").val(id);
		var dataString = 'id7='+ id;
	
		$.ajax
		({
			type: "POST",
			url: "get_data.php",
			data: dataString,
			cache: false,
			success: function(html)
			{
				$(".state").html(html);
				var id=$( "#state option:selected").val();
          $("#state1").val(id);
		var dataString = 'id8='+ id;
	
		$.ajax
		({
			type: "POST",
			url: "get_data.php",
			data: dataString,
			cache: false,
			success: function(html)
			{
				$(".coun").html(html);
				var id=$( "#coun option:selected").val();
          $("#coun1").val(id);
		  id=$( "#city option:selected").val();
		var dataString = 'id20='+ id;
		$.ajax
		({
			type: "POST",
			url: "get_data.php",
			data: dataString,
			cache: false,
			success: function(data)
			{
				$("#pin").val(data);
			}
			});
			} 
		});
			} 
		});
		
	});
	
		
});
</script>
</head>

<body>
<?php include("menu.php");?>
	<form action="#" method="post" class="register">
	<p>
	<ul class="drop_menu">
               <li>
              <a href="reftable_search.php">
                Search
              </a>
              </li>
                <li><a href="reftable.php">View</a></li>
                <li>
                  <button class="button" type="submit">Save</button></li>
				  </ul>
				  </div>
</p>
				<fieldset class="row3" style="width: 900px;">
              <legend> Reference Type </legend>	
              <?php
             if($_GET['t1']=="OtherDoctors")	
             {	
				echo "<input type='radio' name='rtype' value='OtherDoctors' checked /> <label>Other Doctors</label>";
				echo "<input type='radio' name='rtype' value='OtherHospitals'/> <label>Other Hospitals </label>";
				echo "<input type='radio' name='rtype' value='Others'/> <label>Others </label>";
				echo "<input type='radio' name='rtype' value='Staff'/> <label>Staff</label>";
				echo "<input type='radio' name='rtype' value='Organisation'/> <label>Organisation</label>";
				echo "<input type='radio' name='rtype' value='HealthCoordinators'/> <label style='width:200px;'>Health Coordinators </label>";
			}
			else if($_GET['t1']=="OtherHospitals")
			{
				echo "<input type='radio' name='rtype' value='OtherDoctors'  /> <label>Other Doctors</label>";
				echo "<input type='radio' name='rtype' value='OtherHospitals' checked/> <label>Other Hospitals </label>";
				echo "<input type='radio' name='rtype' value='Others'/> <label>Others </label>";
				echo "<input type='radio' name='rtype' value='Staff'/> <label>Staff</label>";
				echo "<input type='radio' name='rtype' value='Organisation'/> <label>Organisation</label>";
				echo "<input type='radio' name='rtype' value='HealthCoordinators'/> <label style='width:200px;'>Health Coordinators </label>";
			}
			else if($_GET['t1']=="Others")
			{
				echo "<input type='radio' name='rtype' value='OtherDoctors'  /> <label>Other Doctors</label>";
				echo "<input type='radio' name='rtype' value='OtherHospitals' /> <label>Other Hospitals </label>";
				echo "<input type='radio' name='rtype' value='Others' checked/> <label>Others </label>";
				echo "<input type='radio' name='rtype' value='Staff'/> <label>Staff</label>";
				echo "<input type='radio' name='rtype' value='Organisation'/> <label>Organisation</label>";
				echo "<input type='radio' name='rtype' value='HealthCoordinators'/> <label style='width:200px;'>Health Coordinators </label>";
			}
			else if($_GET['t1']=="Staff")
			{
				echo "<input type='radio' name='rtype' value='OtherDoctors'  /> <label>Other Doctors</label>";
				echo "<input type='radio' name='rtype' value='OtherHospitals' /> <label>Other Hospitals </label>";
				echo "<input type='radio' name='rtype' value='Others' /> <label>Others </label>";
				echo "<input type='radio' name='rtype' value='Staff' checked/> <label>Staff</label>";
				echo "<input type='radio' name='rtype' value='Organisation'/> <label>Organisation</label>";
				echo "<input type='radio' name='rtype' value='HealthCoordinators'/> <label style='width:200px;'>Health Coordinators </label>";
			}
			else if($_GET['t1']=="Organisation")
			{
				echo "<input type='radio' name='rtype' value='OtherDoctors'  /> <label>Other Doctors</label>";
				echo "<input type='radio' name='rtype' value='OtherHospitals' /> <label>Other Hospitals </label>";
				echo "<input type='radio' name='rtype' value='Others' /> <label>Others </label>";
				echo "<input type='radio' name='rtype' value='Staff' /> <label>Staff</label>";
				echo "<input type='radio' name='rtype' value='Organisation' checked/> <label>Organisation</label>";
				echo "<input type='radio' name='rtype' value='HealthCoordinators'/> <label style='width:200px;'>Health Coordinators </label>";
			}
			else
			{
				echo "<input type='radio' name='rtype' value='OtherDoctors'  /> <label>Other Doctors</label>";
				echo "<input type='radio' name='rtype' value='OtherHospitals' /> <label>Other Hospitals </label>";
				echo "<input type='radio' name='rtype' value='Others' /> <label>Others </label>";
				echo "<input type='radio' name='rtype' value='Staff' /> <label>Staff</label>";
				echo "<input type='radio' name='rtype' value='Organisation' /> <label>Organisation</label>";
				echo "<input type='radio' name='rtype' value='HealthCoordinators' checked/> <label style='width:200px;'>Health Coordinators </label>";
			}
			?>
			 </fieldset>	
			 		 <p>
					<p>
					 <label>Referral Code:</label>
			<input type='text' name='rfcode' value="<?php echo $_GET['t2']; ?>" readonly='readonly' style="margin-top:2px;height:23px;width:185px;" required>
			
			<label>Referral Name:</label> <select name="rn" style="margin-top:2px;height:23px;width:185px;">
			 <option value="Dr. ">Dr. </option>
			 <option value="Asst Dr. "> Asst Dr. </option>
			</select>
			<input type="text" name="rname" value="<?php echo $_GET['t3']; ?>" readonly='readonly' style="margin-top:2px;height:23px;width:185px;"required> </p><p>
			<label>Alias Name:</label>
			<input type="text" name="aname" value="<?php echo $_GET['t4']; ?>" style="margin-top:2px;height:23px;width:185px;">
			<label>Specialization</label>
	<select name="speci" id="ref" class="tar3" style="margin-top:2px;height:23px;width:185px;"required>
			
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
$str1="SELECT *  from specilization_master where spl_code='".$_GET['t5']."'";
$result1=$conn->query($str1);
//echo "<select name='snames'>";

    while($row1 = $result1->fetch_assoc()) {
	echo "<option value='".$row1['spl_code']."'>".$row1['spl_name']."</option>";
}
$str="SELECT *  from specilization_master where spl_status=true";
$result=$conn->query($str);
//echo "<select name='snames'>";

    while($row = $result->fetch_assoc()) {
	echo "<option value='".$row['spl_code']."'>".$row['spl_name']."</option>";
}
?>
                     
                      </select>
					  
			<input type="text" id="tn3" name="tn3" class="tntxt3" value="<?php echo $_GET['t5']; ?>" disabled style="margin-top:2px;height:23px;width:185px;"/>
		   </p><p>
			<label>Designation</label>
	<select name="desig" id="cat2" class="tar2" style="margin-top:2px;height:23px;width:185px;"required>
			
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
$str1="SELECT *  from  designation_master where desg_code='".$_GET['t6']."'";
$result1=$conn->query($str1);
//echo "<select name='cnames'>";

    while($row1 = $result1->fetch_assoc()) {
	echo "<option value='".$row1['desg_code']."'>".$row1['desg_name']."</option>";
}
$str="SELECT *  from  designation_master where desg_status=true";
$result=$conn->query($str);
//echo "<select name='cnames'>";

    while($row = $result->fetch_assoc()) {
	echo "<option value='".$row['desg_code']."'>".$row['desg_name']."</option>";
}
?>
                     
                      </select>
					  
			<input type="text" id="tn2" name="tn2" class="tntxt2" value="<?php echo $_GET['t6']; ?>" style="margin-top:2px;height:23px;width:185px;"disabled>
						 <label>Department</label>
	<select name="dept" id="cat1" class="tar1" style="margin-top:2px;height:23px;width:185px;" required>
			
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
$str1="SELECT *  from  department_master where dept_code='".$_GET['t7']."'";
$result1=$conn->query($str1);
//echo "<select name='cnames'>";

    while($row1 = $result1->fetch_assoc()) {
	echo "<option value='".$row1['dept_code']."'>".$row1['dept_name']."</option>";
}
$str="SELECT *  from  department_master where dept_status=true";
$result=$conn->query($str);
//echo "<select name='cnames'>";

    while($row = $result->fetch_assoc()) {
	echo "<option value='".$row['dept_code']."'>".$row['dept_name']."</option>";
}
?>                    
                      </select>					  
			<input type="text" id="tn1" name="tn1" class="tntxt1" value="<?php echo $_GET['t7']; ?>" style="margin-top:2px;height:23px;width:185px;" disabled></p><p>
			
			<label>Registration: </label><input type="text" name="reg" value="<?php echo $_GET['t8']; ?>" style="margin-top:2px;height:23px;width:185px;">
			<label>Qualification: </label><input type="text" name="quali" value="<?php echo $_GET['t9']; ?>" style="margin-top:2px;height:23px;width:185px;">
			<label>Date Of Birth: </label> <input type="date" name="dob" value="<?php echo $_GET['t10']; ?>"readonly='readonly' style="margin-top:2px;height:23px;width:185px;border:1px solid #000000;" required></p><p>
			<label>PRO Code:</label> <select name="procode" value="<?php echo $_GET['t11']; ?>" style="margin-top:2px;height:23px;width:185px;"></p><p>
			<option value="1"> 1 </option> <option value="2"> 2 </option> <option value="3"> 3 </option> <option value="4"> 4 </option> <option value="5"> 5 </option>
			<option value="6"> 6 </option> <option value="7"> 7 </option> <option value="8"> 8 </option> <option value="9"> 9 </option> <option value="10"> 10 </option>
			<option value="11"> 11 </option> <option value="12"> 12 </option> <option value="13"> 13 </option> <option value="14"> 14 </option> <option value="15"> 15 </option>
			<option value="16"> 16 </option> <option value="17"> 17 </option> <option value="18"> 18 </option> <option value="19"> 19 </option> <option value="20"> 20 </option>
			</select></p>
			</fieldset></p><p>
			<fieldset class="row1"  style="width:700px;margin-top:-10px;">
              <legend> Reference Percentage </legend>	
	<p>			  
			  <label>InPatient:</label><input type="text" name="inpat" value="<?php echo $_GET['t12']; ?>" style="margin-top:2px;height:23px;width:185px;">  
			  <label>Investigations:</label><input type="text" name="inv" value="<?php echo $_GET['t13']; ?>" style="margin-top:2px;height:23px;width:185px;">  </p><p>
			  <label>OP Consulations:</label><input type="text" name="op" value="<?php echo $_GET['t14']; ?>" style="margin-top:2px;height:23px;width:185px;">
			  </p>
			  <p>
			  <label>PAN No:</label><input type="text" name="panno" value="<?php echo $_GET['t15']; ?>" readonly='readonly' style="margin-top:2px;height:23px;width:185px;" required > 
			  <label>Account No:</label><input type="text" name="accno" value="<?php echo $_GET['t16']; ?>" readonly='readonly' style="margin-top:2px;height:23px;width:185px;" required > </p>
			 </fieldset>	</p><br><p>
			  <fieldset class="row1" style="width:700px;margin-top:-10px;"> <legend> Address Details </legend>
			  <label>Address: </label><textarea name="addr" rows="5" cols="50" ><?php echo $_GET["t17"]; ?></textarea></p>
			  <p>
			  <label>City </label>
<select name="city" id="tarapp" class="city" style="margin-top:2px;height:23px;width:185px;"required>
			
			<?php 
			$str1="SELECT *  from  city_master where city_code='".$_GET['t18']."'";
$result1=$conn->query($str1);
$row1 = $result1->fetch_assoc();
echo "<option value='".$row1['city_code']."'>".$row1['city_name']."</option>";
$str="SELECT *  from  city_master where city_status=true";
$result=$conn->query($str);
//echo "<select name='cnames'>";
    while($row = $result->fetch_assoc()) {
	echo "<option value='".$row['city_code']."'>".$row['city_name']."</option>";
}
?>
                    </select>
					  
			<input type="text" id="city1" name="tn" class="tntxt" value="<?php echo $_GET['t18']; ?>" style="margin-top:2px;height:23px;width:185px;" disabled>
</p><p>
<label>State </label>
<select name="state" id="state" class="state" style="margin-top:2px;height:23px;width:185px;" required>
			
			<?php 
			$str1="SELECT *  from  state_master where state_code='".$_GET['t19']."'";
$result1=$conn->query($str1);
$row1 = $result1->fetch_assoc();
echo "<option value='".$row1['state_code']."'>".$row1['state_name']."</option>";
$str="SELECT *  from  state_master where state_status=true";
$result=$conn->query($str);
    while($row = $result->fetch_assoc()) {
	echo "<option value='".$row['state_code']."'>".$row['state_name']."</option>";
}
?>
                    </select>
					  
			<input type="text" id="state1" name="tn" class="tntxt" value="<?php echo $_GET['t19']; ?>" style="margin-top:2px;height:23px;width:185px;" disabled>
</p><p>
<label>Country </label>
  <select name="coun" id="coun" class="coun" style="margin-top:2px;height:23px;width:185px;" required>
			<?php 
			
		$str1="SELECT *  from  country_master where country_code='".$_GET['t20']."'";
$result1=$conn->query($str1);
$row1 = $result1->fetch_assoc();
echo "<option value='".$row1['country_code']."'>".$row1['country_name']."</option>";
$str="SELECT *  from  country_master where country_status=true";
$result=$conn->query($str);
    while($row = $result->fetch_assoc()) {
	echo "<option value='".$row['country_code']."'>".$row['country_name']."</option>";
}
?>
                    </select>
					  
			<input type="text" id="coun1" name="tn" class="tntxt" disabled value="<?php echo $_GET['t20']; ?>" style="margin-top:2px;height:23px;width:185px;"></p><p>
			  
			  
			  
			  <label>Pincode: </label><input type="text" name="pin" value="<?php echo $_GET['t21']; ?>" style="margin-top:2px;height:23px;width:185px;">
			  <label>Mobile: </label><input type="text" name="mob" value="<?php echo $_GET['t22']; ?>" style="margin-top:2px;height:23px;width:185px;"></p><p>
			 <label>Contact Person:</label><input type="text" name="cperson" value="<?php echo $_GET['t23']; ?>" style="margin-top:2px;height:23px;width:185px;">
			 <label>Email:</label> <input type="text" name="email" class="long" value="<?php echo $_GET['t24']; ?>" style="margin-top:2px;height:23px;width:185px;"></p>
</fieldset>
<?php if($_GET['t29']=='1')
			{
			echo "<label>Active</label> <input type='checkbox' name='stat' value='1' checked>";
			}
			else
			{
				echo "<label>Active</label> <input type='checkbox' name='stat' value='0'>";
			}
			?>
</form>
</body>
</html>
<?php
if($_SERVER['REQUEST_METHOD']=='POST')
{
include('dbcon.php');
$val1=$_POST['rtype'];
$val2=$_POST['rfcode'];
$val3=$_POST['rn'];
$val4=$_POST['rname'];
$val5=$_POST['aname'];
$val6=$_POST['speci'];
$val7=$_POST['desig'];
$val8=$_POST['dept'];
$val9=$_POST['reg'];
$val10=$_POST['quali'];
$val11=$_POST['dob'];
$val12=$_POST['procode'];
$val13=(int)$_POST['inpat'];
$val14=(int)$_POST['inv'];
$val15=(int)$_POST['op'];
$val16=$_POST['panno'];
$val17=(int)$_POST['accno'];
$val18=$_POST['addr'];
$val19=$_POST['city'];
$val20=$_POST['state'];
$val21=$_POST['coun'];
$val22=(int)$_POST['pin'];
$val23=(int)$_POST['mob'];
$val24=$_POST['cperson'];
$val25=$_POST['email'];
$t=time();
if (isset($_POST['stat'])) {
    $val26=true;
}
else
{
	$val26=false;
}
$str1="select * from referral where ref_rfcode='".$val2."'";
$result1=$conn->query($str1);
$row1 = $result1->fetch_assoc();
$val30=$row1['ref_createdby'];
$val31=$row1['ref_createddate'];
$str2="delete from referral where ref_rfcode='".$val2."'";
$conn->query($str2);
$str="insert into referral values('".$val1."','".$val2."','".$val3."','".$val4."','".$val5."','".$val6."','".$val7."','".$val8."','".$val9."','".$val10."','".$val11."','".$val12."','".$val13."','".$val14."','".$val15."','".$val16."','".$val17."','".$val18."','".$val19."','".$val20."','".$val21."','".$val22."','".$val23."','".$val24."','".$val25."','".$val30."','".$val31."','".$_SESSION['username']."','".date("Y-m-d h:m:s",$t)."','".$val26."')";
if ($conn->query($str) == TRUE) 
{
  echo "<script>";
	echo "window.alert('Sucessfully updated');";
	echo "window.location.href='reftable.php';";
	echo "</script>";
} else 
{
    echo "Error: " . $sql . "<br>" . $conn->error;
}
}
?>