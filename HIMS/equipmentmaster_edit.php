<HTML>
<head>
<script type="text/javascript" src="jquery-1.4.1.min.js"></script>
<!--<script type="text/javascript">
$(document).ready(function()
{
	$(".form-control").change(function() {
		var id=$(this).val();
          $("#tn").val(id);
        })	
});
</script>-->
<meta charset='utf-8'>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="styles.css">
   <script src="jquery-latest.min.js" type="text/javascript"></script>
   <script src="script.js"></script>
<link rel="stylesheet" type="text/css" href="css/menu.css" />
<link rel="stylesheet" type="text/css" href="css/default.css" />
<title>    header </title>
</head>
<body>
<?php include('menu.php'); ?>
		<form action="#" method="post" class="register">
		<p>
		<div>
<ul class="drop_menu">
               <li>
              <a href="equipmentmaster_search.php">
                Search
              </a>
              </li>
                <li><a href="equipmentmastertable.php">View</a></li>
                <li>
                  <button class="button" type="submit">Save</button></li>
				  </ul>
				  </div>
</p>                		
		
		<div class="image">
              <img src="images/2.jpg" width="100%" height="100px"/>
              <h2> Equipment Master </h2>
        </div><BR><BR><BR><BR><br><br>
		<div style="width:600px; margin:0 auto;">
		<p class="agreement">
			<label>Equipment Group Name:</label>
			<input type="text" name="wgn" value="<?php echo $_GET['t12'];?>" required style="width:185px; height:23px;">
			</p><br><br>
			<p class="agreement">
			
			<label for="hname">Equipment Code: </label>
			<input type='text' name='egc' value="<?php echo $_GET['t1'];?>" readonly style="width:185px; height:23px;">
			</p><br><br>
			<p class="agreement">
			<label>Equipment Block:</label>
			<input type="text" name="eb" value="<?php echo $_GET['t9'];?>" required style="width:185px; height:23px;">
			</p><br><br>
			<p class="agreement">
			<label>Equipment Wing:</label>
			<input type="text" name="ew" value="<?php echo $_GET['t10'];?>" required style="width:185px; height:23px;">
			</p><br><br>
			<p class="agreement">
			<label>Equipment Name:</label>
			<input type="text" name="en" value="<?php echo $_GET['t2'];?>" required style="width:185px; height:23px;">
			</p><br><br>
			<p class="agreement">
			<label>Extension no:</label>
			<input type="text" name="exn" value="<?php echo $_GET['t11'];?>" required style="width:185px; height:23px;">
			</p><br><br>			
			
			<p class="agreement">
			<label>Equipment Level:</label>
			<input type="text" name="el" value="<?php echo $_GET['t8'];?>" required style="width:185px; height:23px;">
			</p><br><br>
			
			<p class="agreement">
			<?php if($_GET['t3']=='1')
			{
			echo "<label>Active</label> <input type='checkbox' name='stat' value='1' checked>";
			}
			else
			{
				echo "<label>Active</label> <input type='checkbox' name='stat' value='0'>";
			}
			?>
			</p>
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

$val1=$_POST['wgn'];
$val2=$_POST['egc'];
$val3=$_POST['en'];
$val5=$_POST['el'];
$val6=$_POST['eb'];
$val7=$_POST['ew'];
$val8=$_POST['exn'];

if (isset($_POST['stat'])) {
    $val4=true;
}
else
{
	$val4=false;
}
$str="UPDATE equipment_master SET eqp_groupname='".$val1."', eqp_name='".$val3."',eqp_status='".$val4."',eqp_level='".$val5."',eqp_block='".$val6."',eqp_wing='".$val7."',eqp_extensionno='".$val8."', eqp_modifyby='".$_SESSION['username']."', eqp_modifydate='".date("Y-m-d h:i:s")."' WHERE eqp_code='".$val2."'";
if ($conn->query($str) == TRUE) {
  echo "<script>";
	echo "window.alert('Updated');";
	echo "window.location.href='equipmentmastertable.php'";
	echo "</script>";
}
/*$str="ALTER TABLE soc_masters ADD ".$val2." INT NULL ";
if ($conn->query($str) == TRUE) {
    echo "<center><h1>created successfully</h1></center>";
}
$str1="ALTER TABLE normal_charge ADD ".$val2." INT NULL ";
if ($conn->query($str1) == TRUE) {
    echo "<center><h1>created successfully</h1></center>";
}
$str2="ALTER TABLE emerg_charges ADD ".$val2." INT NULL ";
if ($conn->query($str2) == TRUE) {
    echo "<center><h1>created successfully</h1></center>";
}
$str3="ALTER TABLE revisit_charges ADD ".$val2." INT NULL ";
if ($conn->query($str3) == TRUE) {
    echo "<center><h1>created successfully</h1></center>";
}*/
else
{
	echo "Error: " . $sql . "<br>" . $conn->error;
}
}
?>