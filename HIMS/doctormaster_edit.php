<html>
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
			url: "get_ddata.php",
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
			url: "get_ddata.php",
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
<?php include('menu.php');
include('dbcon.php'); ?>
	<form action="#" method="post" class="register">
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
			<?php if($_GET['t1']=="OP")
			{
			echo "<input type='radio' name='ctype' value='OP' checked> </input><label> OP</label>";
			echo "<input type='radio' name='ctype' value='IP'> </input><label> IP</label>";
			echo "<input type='radio' name='ctype' value='Both'> </input><label> Both</label>";
			echo "<input type='radio' name='ctype' value='NotRequired'> </input><label> Not Required</label>";
			}
			if($_GET['t1']=="IP")
			{
			echo "<input type='radio' name='ctype' value='OP'> </input><label> OP</label>";
			echo "<input type='radio' name='ctype' value='IP' checked> </input><label> IP</label>";
			echo "<input type='radio' name='ctype' value='Both'> </input><label> Both</label>";
			echo "<input type='radio' name='ctype' value='NotRequired'> </input><label> Not Required</label>";
			}
			if($_GET['t1']=="Both")
			{
			echo "<input type='radio' name='ctype' value='OP'> </input><label> OP</label>";
			echo "<input type='radio' name='ctype' value='IP'> </input><label> IP</label>";
			echo "<input type='radio' name='ctype' value='Both' checked> </input><label> Both</label>";
			echo "<input type='radio' name='ctype' value='NotRequired'> </input><label> Not Required</label>";
			}
			if($_GET['t1']=="NotRequired")
			{
		echo "<input type='radio' name='ctype' value='OP'> </input><label> OP</label>";
			echo "<input type='radio' name='ctype' value='IP'> </input><label> IP</label>";
			echo "<input type='radio' name='ctype' value='Both'> </input><label> Both</label>";
			echo "<input type='radio' name='ctype' value='NotRequired' checked> </input><label> Not Required</label>";
			}
			 ?>
			 </fieldset>	
			
			<fieldset class="row2" style="height:40px;margin-left: 10px;">
              <legend> Doctor Type</legend>
			  <?php 
			  if($_GET['t2']=="Physician")
			{
		echo "<input type='radio' name='dtype' value='Physician' checked>  </input><label>Physician</label>";
			echo "<input type='radio' name='dtype' value='Surgeon'></input><label> Surgeon </label>";
			echo "<input type='radio' name='dtype' value='Both'></input><label> Both </label>";
			}
			if($_GET['t2']=="Surgeon")
			{
		echo "<input type='radio' name='dtype' value='Physician'>  </input><label>Physician</label>";
			echo "<input type='radio' name='dtype' value='Surgeon' checked></input><label> Surgeon </label>";
			echo "<input type='radio' name='dtype' value='Both'></input><label> Both </label>";
			}
			if($_GET['t2']=="Both")
			{
		echo "<input type='radio' name='dtype' value='Physician'>  </input><label>Physician</label>";
			echo "<input type='radio' name='dtype' value='Surgeon'></input><label> Surgeon </label>";
			echo "<input type='radio' name='dtype' value='Both' checked></input><label> Both </label>";
			}
			
			?>
			</fieldset>
			</br>
			<p>
				<label> Doctor Code </label>
			
			<input type='text' name='drcode' value="<?php echo $_GET['t3']; ?>" style='width:185px; height:23px;' readonly>
			
      		
		</p><br><br><p>
			<label>Doctor Name</label>
			<input type="text" name="drname" value="<?php echo $_GET['t4']; ?>" style='width:185px; height:23px;'/> 
			<label> Alias Name </label><input type="text" name="aname" value="<?php echo $_GET['t5']; ?>" style='width:185px; height:23px;'/></p>
			<br><br><p>
		    <label> Specialization </label> 
			<select name="speci" id="tarapp" class="tar"  style='width:185px; height:25px;' required>
			
			<?php 
			$str1="SELECT *  from  specilization_master where spl_code='".$_GET['t6']."'";
$result1=$conn->query($str1);
$row1 = $result1->fetch_assoc();
echo "<option value='".$_GET['t6']."'>".$row1['spl_name']."</option>";
$str="SELECT *  from  specilization_master where spl_status=true";
$result=$conn->query($str);
//echo "<select name='cnames'>";
    while($row = $result->fetch_assoc()) {
	echo "<option value='".$row['spl_code']."'>".$row['spl_name']."</option>";
}
?>
                    </select>
					  
			<input type="text" id="tn" name="tn" class="tntxt" value="<?php echo $_GET['t6']; ?>" style='width:185px; height:23px;' disabled>
					
			<label> Designation </label>
			<select name="desig" id="tarapp" class="des" style='width:185px; height:25px;' required>
			
			<?php 
			$str1="SELECT *  from  designation_master where desg_code='".$_GET['t7']."'";
