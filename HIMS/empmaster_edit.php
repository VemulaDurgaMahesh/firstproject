<html lang="en">
<head>
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
	$(".tar").change(function() {
		var id=$(this).val();
          $("#tn").val(id);
        })	
	$(".tar1").change(function() {
		var id=$(this).val();
          $("#tn1").val(id);
        })	
	$(".tar2").change(function() {
		var id=$(this).val();
          $("#tn2").val(id);
        })	
	
	$(".citycod").change(function()
	{
		var id=$(this).val();
          $("#cityname").val(id);
		 
		
			var dataString = 'id6='+ id;
		
	
		$.ajax
		({
			type: "POST",
			url: "get_data.php",
			data: dataString,
			cache: false,
			success: function(html)
			{
				
				$(".scode").html(html);
				var val1=$( "#scode option:selected").val();
				$("#sname").val(val1);
			} 
		});
	});
		
});
</script>
</head>
<body>
	<?php include('menu.php'); ?>
	<form action="empmasterp.php" method="post" class="register">
	<p>
		<div>
<ul class="drop_menu">
               <li>
              <a href="emptable_search.php">
                Search
              </a>
              </li>
                <li><a href="emptable.php">View</a></li>
                <li>
                  <button class="button" type="submit">Save</button></li>
				  </ul>
				  </div>
</p>
	<div class="image">
              <img src="images/3.jpg" width="100%" height="100px"/>
              <h2>  Employee Master </h2>
        </div>
		<p>
		  <label>Category</label>
	<select name="cat" id="cat" class="tar" required>
			
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
echo "<option value=''>--select category--</option>";

$str="SELECT *  from  category_master where cat_status=true";
$result=$conn->query($str);
//echo "<select name='cnames'>";

    while($row = $result->fetch_assoc()) {
	echo "<option value='".$row['cat_code']."'>".$row['cat_name']."</option>";
}
?>
                     
                      </select>
					  
			<input type="text" id="tn" name="tn" class="tntxt" disabled>		  
		  
		  
		  
			<label>Employee Code</label>	<input type="text" name="ecode" value="<?php echo $_GET['t7']; ?>" readonly='readonly' required>
				<label>Employee Type</label><select name="etype" value="<?php echo $_GET['t8']; ?>">
			 <option value="Permanent">Permanent </option>
			 <option value="Temporary"> Temporary </option>
			 </select>
			 <label>Date Of Birth</label>  <input type="date" name="dob" value="<?php echo $_GET['t2']; ?>" readonly='readonly' required >
			 </p><p>
			 <label>Date Of Joining</label>  <input type="date" name="doj" value="<?php echo $_GET['t3']; ?>" readonly='readonly' required >
			
							<label>Week Off Day</label><select name="wod" value="<?php echo $_GET['t4']; ?>">
				
			 <option value="Sunday"> Sunday </option>
			 <option value="Monday"> Monday </option>
			 <option value="Tuesday"> Tuesday </option>
			 <option value="Wednesday"> Wednesday </option>
			 <option value="Thursday"> Thursday </option>
			 <option value="Friday"> Friday </option>
			 <option value="Saturday"> Saturday </option>
			 </select> 			 
			<label>Employee Shift</label><input type="text" name="eshift" value="<?php echo $_GET['t5']; ?>"></p><p>
			<label>Employee Name</label><select name="en" >
			 <option value="Dr. ">Dr. </option>
			 <option value="Asst Dr. "> Asst Dr. </option>
			<input type="text" name="ename" value="<?php echo $_GET['t6']; ?>">
              <label> Gender </label>			
			<input type="radio" name="gen" value="Male" value="<?php echo $_GET['t9']; ?>" readonly='readonly' required></input> <label>Male</label> 
			<input type="radio" name="gen" value="Female" value="<?php echo $_GET['t9']; ?>" readonly='readonly' required></input><label> Female </label>
			 	<label>Qualification</label> <input type="text" name="quali" value="<?php echo $_GET['t10']; ?>"></p><p>
			 	<label>Father/Husband/Guardian </label><select name="care" value="<?php echo $_GET['t11']; ?>">
			 <option value="S/O"> S/O </option>
			 <option value="W/O"> W/O </option>
			 <option value="C/O"> C/O </option>
			 </select>	
			 <label>Department</label>
	<select name="cat1" id="cat1" class="tar1" value="<?php echo $_GET['t12']; ?>"required>
			
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
echo "<option value=''>--select department--</option>";

