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
$str1="SELECT *  from  category_master where cat_code='".$_GET['t1']."'";
$result1=$conn->query($str1);
$row1 = $result1->fetch_assoc();
echo "<option value='".$row1['cat_code']."'>".$row1['cat_name']."</option>";
$str="SELECT *  from  category_master where cat_status=true";
$result=$conn->query($str);
//echo "<select name='cnames'>";

    while($row = $result->fetch_assoc()) {
	echo "<option value='".$row['cat_code']."'>".$row['cat_name']."</option>";
}
?>
                     
                      </select>
					  
			<input type="text" id="tn" name="tn" class="tntxt" value="<?php echo $_GET['t1'];?>" disabled>		  
		  
		  
		  </p>
		  <p>
			<label>Employee Code</label>	<input type="text" name="ecode" value="<?php echo $_GET['t7'];?>" readonly/>
				<label style="margin-left:10px;">Employee Type</label><select name="etype">
				<?php 
				if($_GET['t8']=="Permanent")
				{
			 echo "<option value='Permanent' selected>Permanent </option>";
			 echo "<option value='Temporary' > Temporary </option>";
				}
				else
				{
					 echo "<option value='Permanent' >Permanent </option>";
			 echo "<option value='Temporary' selected> Temporary </option>";
				}
			 
			 ?>
			 </select>
			 <label>Date Of Birth</label>  <input type="date" name="dob" value="<?php echo $_GET['t2'];?>"/>
			
			 <label>Date Of Joining</label>  <input type="date" name="doj" value="<?php echo $_GET['t3'];?>"/>
			 </p>
			<p>
			<label>Week Off Day</label><select name="wod">
			 <option value="<?php echo $_GET['t4'];?>"><?php echo $_GET['t4'];?></option>	
			 <option value="Sunday"> Sunday </option>
			 <option value="Monday"> Monday </option>
			 <option value="Tuesday"> Tuesday </option>
			 <option value="Wednesday"> Wednesday </option>
			 <option value="Thursday"> Thursday </option>
			 <option value="Friday"> Friday </option>
			 <option value="Saturday"> Saturday </option>
			 </select>		 
			<label>Employee Shift</label><input type="text" name="eshift" value="<?php echo $_GET['t5'];?>"/>
              <label> Gender </label>	<?php	
				if($_GET['t9']=="Male")
				{
			echo "<input type='radio' name='gen' value='Male' checked></input> <label>Male</label> ";
			echo "<input type='radio' name='gen'  value='Female'></input><label> Female </label>";
				}
				else
				{
			echo "<input type='radio' name='gen' value='Male'></input> <label>Male</label> ";
			echo "<input type='radio' name='gen'  value='Female' checked></input><label> Female </label>";
				}
			?>
			</p>
			<p>
			<label>Employee Name</label>
			<input type="text" name="ename" value="<?php echo $_GET['t6'];?>" style="width:220px;"/>
			<label style="width:180px;margin-left:10px;">Father/Husband/Guardian </label><select name="care">
				 <option value="<?php echo $_GET['t11'];?>"><?php echo $_GET['t11'];?></option>
			 <option value="S/O"> S/O </option>
			 <option value="W/O"> W/O </option>
			 <option value="C/O"> C/O </option>
			 </select><input type="text" name="efname"/ value="<?php echo $_GET['t59'];?>">	</p>
				<p><label>Qualification</label> <input type="text" name="quali" value="<?php echo $_GET['t10'];?>"/>
			 </p>
			 <p>
			 <label>Department</label>
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
$str1="SELECT *  from  department_master where dept_code='".$_GET['t12']."'";
$result1=$conn->query($str1);
$row1 = $result1->fetch_assoc();
echo "<option value='".$_GET['t12']."'>".$row1['dept_name']."</option>";
$str="SELECT *  from  department_master where dept_status=true";
$result=$conn->query($str);
//echo "<select name='cnames'>";

    while($row = $result->fetch_assoc()) {
	echo "<option value='".$row['dept_code']."'>".$row['dept_name']."</option>";
}
?>
                     
                      </select>
					  
			<input type="text" id="tn1" name="tn1" class="tntxt1" value="<?php echo $_GET['t12'];?>" disabled>
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
$str1="SELECT *  from  designation_master where desg_code='".$_GET['t13']."'";
$result1=$conn->query($str1);
$row1 = $result1->fetch_assoc();
echo "<option value='".$_GET['t13']."'>".$row1['desg_name']."</option>";