$result1=$conn->query($str1);
$row1 = $result1->fetch_assoc();
echo "<option value='".$_GET['t7']."'>".$row1['desg_name']."</option>";
$str="SELECT *  from  designation_master where desg_status=true";
$result=$conn->query($str);
//echo "<select name='cnames'>";

    while($row = $result->fetch_assoc()) {
	echo "<option value='".$row['desg_code']."'>".$row['desg_name']."</option>";
}
?>
                    </select>
					  
			<input type="text" id="des1" name="des1" class="tntxt" value="<?php echo $_GET['t7']; ?>" style='width:185px; height:23px;' disabled>
			
			</p><br><br><p>
			<label>  Department </label>
			<select name="dept" id="tarapp" class="dep" style='width:185px; height:25px;' required>
			
			<?php 
			$str1="SELECT *  from  department_master where dept_code='".$_GET['t8']."'";
$result1=$conn->query($str1);
$row1 = $result1->fetch_assoc();
echo "<option value='".$_GET['t8']."'>".$row1['dept_name']."</option>";
$str="SELECT *  from  department_master where dept_status=true";
$result=$conn->query($str);
//echo "<select name='cnames'>";

    while($row = $result->fetch_assoc()) {
	echo "<option value='".$row['dept_code']."'>".$row['dept_name']."</option>";
}
?>
                    </select>
					  
			<input type="text" id="dep1" name="tn" class="tntxt" value="<?php echo $_GET['t8']; ?>" style='width:185px; height:23px;' disabled>
			
		<label> Registration </label><input type="text" name="reg" value="<?php echo $_GET['t9']; ?>" style='width:185px; height:23px;'/></p><br><br><p>
			<label> Qualification </label><input type="text" name="quali" value="<?php echo $_GET['t10']; ?>" style='width:185px; height:23px;'/></p><br><br><p>	
			<label> Date Of Birth  </label><input type="date" name="dob" value="<?php echo $_GET['t11']; ?>" style='width:185px; height:23px;'/></p><br><br>
			<p>
			</br>
			<fieldset class="row2" style="height:40px;width:480px;">
			   <legend>Consulting Type </legend>
			  <?php 
			  if($_GET['t12']=="Visiting")
			{
		echo "<input type='radio' name='cgtype' value='Visiting' checked> </input><label>Visiting </label>";
			echo "<input type='radio' name='cgtype' value='Resident'></input><label> Resident </label>";
			}
			if($_GET['t12']=="Resident")
			{
		echo "<input type='radio' name='cgtype' value='Visiting'> </input><label>Visiting </label>";
			echo "<input type='radio' name='cgtype' value='Resident' checked></input><label> Resident </label>";
			}
			?>
			 </fieldset>  
	
			<fieldset class="row2" style="height:40px;margin-left: 10px;">
			   <legend>Payment Type </legend>
			   <?php
			    if($_GET['t13']=="Salaried")
			{
		echo "<input type='radio' name='ptype' value='Salaried' checked></input><label> Salaried</label>";
			echo "<input type='radio' name='ptype' value='Honorary'> </input><label>Honorary</label>";
			echo "<input type='radio' name='ptype' value='Both'></input><label> Both</label>";
			}
			if($_GET['t13']=="Honorary")
			{
		echo "<input type='radio' name='ptype' value='Salaried'></input><label> Salaried</label>";
			echo "<input type='radio' name='ptype' value='Honorary'checked> </input><label>Honorary</label>";
			echo "<input type='radio' name='ptype' value='Both'></input><label> Both</label>";
			}
			if($_GET['t13']=="Both")
			{
		echo "<input type='radio' name='ptype' value='Salaried'></input><label> Salaried</label>";
			echo "<input type='radio' name='ptype' value='Honorary'> </input><label>Honorary</label>";
			echo "<input type='radio' name='ptype' value='Both'checked></input><label> Both</label>";
			}
			
			?>
			</fieldset>  </p>
			</br>
			 <label>PAN No</label> <input type="text" name="panno" value="<?php echo $_GET['t14']; ?>" style='width:185px; height:23px;'/>
			<label>App No </label><input type="text" name="appno" value="<?php echo $_GET['t15']; ?>" style='width:185px; height:23px;'/>
			<label>Account No </label><input type="text" name="accno" value="<?php echo $_GET['t16']; ?>" style='width:185px; height:23px;'/> <p><br><br>
