<html>
<?php
/*session_start();
$_SESSION['userid']="kishore";
$_SESSION['scode']="";*/
?>
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
              <a href="occupationmaster_search.php">
                Search
              </a>
              </li>
                <li><a href="occupationmastertable.php">View</a></li>
                <li>
                  <button class="button" type="submit">Save</button></li>
				  </ul>
				  </div>
</p>                	
		
		
		<div class="image">
              <img src="images/2.jpg" width="100%" height="100px"/>
          
        </div><BR><BR><BR><BR><br><br><br><br>
		<div style="width:600px; margin:0 auto;">
		<p class="agreement">
			<label for="hname">Occupation Code: </label>
			<input type='text' name='wc' value="<?php echo $_GET['t1']; ?>" style='width:185px; height:23px;' readonly='readonly' required>
			</p><br>
			<p class="agreement">
			<label for="hcode">Occupation Name:</label>
			<input type="text" name="wn" value="<?php echo $_GET['t2']; ?>" style='width:185px; height:23px;' required>
			</p>
			<p class="agreement">
			<?php if($_GET['t7']=='1')
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

$val1=$_POST['wc'];
$val2=$_POST['wn'];
$t=time();
if (isset($_POST['stat'])) {
    $val4=true;
}
else
{
	$val4=false;
}
$str="UPDATE occupation_master SET occ_name='".$val2."', occ_status='".$val4."', occ_modifyby='".$_SESSION['username']."', occ_modifydate='".date('Y-m-d h:m:s',$t)."' WHERE occ_code='".$val1."'";
if ($conn->query($str) == TRUE) {
   echo "<script>";
	echo "window.alert('Sucessfully Entered New Record');";
	echo "window.location.href='occupationmastertable.php'";
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