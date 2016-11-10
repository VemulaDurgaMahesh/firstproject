
<?php
session_start();
$_SESSION['userid']="kishore";
$_SESSION['scode']="";
?>
<head>
<script type="text/javascript" src="jquery-1.4.1.min.js"></script>
<script type="text/javascript">
$(document).ready(function()
{
	$(".tar").change(function() {
		var id=$(this).val();
          $("#tn").val(id);
        })	
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
		<form action="#" method="post" class="register">
		<p>
		<div>
<ul class="drop_menu">
               <li>
              <a href="wardgrptable_search.php">
                Search
              </a>
              </li>
                <li><a href="wardgrptable.php">View</a></li>
                <li>
                  <button class="button" type="submit">Save</button></li>
				  </ul>
				  </div>
</p>                	
		
		
		<div class="image">
              <img src="images/2.jpg" width="100%" height="100px"/>
              <h2>  Ward Group Master </h2>
        </div>
		<BR><BR><BR><BR>
		<div style="width:600px; margin:0 auto;">
		<p class="agreement">
			<label for="hname">Ward group Code: </label>
			<input type="text" name="wgc" value="<?php echo $_GET['t7']; ?>" readonly="readonly">
			</p><p class="agreement">
			<label for="hcode">Ward Group Name:</label>
			<input type="text" name="wgn" value="<?php echo $_GET['t1']; ?>">
			</p><p class="agreement">
			<label for="lcode">Tariff Application:</label>
			<select name="tarapp" id="tarapp" class="tar" required>
			
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
$str1="select * from tariff_master where tariff_code='".$_GET['t2']."'";
$result1=$conn->query($str1);
$row1 = $result1->fetch_assoc();
echo "<option value='".$_GET['t2']."'>".$row1['tariff_name']."</option>";
$str="SELECT *  from  tariff_master";
$result=$conn->query($str);
//echo "<select name='cnames'>";

    while($row = $result->fetch_assoc()) {
	echo "<option value='".$row['tariff_code']."'>".$row['tariff_name']."</option>";
}
?>
                     
                      </select>
					  
			<input type="text" id="tn" name="tn" class="tntxt" value=<?php echo $_GET['t2']; ?> disabled>
			
			</p><p class="agreement">
			<?php if($_GET['t5']=='1')
			{
			echo "<label>Active</label> <input type='checkbox' name='stat' value='1' checked>";
			}
			else
			{
				echo "<label>Active</label> <input type='checkbox' name='stat' value='0'>";
			}
			?>
		</div>
	
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

$val1=$_POST['wgc'];
$val2=$_POST['wgn'];
$val3=$_POST['tarapp'];
$t=time();
if (isset($_POST['stat'])) {
    $val4=true;
}
else
{
	$val4=false;
}
$str="UPDATE wardgrop_master SET WARDGRP_NAME='".$val2."', TARIFF_APPL='".$val3."', Status='".$val4."', MODIFIED_BY='".$_SESSION['userid']."', MODIFIED_TIME='".date("d-m-Y h:m:sa",$t)."' WHERE WARDGRP_CODE='".$val1."'";
if ($conn->query($str) == TRUE) {
    echo "<script>";
	echo "window.alert('Sucessfully Updated');";
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