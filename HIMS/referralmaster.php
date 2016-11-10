<html lang="en">

<head>
	<meta charset="utf-8">
	<title> Referral Master </title>
<link rel="stylesheet" type="text/css" href="menu.css" />
<meta charset='utf-8'>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="styles.css">
   <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
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
	<form action="referralmasterp.php" method="post" class="register">
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
				<fieldset class="row3" style="width:900px;">
              <legend> Reference Type </legend>			
			<input type="radio" name="rtype" value="OtherDoctors"/> <label>Other Doctors</label>
			<input type="radio" name="rtype" value="OtherHospitals"/> <label>Other Hospitals </label>
			<input type="radio" name="rtype" value="Others"/> <label>Others </label>
			<input type="radio" name="rtype" value="Staff"/> <label>Staff</label>
			<input type="radio" name="rtype" value="Organisation"/> <label>Organisation</label>
			<input type="radio" name="rtype" value="HealthCoordinators"/> <label style="width:200px;">Health Coordinators </label>
			 </fieldset>	
			 		 <p>
					 <fieldset>
					 <p>
					 <label>Referral Code:</label>
			
			<?php include('dbcon.php');
			$count=1;
			$str="select * from referral";
            $result=$conn->query($str);
            while($row = $result->fetch_assoc()) {
             $count=$count+1;
            }
			echo "<input type='text' name='rfcode' value=REF".$count." style='margin-right:50px;height:23px;width:185px;'>";
			?>
			<label>Referral Name:</label><select name="rn" style="margin-top:2px;height:23px;width:185px;">
			 <option value="Dr. ">Dr. </option>
			 <option value="Asst Dr. "> Asst Dr. </option>
			</select>
			<input type="text" name="rname" style="margin-top:2px;height:23px;width:185px;"/> </p><p>
			<label style="margin-top:2px;">Alias Name:</label><input type="text" name="aname" style="margin-right:50px;margin-top:2px;height:23px;width:185px;"/>
						 <label style="margin-top:2px;">Specialization</label>
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
echo "<option value=''>--select Specialization--</option>";

$str="SELECT *  from specilization_master where spl_status=true";
$result=$conn->query($str);
//echo "<select name='snames'>";

    while($row = $result->fetch_assoc()) {
	echo "<option value='".$row['spl_code']."'>".$row['spl_name']."</option>";
}
?>
                     
                      </select>
					  
			<input type="text" id="tn3" name="tn3" class="tntxt3" style="margin-top:2px;height:23px;width:185px;"disabled>
		    </p><p>
			<label  style="margin-top:2px;">Designation</label>
	<select name="desig" id="cat2" class="tar2"  style="margin-top:2px;height:23px;width:185px;"required>
			
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
echo "<option value=''>--select designation--</option>";

$str="SELECT *  from  designation_master where desg_status=true";
$result=$conn->query($str);
//echo "<select name='cnames'>";

    while($row = $result->fetch_assoc()) {
	echo "<option value='".$row['desg_code']."'>".$row['desg_name']."</option>";
}
?>
                     
                      </select>
					  
			<input type="text" id="tn2" name="tn2" class="tntxt2"  style="margin-top:2px;height:23px;width:185px;" disabled>
						 <label>Department</label>
	<select name="dept" id="cat1" class="tar1"  style="margin-top:2px;height:23px;width:185px;"required>
			
			<?php 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hospital";
+

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "<option value=''>--select department--</option>";

$str="SELECT *  from  department_master where dept_status=true";
$result=$conn->query($str);
//echo "<select name='cnames'>";

    while($row = $result->fetch_assoc()) {
	echo "<option value='".$row['dept_code']."'>".$row['dept_name']."</option>";
}
?>
                     
                      </select>
					  
			<input type="text" id="tn1" name="tn1" class="tntxt1"  style="margin-top:2px;height:23px;width:185px;" disabled></p><p>
			<label  style="margin-top:2px;">Registration: </label><input type="text" name="reg" style="margin-top:2px;height:23px;width:185px;;"/>
			<label style="margin-top:2px;">Qualification: </label><input type="text" name="quali" style="margin-top:2px; height:23px;width:185px;"/>
			<label style="margin-top:2px;">Date Of Birth: </label> <input type="date" name="dob" style="margin-top:2px;height:23px;width:185px;border:1px solid #000000;"/></p><p>
			<label style="margin-top:2px;">PRO Code:</label> <select name="procode" style="margin-top:2px;height:23px;width:185px;">
			<option value="1"> 1 </option> <option value="2"> 2 </option> <option value="3"> 3 </option> <option value="4"> 4 </option> <option value="5"> 5 </option>
			<option value="6"> 6 </option> <option value="7"> 7 </option> <option value="8"> 8 </option> <option value="9"> 9 </option> <option value="10"> 10 </option>
			<option value="11"> 11 </option> <option value="12"> 12 </option> <option value="13"> 13 </option> <option value="14"> 14 </option> <option value="15"> 15 </option>
			<option value="16"> 16 </option> <option value="17"> 17 </option> <option value="18"> 18 </option> <option value="19"> 19 </option> <option value="20"> 20 </option>
			</select></p>
			</fieldset><br>
			<fieldset class="row1" style="width:700px;margin-top:-10px;">
              <legend> Reference Percentage </legend>	