$str="SELECT *  from  department_master where dept_status=true";
$result=$conn->query($str);
//echo "<select name='cnames'>";

    while($row = $result->fetch_assoc()) {
	echo "<option value='".$row['dept_code']."'>".$row['dept_name']."</option>";
}
?>
                     
                      </select>
					  
			<input type="text" id="tn1" name="tn1" class="tntxt1" disabled>
			 <label>Designation</label>
	<select name="cat2" id="cat2" class="tar2" required>
			
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
					  
			<input type="text" id="tn2" name="tn2" class="tntxt2" disabled>
			 <label>Designation</label> <input type="text" name="desig" value="<?php echo $_GET['t13']; ?>">
			 <label>PF No</label> <input type="text" name="pfno" value="<?php echo $_GET['t14']; ?>" readonly='readonly' required></p><p>
			 <label>Ledger No </label><input type="text" name="legno" value="<?php echo $_GET['t15']; ?>" readonly='readonly' required>
			<label>Payment Mode </label><select name="pmode" value="<?php echo $_GET['t16']; ?>" readonly='readonly' required>
			 <option value="Cash"> Cash</option>
			 <option value="Account"> Account </option>
			 </select>		
			 <label>Account No </label><input type="text" name="accno" value="<?php echo $_GET['t17']; ?>" readonly='readonly' required>
             <label>Status</label><select name="estatus" value="<?php echo $_GET['t18']; ?>">
			 <option value="Working"> Working </option>
			 <option value="Other"> Other </option>
			 </select>		
			 <label>Permanent on</label> <input type="date" name="permd" value="<?php echo $_GET['t19']; ?>" readonly='readonly' required>
			 <label>Resigned on</label> <input type="date" name="resd" value="<?php echo $_GET['t20']; ?>" readonly='readonly' required>
			 <label>Blood Group </label><select name="bgroup" value="<?php echo $_GET['t21']; ?>" readonly='readonly' required>
			 <option value="NotRequired"> NotRequired</option>
			 <option value="A+ve"> A+ve </option>
			 <option value="A-ve"> A-ve </option>
			 <option value="B+ve"> B+ve </option>
			 <option value="B-ve"> B-ve </option>
			 <option value="AB+ve"> AB+ve </option>
			 <option value="AB-ve"> AB-ve </option>
			 <option value="O+ve"> O+ve </option>
			 <option value="O-ve"> O-ve </option>
			 </select>
			 <label>Deductions</label> <select name="deduc" value="<?php echo $_GET['t22']; ?>">
			 <option value="PF"> PF </option>
			 <option value="Tax"> Tax </option>
			 </select>
			  <label>Registration No</label> <input type="text" name="reg" value="<?php echo $_GET['t23']; ?>" readonly='readonly' required>
			  <label>PAN No</label><input type="text" name="panno" value="<?php echo $_GET['t24']; ?>" readonly='readonly' required></p><p>
			  <fieldset> <legend class="addrs">Address Details </legend>
			  
			  <label>Address</label> <textarea name="addr" value="<?php echo $_GET['t25']; ?>"> Please enter the address </textarea></p><p>
			  <label>City </label>
			  <select name="cat" id="cat" class="citycod" value="<?php echo $_GET['t26']; ?>" required>
			
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
echo "<option value=''>--select city--</option>";