$str="SELECT *  from  designation_master where desg_status=true";
$result=$conn->query($str);
//echo "<select name='cnames'>";

    while($row = $result->fetch_assoc()) {
	echo "<option value='".$row['desg_code']."'>".$row['desg_name']."</option>";
}
?>
                     
                      </select>
					  
			<input type="text" id="tn2" name="tn2" class="tntxt2" value="<?php echo $_GET['t13'];?>" disabled></p>
			<p>
			 <label>PF No</label> <input type="text" name="pfno" value="<?php echo $_GET['t14'];?>"/>
			 <label style="margin-left:10px;">Ledger No </label><input type="text" name="legno" value="<?php echo $_GET['t15'];?>"/>
			<label style="margin-left:10px;">Payment Mode </label><select name="pmode">
			 <option value="<?php echo $_GET['t16'];?>"> <?php echo $_GET['t16'];?></option><option value="Cash"> Cash</option>
			 <option value="Account"> Account </option>
			 </select>		
			 <label>Account No </label><input type="text" name="accno" value="<?php echo $_GET['t17'];?>"/>
			 </p>
			 <p>
             <label>Status</label><select name="estatus">
			 <option value="<?php echo $_GET['t18'];?>"><?php echo $_GET['t18'];?> </option><option value="Working"> Working </option>
			 <option value="Other"> Other </option>
			 </select>
			 <label>Permanent on</label> <input type="date" name="permd" value="<?php echo $_GET['t19'];?>">
			 <label>Resigned on</label> <input type="date" name="resd" value="<?php echo $_GET['t20'];?>">
			 </p>
			 <p>
			 <label>Blood Group </label><select name="bgroup">
			 <option value="<?php echo $_GET['t21'];?>"><?php echo $_GET['t21'];?></option>
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
			 <label>Deductions</label> <select name="deduc">
			 <option value="<?php echo $_GET['t22'];?>"><?php echo $_GET['t22'];?></option> 
			 <option value="PF"> PF </option>
			 <option value="Tax"> Tax </option>
			 </select>
			  <label>Registration No</label> <input type="text" name="reg" value="<?php echo $_GET['t23'];?>">
			  <label>PAN No</label><input type="text" name="panno" value="<?php echo $_GET['t24'];?>">
			  </p><br>
			  <p>
			  </fieldset>
			  <div style="margin-left:0px;">
			  <fieldset class="row3" style="width:95%"> <legend>Address Details </legend>
			  <p>
			  <label>Address</label> <textarea name="addr" ><?php echo $_GET['t25'];?> </textarea></p>
			  <p>
			  <label>City </label>
<select name="city" id="tarapp" class="city" style="width:110px;" required>
			
			<?php 
$str="SELECT *  from  city_master where city_status=true";
$result=$conn->query($str);
//echo "<select name='cnames'>";
$str1="SELECT *  from  city_master where city_code='".$_GET['t26']."'";
$result1=$conn->query($str1);
$row1 = $result1->fetch_assoc();
echo "<option value='".$row1['city_code']."'>".$row1['city_name']."</option>";
    while($row = $result->fetch_assoc()) {
	echo "<option value='".$row['city_code']."'>".$row['city_name']."</option>";
}
?>
                    </select>
					  
			<input type="text" id="city1" name="tn" class="tntxt" value="<?php echo $_GET['t26'];?>" disabled>
<label style="width:80px;">State </label>
<select name="state" id="state" class="state" style="width:110px;" required>
			
			<?php 
$str="SELECT *  from  state_master where state_status=true";
$result=$conn->query($str);
$str1="SELECT *  from  state_master where state_code='".$_GET['t27']."'";
$result1=$conn->query($str1);
$row1 = $result1->fetch_assoc();
echo "<option value='".$row1['state_code']."'>".$row1['state_name']."</option>";
    while($row = $result->fetch_assoc()) {
	echo "<option value='".$row['state_code']."'>".$row['state_name']."</option>";
}
?>
                    </select>
					  
			<input type="text" id="state1" name="tn" class="tntxt" value="<?php echo $_GET['t27'];?>" disabled>
<label style="width:80px;">Country </label>
  <select name="coun" id="coun" class="coun" style="width:120px;" required>
			<?php 
$str="SELECT *  from  country_master where country_status=true";
$result=$conn->query($str);
$str1="SELECT *  from  country_master where country_code='".$_GET['t28']."'";
$result1=$conn->query($str1);
$row1 = $result1->fetch_assoc();
echo "<option value='".$row1['country_code']."'>".$row1['country_name']."</option>";
    while($row = $result->fetch_assoc()) {
	echo "<option value='".$row['country_code']."'>".$row['country_name']."</option>";
}
?>
                    </select>
					  
			<input type="text" id="coun1" name="tn" class="tntxt" value="<?php echo $_GET['t28'];?>" disabled>
