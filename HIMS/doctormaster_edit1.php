<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script type="text/javascript" src="jquery-1.4.1.min.js"></script>
<script type="text/javascript">
$(document).ready(function()
{
	$(".tar").change(function() {
		var id=$(this).val();
          $("#tn").val(id);
        })
		$(".des").change(function() {
		var id=$(this).val();
          $("#des1").val(id);
        })
		$(".dep").change(function() {
		var id=$(this).val();
          $("#dep1").val(id);
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
			} 
		});
			} 
		});
		
	});
	
});
</script>
 <meta charset='utf-8'>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="styles.css">
   <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
   <script src="script.js"></script>
  <link rel="stylesheet" type="text/css" href="css/menu.css" />
  <link rel="stylesheet" type="text/css" href="css/default.css" />
  <title>    header </title>
</head>
<body>
<?php include('menu.php'); ?>
	<form action="doctormasterp.php" method="post" class="register">
	<p>
		<div>
<ul class="drop_menu">
               <li>
              <a href="doctable_search.php">
                Search
              </a>
              </li>
                <li><a href="doctable.php">View</a></li>
                <li>
                  <button class="button" type="submit">Save</button></li>
				  </ul>
				  </div>
</p>
				
				<fieldset class="row2" style="height:40px;">
              <legend> Consultation Type </legend>			
			<input type="radio" name="ctype" value="OP" checked> </input><label> OP</label>
			<input type="radio" name="ctype" value="IP"> </input><label> IP</label>
			<input type="radio" name="ctype" value="Both"> </input><label> Both</label>
			<input type="radio" name="ctype" value="Not Required"> </input><label> Not Required</label>
			 
			 </fieldset>	
			
			<fieldset class="row2" style="height:40px;">
              <legend> Doctor Type</legend>
			<input type="radio" name="dtype" value="Physician" checked>  </input><label>Physician</label>
			<input type="radio" name="dtype" value="Surgeon"></input><label> Surgeon </label>
			<input type="radio" name="dtype" value="Both"></input><label> Both </label>
			</fieldset>
			</br>
			<p>
				<label> Doctor Code </label>
			
			<?php include('dbcon.php');
			$count=1;
			$str="select * from doctor";
            $result=$conn->query($str);
            while($row = $result->fetch_assoc()) {
             $count=$count+1;
            }
			echo "<input type='text' name='drcode' value=DM".$count.">";
			?>
      		
		</p><p>
			<label>Doctor Name</label><select name="dname">
			 <option value="Dr. ">Dr. </option>
			 <option value="Asst Dr. "> Asst Dr. </option>
			</select>
			<input type="text" name="drname"/> 
			<label> Alias Name </label><input type="text" name="aname"/></p>
			<p>
		    <label> Specialization </label> 
			<select name="speci" id="tarapp" class="tar" required>
			
			<?php 
$str="SELECT *  from  specilization_master where spl_status=true";
$result=$conn->query($str);
//echo "<select name='cnames'>";
echo "<option value='NULL'>--Select Specialization--</option>";
    while($row = $result->fetch_assoc()) {
	echo "<option value='".$row['spl_code']."'>".$row['spl_name']."</option>";
}
?>
                    </select>
					  
			<input type="text" id="tn" name="tn" class="tntxt" disabled>
					
			<label> Designation </label>
			<select name="desig" id="tarapp" class="des" required>
			
			<?php 
$str="SELECT *  from  designation_master where desg_status=true";
$result=$conn->query($str);
//echo "<select name='cnames'>";
echo "<option value='NULL'>--Select Designation--</option>";
    while($row = $result->fetch_assoc()) {
	echo "<option value='".$row['desg_code']."'>".$row['desg_name']."</option>";
}
?>
                    </select>
					  
			<input type="text" id="des1" name="des1" class="tntxt" disabled>
			
			</p><p>
			<label>  Department </label>
			<select name="dept" id="tarapp" class="dep" required>
			
			<?php 
$str="SELECT *  from  department_master where dept_status=true";
$result=$conn->query($str);
//echo "<select name='cnames'>";
echo "<option value='NULL'>--Select Department--</option>";
    while($row = $result->fetch_assoc()) {
	echo "<option value='".$row['dept_code']."'>".$row['dept_name']."</option>";
}
?>
                    </select>
					  
			<input type="text" id="dep1" name="tn" class="tntxt" disabled>
			
		<label> Registration </label><input type="text" name="reg"/></p><p>
			<label> Qualification </label><input type="text" name="quali"/></p><p>	
			<label> Date Of Birth  </label><input type="date" name="dob" value="1986-05-08"/></p>
			<p>
			</br>
			<fieldset class="row2" style="height:40px;width:480px;">
			   <legend>Consulting Type </legend>
			<input type="radio" name="cgtype" value="Visiting"> </input><label>Visiting </label>
			<input type="radio" name="cgtype" value="Resident"></input><label> Resident </label>
			 </fieldset>  
	
			<fieldset class="row2" style="height:40px;">
			   <legend>Payment Type </legend>
			<input type="radio" name="ptype" value="Salaried"></input><label> Salaried</label>
			<input type="radio" name="ptype" value="Honorary"> </input><label>Honorary</label>
			<input type="radio" name="ptype" value="Both"></input><label> Both</label>
			</fieldset>  </p>
			</br>
			 <label>PAN No</label> <input type="text" name="panno"/>
			<label>App No </label><input type="text" name="appno"/>
			<label>Account No </label><input type="text" name="accno"/> <p>
			<br><br>
<fieldset class="row1"> <legend> Address Details </legend>
</p><p><label>Address </label> <textarea name="addr"> Please enter the address </textarea></p><p>
<label>City </label>
<select name="city" id="tarapp" class="city" required>
			
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
					  
			<input type="text" id="city1" name="tn" class="tntxt" disabled>
</p><p>
<label>State </label>
<select name="state" id="state" class="state" required>
			
			<?php 
$str="SELECT *  from  state_master where state_status=true";
$result=$conn->query($str);
echo "<option value='NULL'>--Select State--</option>";
    while($row = $result->fetch_assoc()) {
	echo "<option value='".$row['state_code']."'>".$row['state_name']."</option>";
}
?>
                    </select>
					  
			<input type="text" id="state1" name="tn" class="tntxt" disabled>
</p><p>
<label>Country </label>
  <select name="coun" id="coun" class="coun" required>
			<?php 
$str="SELECT *  from  country_master where country_status=true";
$result=$conn->query($str);
echo "<option value='NULL'>--Select Country--</option>";
    while($row = $result->fetch_assoc()) {
	echo "<option value='".$row['country_code']."'>".$row['country_name']."</option>";
}
?>
                    </select>
					  
			<input type="text" id="coun1" name="tn" class="tntxt" disabled></p><p>
<label>Pincode </label><input type="text" name="pin" id="pin" class="pin"/></p><p>
<label>Mobile</label> <input type="text" name="mob"/></p><p>
<label>Contact Person</label><input type="text" name="cperson"/></p><p>
<label>Email </label><input type="text" name="email"/></p>
</fieldset>
</body>
</html>