$str="SELECT *  from  city";
$result=$conn->query($str);
//echo "<select name='cnames'>";

    while($row = $result->fetch_assoc()) {
	echo "<option value='".$row['citycode']."'>".$row['cityname']."</option>";
}
?>
                     
                      </select>
			  <label>State </label><input type="text" name="state" class="scode" value="<?php echo $_GET['t27']; ?>">
			  <label>Country </label><input type="text" name="coun" value="<?php echo $_GET['t28']; ?>"></p>
			  <label>Pincode </label><input type="text" name="pin" value="<?php echo $_GET['t29']; ?>">
			  <label>Mobile </label><input type="text" name="mob" value="<?php echo $_GET['t30']; ?>">
			 <label>Contact Person</label><input type="text" name="cperson" value="<?php echo $_GET['t31']; ?>">
			 <label>Email </label><input type="text" name="email" value="<?php echo $_GET['t32']; ?>">
			</fieldset></p><p>
			<fieldset> <legend> Salary Details </legend>
			 <label>Gross</label>  <input type="text" name="gross" value="<?php echo $_GET['t33']; ?>" readonly='readonly' required>
			  <label>Basic</label> <input type="text" name="basic" value="<?php echo $_GET['t34']; ?>" readonly='readonly' required>
			  <label>DA</label> <input type="text" name="da" value="<?php echo $_GET['t35']; ?>" readonly='readonly' required>
			  <label>HRA</label> <input type="text" name="hra" value="<?php echo $_GET['t36']; ?>" readonly='readonly' required>
			  <label>Conveyance </label><input type="text" name="con" value="<?php echo $_GET['t37']; ?>" readonly='readonly' required>
			  <label>Wash </label><input type="text" name="wash" value="<?php echo $_GET['t38']; ?>" readonly='readonly' required>
			  <label>Medical </label><input type="text" name="med" value="<?php echo $_GET['t39']; ?>" readonly='readonly' required>
			  <label>City/Incharge </label><input type="text" name="cityinc" value="<?php echo $_GET['t40']; ?>" readonly='readonly' required>
			  <label>CCA </label><input type="text" name="cca" value="<?php echo $_GET['t41']; ?>" readonly='readonly' required>
			  <label>Other/Special</label> <input type="text" name="othspe" value="<?php echo $_GET['t42']; ?>" readonly='readonly' required>
			  <label>LTA / Ward</label> <input type="text" name="lta" value="<?php echo $_GET['t43']; ?>" readonly='readonly' required>
			  <label>PF (Y/N)</label><input type="checkbox" name="pfs" value="YES" value="<?php echo $_GET['t44']; ?>" readonly='readonly' required></p><p>
			  <label>P.Tax </label><input type="text" name="ptax" value="<?php echo $_GET['t45']; ?>" readonly='readonly' required>
			  <label>PF </label><input type="text" name="pf" value="<?php echo $_GET['t46']; ?>" readonly='readonly' required>
			  <label>PF Employer </label><input type="text" name="pfe" value="<?php echo $_GET['t47']; ?>" readonly='readonly' required>
			  <label>Others </label><input type="text" name="othe" value="<?php echo $_GET['t48']; ?>" readonly='readonly' required>
			  <label>ESI Deductions </label><input type="text" name="esided" value="<?php echo $_GET['t49']; ?>" readonly='readonly' required>
			  <label>ESI Employer </label><input type="text" name="esiemp" value="<?php echo $_GET['t50']; ?>" readonly='readonly' required>
			  <label>Hostel</label> <input type="text" name="hostel" value="<?php echo $_GET['t51']; ?>" readonly='readonly' required>
			  <label>TDS </label><input type="text" name="tds" value="<?php echo $_GET['t52']; ?>" readonly='readonly' required>
			  <label>Voluntary PF </label><input type="text" name="volun" value="<?php echo $_GET['t53']; ?>" readonly='readonly' required>
			 <br/>
</fieldset>
		 <button class="button" type="submit"> Submit </button>
		 <form action="doctortable.php"><button class="button" type="submit">View</button></form>
		</form>
		</body>
		</html>