<fieldset class="row1" style="width:1050px";> <legend> Address Details </legend>
</p><p><label>Address </label> <textarea name="addr" style="margin-left:-80px;width:370px;"> <?php echo $_GET['t17']; ?></textarea></p><p>
<label>City </label>
<select name="city" id="city" class="city" style="width:185px; height:23px;margin-left:-80px;" required>
			
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
					  
			<input type="text" id="city1" name="tn" class="tntxt" value="<?php echo $_GET['t18']; ?>" style='width:185px; height:23px;' disabled>
<label>Pincode </label><input type="text" name="pin" id="pin" class="pin" value="<?php echo $_GET['t21']; ?>" style="width:185px; height:23px;margin-left:-80px;"/></p><p>
<label>State </label>
<select name="state" id="state" class="state" style="width:185px; height:23px;margin-left:-80px;" required>
			
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
					  
			<input type="text" id="state1" name="tn" class="tntxt" value="<?php echo $_GET['t19']; ?>" style='width:185px; height:23px;' disabled>

<label>Country </label>
  <select name="coun" id="coun" class="coun" style="width:185px; height:23px;margin-left:-80px;" required>
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
					  
			<input type="text" id="coun1" name="tn" class="tntxt" disabled value="<?php echo $_GET['t20']; ?>" style='width:185px; height:23px;'></p><p>
</p><p>
<label>Mobile</label> <input type="text" name="mob" value="<?php echo $_GET['t22']; ?>" style="width:185px; height:23px;margin-left:-80px;"/>
<label>Contact Person</label><input type="text" name="cperson" value="<?php echo $_GET['t23']; ?>" style='width:185px; height:23px;'/>
<label>Email </label><input type="text" name="email" value="<?php echo $_GET['t24']; ?>" style='width:185px; height:23px;'/>
</fieldset>
<p>
<?php if($_GET['t29']=='1')
			{
			echo "<label>Active</label> <input type='checkbox' name='stat' value='1' checked>";
			}
			else
			{
				echo "<label>Active</label> <input type='checkbox' name='stat' value='0'>";
			}
			?>

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
$val1=$_POST['ctype'];
$val2=$_POST['dtype'];
$val3=$_POST['drcode'];
$val4=$_POST['drname'];
$val5=$_POST['aname'];
$val6=$_POST['speci'];
$val7=$_POST['desig'];
$val8=$_POST['dept'];
$val9=$_POST['reg'];
$val10=$_POST['quali'];
$val11=$_POST['dob'];
$val12=$_POST['cgtype'];
$val13=$_POST['ptype'];
$val14=$_POST['panno'];
$val15=$_POST['appno'];
$val16=(int)$_POST['accno'];
$val17=$_POST['addr'];
$val18=$_POST['city'];
$val19=$_POST['state'];
$val20=$_POST['coun'];
$val21=(int)$_POST['pin'];
$val22=(int)$_POST['mob'];
$val23=$_POST['cperson'];
$val24=$_POST['email'];
$t=time();
if (isset($_POST['stat'])) {
    $val25=true;
}
else
{
	$val25=false;
}
$str1="select * from doctor where doc_drcode='".$val3."'";
$result1=$conn->query($str1);
$row1 = $result1->fetch_assoc();
$val30=$row1['doc_createdby'];
$val31=$row1['doc_createdate'];
$str2="delete from doctor where doc_drcode='".$val3."'";
$conn->query($str2);
$str="insert into doctor values('".$val1."','".$val2."','".$val3."','".$val4."','".$val5."','".$val6."','".$val7."','".$val8."','".$val9."','".$val10."','".$val11."','".$val12."','".$val13."','".$val14."','".$val15."','".$val16."','".$val17."','".$val18."','".$val19."','".$val20."','".$val21."','".$val22."','".$val23."','".$val24."','".$val30."','".$val31."','".$_SESSION['username']."','".date('Y-m-d h:i:s',$t)."','".$val25."')";

if ($conn->query($str) == TRUE) {
    echo "<script>";
	echo "window.alert('Sucessfully Updated');";
	echo "window.location.href='doctable.php';";
	echo "</script>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
}
?>