<p>			  
			  <label style="margin-top:2px;">InPatient:</label><input type="text" name="inpat" style="margin-top:2px;height:23px;width:185px;"> 
			  <label style="margin-top:2px;">Investigations:</label><input type="text" name="inv" style="margin-top:2px;height:23px;width:185px;"> </p><p>
			  <label  style="margin-top:2px;">OP Consulations:</label><input type="text" name="op" style="margin-top:2px;height:23px;width:185px;"> </p><p>
			  <label style="margin-top:2px;">PAN No:</label><input type="text" name="panno" style="margin-top:2px;height:23px;width:185px;">
			  <label style="margin-top:2px;">Account No:</label><input type="text" name="accno" style="margin-top:2px;height:23px;width:185px;"></p>
			 </fieldset>	
</p><br><p>
			 <fieldset class="row1" style="width:700px;margin-top:-10px;"> <legend> Address Details </legend>
			  <label style="margin-top:2px;">Address: </label><textarea name="addr" rows="5" cols="50"style="margin-top:2px;"></textarea></p><p>
			  <label style="margin-top:2px;">City </label>
<select name="city" id="tarapp" class="city" style="margin-top:2px;height:23px;width:185px;"required>
			
			<?php 
$str="SELECT *  from  city_master where city_status=true";
$result=$conn->query($str);
//echo "<select name='cnames'>";
echo "<option value='NULL'>--Select City--</option>";
    while($row = $result->fetch_assoc()) {
	echo "<option value='".$row['city_code']."'>".$row['city_name']."</option>";
}
?>
                    </select>
					  
			<input type="text" id="city1" name="tn" class="tntxt" style="margin-top:2px;height:23px;width:185px;"disabled>
</p><p>
<label style="margin-top:2px;">State </label>
<select name="state" id="state" class="state" style="margin-top:2px;height:23px;width:185px;" required>
			
			<?php 
$str="SELECT *  from  state_master where state_status=true";
$result=$conn->query($str);
echo "<option value='NULL'>--Select State--</option>";
    while($row = $result->fetch_assoc()) {
	echo "<option value='".$row['state_code']."'>".$row['state_name']."</option>";
}
?>
                    </select>
					  
			<input type="text" id="state1" name="tn" class="tntxt" style="margin-top:2px;height:23px;width:185px;" disabled>
</p><p>
<label style="margin-top:2px;">Country </label>
  <select name="coun" id="coun" class="coun" style="margin-top:2px;height:23px;width:185px;" required>
			<?php 
$str="SELECT *  from  country_master where country_status=true";
$result=$conn->query($str);
echo "<option value='NULL'>--Select Country--</option>";
    while($row = $result->fetch_assoc()) {
	echo "<option value='".$row['country_code']."'>".$row['country_name']."</option>";
}
?>
                    </select><input type="text" id="coun1" name="tn" class="tntxt" style="margin-top:2px;height:23px;width:185px;" disabled></p><p>
			  <label style="margin-top:2px;">Pincode: </label><input type="text" name="pin" style="margin-top:2px;height:23px;width:185px;"/>
			  <label style="margin-top:2px;">Mobile: </label><input type="text" name="mob" style="margin-top:2px;height:23px;width:185px;"/></p><p>
			 <label style="margin-top:2px;">Contact Person:</label><input type="text" name="cperson" style="margin-top:2px;height:23px;width:185px;"/>
			 <label style="margin-top:2px;">Email:</label> <input type="text" name="email" class="long" style="margin-top:2px;height:23px;width:185px;"/></p>
</fieldset>
	</form>
</body>
</html>