</p>
			<p>
			  <label>Pincode </label><input type="text" name="pin" value="<?php echo $_GET['t29'];?>"/>
			  <label>Mobile </label><input type="text" name="mob" value="<?php echo $_GET['t30'];?>"/>
			 <label>Contact Person</label><input type="text" name="cperson" value="<?php echo $_GET['t31'];?>"/>
			 <label>Email </label><input type="text" name="email" value="<?php echo $_GET['t32'];?>"/>
			 </p>
			</fieldset><br></div><br><br></p>
			<p>
			<fieldset class="row3" style="width:95%"> <legend> Salary Details </legend>
			<p>
			 <label>Gross</label>  <input type="text" name="gross" value="<?php echo $_GET['t33'];?>"/>
			  <label>Basic</label> <input type="text" name="basic" value="<?php echo $_GET['t34'];?>"/>
			  <label>DA</label> <input type="text" name="da" value="<?php echo $_GET['t35'];?>"/>
			  <label>HRA</label> <input type="text" name="hra" value="<?php echo $_GET['t36'];?>"/>
		</p>
		<p>
			  <label>Conveyance </label><input type="text" name="con" value="<?php echo $_GET['t37'];?>"/>
			  <label>Wash </label><input type="text" name="wash" value="<?php echo $_GET['t38'];?>"/>
			  <label>Medical </label><input type="text" name="med" value="<?php echo $_GET['t39'];?>"/>
			  <label>City/Incharge </label><input type="text" name="cityinc" value="<?php echo $_GET['t40'];?>"/>
			  </p>
			  <p>
			  <label>CCA </label><input type="text" name="cca" value="<?php echo $_GET['t41'];?>"/>
			  <label>Other/Special</label> <input type="text" name="othspe" value="<?php echo $_GET['t42'];?>"/>
			  <label>LTA / Ward</label> <input type="text" name="lta" value="<?php echo $_GET['t43'];?>"/>
			  <label>PF (Y/N)</label>
			  <?php
			  if($_GET['t44']==true)
			  echo" <input type='checkbox' name='pfs' value='1' checked>";
			else
				echo"  <input type='checkbox' name='pfs' value='0'>";
			  ?>
			  </p>
			  <p>
			  <label>P.Tax </label><input type="text" name="ptax" value="<?php echo $_GET['t45'];?>"/>
			  <label>PF </label><input type="text" name="pf" value="<?php echo $_GET['t46'];?>"/>
			  <label>PF Employer </label><input type="text" name="pfe" value="<?php echo $_GET['t47'];?>"/>
			  <label>Others </label><input type="text" name="othe" value="<?php echo $_GET['t48'];?>"/>
			  </p>
			  <p>
			  <label>ESI Deductions </label><input type="text" name="esided" value="<?php echo $_GET['t49'];?>"/>
			  <label>ESI Employer </label><input type="text" name="esiemp" value="<?php echo $_GET['t50'];?>"/>
			  <label>Hostel</label> <input type="text" name="hostel" value="<?php echo $_GET['t51'];?>"/>
			  <label>TDS </label><input type="text" name="tds" value="<?php echo $_GET['t52'];?>"/>
			  </p>
			  <p>
			  <label>Voluntary PF </label><input type="text" name="volun" value="<?php echo $_GET['t53'];?>"/>	  
			  </p>
</fieldset>
<?php if($_GET['t58']=='1')
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
$val1=$_POST['cat'];
$val2=$_POST['dob'];
$val3=$_POST['doj'];
$val4=$_POST['wod'];
$val5=$_POST['eshift'];
$val6=$_POST['ename'];
$val7=$_POST['ecode'];
$val8=$_POST['etype'];
$val9=$_POST['gen'];
$val10=$_POST['quali'];
$val11=$_POST['care'];
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

$val45=(float)$_POST['ptax'];
$val46=(float)$_POST['pf'];
$val47=(float)$_POST['pfe'];
$val48=(float)$_POST['othe'];
$val49=(float)$_POST['esided'];
$val50=(float)$_POST['esiemp'];
$val51=(float)$_POST['hostel'];
$val52=(float)$_POST['tds'];
$val53=(float)$_POST['volun'];
$val63=$_POST['efname'];
if (isset($_POST['stat'])) {
    $val62=true;
}
else
{
	$val62=false;
}
if (isset($_POST['pfs'])) {
    $val44=true;
}
else
{
	$val44=false;
}
$t=time();
$str1="select * from employee where emp_ecode='".$val7."'";
$result1=$conn->query($str1);
$row1 = $result1->fetch_assoc();
$val60=$row1['emp_createdby'];
$val61=$row1['emp_createdtime'];
$str2="delete from employee where emp_ecode='".$val7."'";
$conn->query($str2);
$str="insert into employee values('".$val1."','".$val2."','".$val3."','".$val4."','".$val5."','".$val6."','".$val7."','".$val8."','".$val9."','".$val10."','".$val11."','".$val12."','".$val13."','".$val14."','".$val15."','".$val16."','".$val17."','".$val18."','".$val19."','".$val20."','".$val21."','".$val22."','".$val23."','".$val24."','".$val25."','".$val26."','".$val27."','".$val28."','".$val29."','".$val30."','".$val31."','".$val32."','".$val33."','".$val34."','".$val35."','".$val36."','".$val37."','".$val38."','".$val39."','".$val40."','".$val41."','".$val42."','".$val43."','".$val44."','".$val45."','".$val46."','".$val47."','".$val48."','".$val49."','".$val50."','".$val51."','".$val52."','".$val53."','".$val60."','".$val61."','".$_SESSION['username']."','".date("Y-m-d h:m:s",$t)."','".$val62."','".$val63."')";
if ($conn->query($str) == TRUE) {
    echo "<script>";
	echo "window.alert('Sucessfully Entered New Record');";
	echo "window.location.href='emptable.php';";
	echo "</script>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
}?>