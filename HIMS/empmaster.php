<html lang="en">
<head>
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
	<?php include('menu.php'); ?>
	<form action="#" method="post" class="register">
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
		<fieldset class="row3" style="width:95%">
		<legend>Employee Details</legend>
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
		  
		  
		  </p>
		  <p>
			<label>Employee Code</label>	<input type="text" name="ecode"/>
				<label style="margin-left:10px;">Employee Type</label><select name="etype">
			 <option value="Permanent">Permanent </option>
			 <option value="Temporary"> Temporary </option>
			 </select>
			 <label>Date Of Birth</label>  <input type="date" name="dob"/>
			
			 <label>Date Of Joining</label>  <input type="date" name="doj"/>
			 </p>
			<p>
			<label>Week Off Day</label><select name="wod">
			 <option value="Sunday"> Sunday </option>
			 <option value="Monday"> Monday </option>
			 <option value="Tuesday"> Tuesday </option>
			 <option value="Wednesday"> Wednesday </option>
			 <option value="Thursday"> Thursday </option>
			 <option value="Friday"> Friday </option>
			 <option value="Saturday"> Saturday </option>
			 </select> 	 
			<label>Employee Shift</label><input type="text" name="eshift"/>
              <label style="margin-left:10px;"> Gender </label>			
			<input type="radio" name="gen" value="Male"></input> <label>Male</label> 
			<input type="radio" name="gen" value="Female"></input><label> Female </label>
			 	</p>
				<p>
			<label>Employee Name</label><select name="en" style="width:100px;">
			 <option value="Dr. ">Dr. </option>
			 <option value="Asst Dr. "> Asst Dr. </option></select>
			<input type="text" name="ename" style="width:220px;"/>
		<label style="width:180px;margin-left:75px;">Father/Husband/Guardian </label><select name="care" style="width:100px;">
			 <option value="S/O"> S/O </option>
			 <option value="W/O"> W/O </option>
			 <option value="C/O"> C/O </option>
			 </select>	<input type="text" name="efname" style="width:160px;"/></p>
			
				<br>
				<p><label>Qualification</label> <input type="text" name="quali"/></p>
			 <p><label>Department</label>
	<select name="dept" id="cat1" class="tar1" required>	
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
			
			
<label style="margin-left:113px;">Designation</label>
<select name="desig" id="cat2" class="tar2" required>		
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
					  
			<input type="text" id="tn2" name="tn2" class="tntxt2" disabled>
			</P>
			<P>
			 <label>PF No</label> <input type="text" name="pfno"/>
			 <label style="margin-left:10px;">Ledger No </label><input type="text" name="legno"/>
			
			<label style="margin-left:12px;">Payment Mode </label><select name="pmode">
			 <option value="Cash"> Cash</option>
			 <option value="Account"> Account </option>
			 </select>		  
			 <label>Account No </label><input type="text" name="accno"/>
			 </p>
			 <p>
             <label>Status</label><select name="estatus">
			 <option value="Working"> Working </option>
			 <option value="Other"> Other </option>
			 </select>		
			 <label style="margin-right:0px;">Permanent on</label> <input type="date" name="permd">
			 <label style="margin-left:10px;margin-right:3px;">Resigned on</label> <input type="date" name="resd">
			 </p>
			 <p>
			 <label>Blood Group </label><select name="bgroup">
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
			 <label style="margin-right:3px;">Deductions</label> <select name="deduc">
			 <option value="PF"> PF </option>
			 <option value="Tax"> Tax </option>
			 </select>
			  <label>Registration No</label> <input type="text" name="reg">
			  <label style="margin-left:10px;">PAN No</label><input type="text" name="panno">
			  </p><br>
			  <p>
			  </fieldset>
			  <div style="margin-left:0px;">
			  <fieldset class="row3" style="width:95%"> <legend>Address Details </legend>
			  <p>
			  <label>Address</label> <textarea name="addr"></textarea></p>
			  <p>
			  <label>City </label>
<select name="city" id="tarapp" class="city" required style="width:110px;">
			
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
<label style="width:80px;">State </label>
<select name="state" id="state" class="state" required style="width:110px;">
			
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
<label style="width:80px;">Country </label>
  <select name="coun" id="coun" class="coun" style="width:120px;" required>
			<?php 
$str="SELECT *  from  country_master where country_status=true";
$result=$conn->query($str);
echo "<option value='NULL'>--Select Country--</option>";
    while($row = $result->fetch_assoc()) {
	echo "<option value='".$row['country_code']."'>".$row['country_name']."</option>";
}
?>
                    </select>
					  
			<input type="text" id="coun1" name="tn" class="tntxt" disabled>
			</p>
			<p>
			  <label>Pincode </label><input type="text" name="pin"/>
			  <label>Mobile </label><input type="text" name="mob"/>
			 <label>Contact Person</label><input type="text" name="cperson"/>
			 <label>Email </label><input type="text" name="email"/>
			 </p>
			</fieldset><br></div><br><br></p>
			<p>
