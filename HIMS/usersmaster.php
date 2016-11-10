<?php
include("dbcon.php");
?>
<html>	

<head>
	<title> Users Master </title>
	<script type="text/javascript" src="jquery-1.4.1.min.js"></script>
<script type="text/javascript">
$(document).ready(function()
{
	$(".desig").change(function()
	{
		var id=$(this).val();
		if(id=="Doctor")
		{
			$("label[for='empc']").html("Doctor");
				
		}
		else
		{
			$("label[for='empc']").html("Employee");
				
		}
		var dataString = 'id3='+ id;
	
		$.ajax
		({
			type: "POST",
			url: "get_data.php",
			data: dataString,
			cache: false,
			success: function(html)
			{
				
				$(".empcode").html(html);
				
			} 
		});
	});
	
	$(".empcode").change(function()
	{
		var id=$(this).val();
          $("#empname").val(id);
		  var vall=$( "input[name='desig']:checked").val();
		if(vall=="Doctor")
			var dataString = 'id4='+ id;
		else
			var dataString = 'id5='+id;
	
		$.ajax
		({
			type: "POST",
			url: "get_data.php",
			data: dataString,
			cache: false,
			success: function(html)
			{
				
				$(".depcode").html(html);
				var val1=$( "#depcode option:selected").val();
				$("#depname").val(val1);
			} 
		});
	});

	
});

$(document).ready(function()
{
	$(".tar").change(function() {
		var id=$(this).val();
          $("#tn").val(id);
        })

});

$(document).ready(function()
{
	$(".tar1").change(function() {
		var id=$(this).val();
          $("#tn1").val(id);
        })
});
</script>
<meta charset='utf-8'>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="styles.css">
   <script src="jquery-latest.min.js" type="text/javascript"></script>
   <script src="script.js"></script>
<link rel="stylesheet" type="text/css" href="css/menu.css" />
<link rel="stylesheet" type="text/css" href="css/default.css" />
<title>    header </title>
	<title>HOSPITAL CARE INFORMATION SYSTEM</title>
	
</head>

<body>
<?php 
	include('menu.php'); ?>
	<form action="#" method="post"class="register">
		<p>
		<div>
<ul class="drop_menu">
               <li>
              <a href="usermaster_search.php">
                Search
              </a>
              </li>
                <li><a href="view_usermaster.php">View</a></li>
                <li>
                  <button class="button" type="submit" name="submit">Save</button></li>
				  </ul>
				  </div>
</p>      
				<div class="image">
              <img src="images/2.jpg" width="100%" height="100px"/>
              <h2>  Users Master </h2>
        </div>
        
			<p class="agreement">
			<fieldset class="row1">
			<legend>Designation</legend>
			<input type="radio" name="desig" value="Employee" id="desig" class="desig"/><label>Employee</label>
			<input type="radio" name="desig" value="Doctor" id="desig" class="desig" /><label>Doctor</label>
			<input type="radio" name="desig" value="Others" id="desig" class="desig" /><label>Other</label>
			</fieldset>
			</p><p class="agreement">
		  <label for="empc"> Employee </label> <select name="empcode" id="empcode" class="empcode" style="width:185px; height:23px;"><option value="">--emmployee Name--</option></select><input type="text" name="empname" id="empname" class="empname" disabled style="width:185px; height:23px;"/>
		  </p>
		  <p class="agreement">
			<label for="lcode">Dept Code</label>
			<select name="deptcode" id="deptcode" class="tar" required style="width:185px; height:23px;">
			
			
<?php
			$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hospital";
$count=1;

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$str="SELECT *  from  department_master WHERE dept_status=1";
$result=$conn->query($str);
//echo "<select name='cnames'>";
echo "<option value='NULL'>--Select Dept--</option>";
    while($row = $result->fetch_assoc()) {
	echo "<option value='".$row['dept_code']."'>".$row['dept_name']."</option>";
}
?>   
</select>			  
<input type="text" id="tn" name="tn" class="tntxt" disabled style="width:185px; height:23px;">			
			</p><p class="agreement">
		  <label>User ID</label> <input type="text" name="userid" style="width:185px; height:23px;">
		  </p><p class="agreement">
		 <label>User Name</label> <input type="text" name="username" style="width:185px; height:23px;">
		  </p><p class="agreement">
		  <label>Password</label> <input type="password" name="pass"  style="width:185px; height:23px;">
		  <label>Confirm Password </label>
		  <input type="password" name="cpass" style="width:185px; height:23px;"></p>
		  <p class="agreement">
		  <label>Security Code</label>
		  <input type="text" name="scode" style="width:185px; height:23px;">
		  <label>Confirm Security Code</label>
		    <input type="text" name="cscode" style="width:185px; height:23px; margin-left:-8px;"></p>
		 <p class="agreement">
			<label for="lcode">Profile Name</label>
			<select name="tarapp1" id="tarapp1" class="tar1" required style="width:185px; height:23px;">
			
			<?php 
$str="SELECT DISTINCT  profile_code,profile_name from profile where  status=1";
$result=$conn->query($str);
//echo "<select name='cnames'>";
echo "<option value='NULL'>--Select Profile--</option>";
    while($row = $result->fetch_assoc()) {
	echo "<option value='".$row['profile_code']."'>".$row['profile_name']."</option>";
}
?>
</select>
<input type="text" id="tn1" name="tn1" class="tntxt" disabled style="width:185px; height:23px;">
			
			</p>
<p class="agreement">
<label>Sign</label><input type="file" name="T1" required accept="image/jpeg, image/png" style="width:185px; height:23px;">
</p>
		
		</form>
		</div>
	 </body>
 </html>
<?php
$connect = mysql_connect ("localhost","root","") or die();
                         mysql_select_db("hospital")or die();
    if(isset($_POST['submit']))
   { 
	$desig=$_POST['desig'];
	$desgcode=$_POST['empcode'];
	$deptcode=$_POST['deptcode'];
	$user=$_POST['username'];
	$userid=$_POST['userid'];
	$pass=$_POST['pass'];	
	$scode=$_POST['scode'];
	$cpass=$_POST['cpass'];	
	$cscode=$_POST['cscode'];
	$photo=$_POST['T1'];
	$tarapp1=$_POST['tarapp1'];
	if($pass==$cpass)
     {
        if($scode==$cscode)
        {

			$queryget = mysql_query("INSERT INTO users_masters (user_designation,user_designationcode,user_deptcode,user_id,user_name,user_password,user_scode,user_profilecode,user_sign,user_createby) 
                          VALUES('$desig','$desgcode','$deptcode','$userid','$user','$pass','$scode','$tarapp1','$photo','".$_SESSION['username']."')");
                         if($queryget)
                         {
                           ?>
                                  <script>alert('success');
                              window.location.href='usersmaster.php';
                              </script>                       
                          <?php
                            }
                            else
                            {
                              ?>
                                  <script>alert('Failed, Please try again');
                              window.location.href='usersmaster.php';
                              </script>                       
                          <?php
                            }
         }
         else
                    {
                      ?>
                       <script>alert('Security Code Does not match');
                       window.location.href='usersmaster.php';
                       </script>                       
                    <?php
                    }
                  }
                  else
                  {
                    ?>
                       <script>alert('New password & confirm password Does not match');
                       window.location.href='usersmaster.php';
                       </script>                       
                    <?php
                  }
	
}
?>