<fieldset class="row3" style="width:95%"> <legend> Salary Details </legend>
       <p>
			 <label>Gross</label>  <input type="text" name="gross"/>
			  <label>Basic</label> <input type="text" name="basic"/>
			  <label>DA</label> <input type="text" name="da"/>
			  <label>HRA</label> <input type="text" name="hra"/>
		</p>
		<p>
			  <label>Conveyance </label><input type="text" name="con"/>
			  <label>Wash </label><input type="text" name="wash"/>
			  <label>Medical </label><input type="text" name="med"/>
			  <label>City/Incharge </label><input type="text" name="cityinc"/>
		 </p>
		<p>
			  <label>CCA </label><input type="text" name="cca"/>
			  <label>Other/Special</label> <input type="text" name="othspe"/>
			  <label>LTA / Ward</label> <input type="text" name="lta"/>
			  <label>PF (Y/N)</label><input type="checkbox" name="pfs" value="1">
		</p>
		<p>
			  <label>P.Tax </label><input type="text" name="ptax"/>
			  <label>PF </label><input type="text" name="pf"/>
			  <label>PF Employer </label><input type="text" name="pfe"/>
			  <label>Others </label><input type="text" name="othe"/>
			 </p>
			 <p>
			  <label>ESI Deductions </label><input type="text" name="esided"/>
			  <label>ESI Employer </label><input type="text" name="esiemp"/>
			  <label>Hostel</label> <input type="text" name="hostel"/>
			  <label>TDS </label><input type="text" name="tds"/>
			  </p>
			  <p>
			  <label>Voluntary PF </label><input type="text" name="volun"/>	  
		</p>
</fieldset>
		</form>
		<?php
include('dbcon.php');
if($_SERVER['REQUEST_METHOD']=='POST')
{
$val1=$_POST['cat'];
$val2=$_POST['dob'];
$val3=$_POST['doj'];
$val4=$_POST['wod'];
$val5=$_POST['eshift'];
$val6=$_POST['en'].$_POST['ename'];
$val7=$_POST['ecode'];
$val8=$_POST['etype'];
$val9=$_POST['gen'];
$val10=$_POST['quali'];
$val11=$_POST['care'];
$val54=$_POST['efname'];
$val12=$_POST['dept'];
$val13=$_POST['desig'];
$val14=$_POST['pfno'];
$val15=$_POST['legno'];
$val16=$_POST['pmode'];
$val17=(int)$_POST['accno'];
$val18=$_POST['estatus'];
$val19=$_POST['permd'];
$val20=$_POST['resd'];
$val21=$_POST['bgroup'];
$val22=$_POST['deduc'];
$val23=$_POST['reg'];
$val24=$_POST['panno'];
$val25=$_POST['addr'];
$val26=$_POST['city'];
$val27=$_POST['state'];
$val28=$_POST['coun'];
$val29=(int)$_POST['pin'];
$val30=(int)$_POST['mob'];
$val31=$_POST['cperson'];
$val32=$_POST['email'];
$val33=(float)$_POST['gross'];
$val34=(float)$_POST['basic'];
$val35=(float)$_POST['da'];
$val36=(float)$_POST['hra'];
$val37=(float)$_POST['con'];
$val38=(float)$_POST['wash'];
$val39=(float)$_POST['med'];
$val40=(float)$_POST['cityinc'];
$val41=(float)$_POST['cca'];
$val42=(float)$_POST['othspe'];
$val43=(float)$_POST['lta'];
if (isset($_POST['pfs'])) {
    $val44=true;
}
else
{
	$val44=false;
}
$val45=(float)$_POST['ptax'];
$val46=(float)$_POST['pf'];
$val47=(float)$_POST['pfe'];
$val48=(float)$_POST['othe'];
$val49=(float)$_POST['esided'];
$val50=(float)$_POST['esiemp'];
$val51=(float)$_POST['hostel'];
$val52=(float)$_POST['tds'];
$val53=(float)$_POST['volun'];
$t=time();
$str="insert into employee values('".$val1."','".$val2."','".$val3."','".$val4."','".$val5."','".$val6."','".$val7."','".$val8."','".$val9."','".$val10."','".$val11."','".$val12."','".$val13."','".$val14."','".$val15."','".$val16."','".$val17."','".$val18."','".$val19."','".$val20."','".$val21."','".$val22."','".$val23."','".$val24."','".$val25."','".$val26."','".$val27."','".$val28."','".$val29."','".$val30."','".$val31."','".$val32."','".$val33."','".$val34."','".$val35."','".$val36."','".$val37."','".$val38."','".$val39."','".$val40."','".$val41."','".$val42."','".$val43."','".$val44."','".$val45."','".$val46."','".$val47."','".$val48."','".$val49."','".$val50."','".$val51."','".$val52."','".$val53."','".$_SESSION['username']."','".date("Y-m-d h:m:s",$t)."',NULL,NULL,true,'".$val54."')";
if ($conn->query($str) == TRUE) {
	echo "<script>";
	echo "window.alert('Sucessfully Entered New Record');";
	echo "</script>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
}
?>
		</body>
		</html>