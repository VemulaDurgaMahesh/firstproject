<!DOCTYPE html>
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
<title>    header </title>
	<title>HOSPITAL CARE INFORMATION SYSTEM</title>
	
</head>

<body>
<?php include('menu.php'); ?>
	<form action="#" method="post" class="register">
	<p>
		<div>
<ul class="drop_menu">
               <li>
              <a href="designationmaster_search.php">
                Search
              </a>
              </li>
                <li><a href="designationmastertable.php">View</a></li>
                <li>
                  <button class="button" type="submit">Save</button></li>
				  </ul>
				  </div>
</p>   
		<div class="image">
              <img src="images/2.jpg" width="100%" height="100px"/>

        </div>
        <BR><BR><BR><BR><br><br>
		<div style="width:600px; margin:0 auto;">
		<p class="agreement">
			<label for="hname">Designation Code: </label>
		<input type="text" name="wc" value="<?php echo $_GET['t1']; ?>" style='width:185px; height:23px;' readonly="readonly">	
			</p><br><br><p class="agreement">
			<label for="hcode">Designation Name:</label>
			<input type="text" name="wn" value="<?php echo $_GET['t2']; ?>" style='width:185px; height:23px;' required>
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
		</div>
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
$str="UPDATE designation_master SET desg_name='".$val2."', desg_status='".$val4."', desg_modifyby='".$_SESSION['username']."', desg_modifydate='".date('Y-m-d h:m:s',$t)."' WHERE desg_code='".$val1."'";
if ($conn->query($str) == TRUE) {
     echo "<script>";
	echo "window.alert('Sucessfully Updated');";
	echo "window.location.href='designationmastertable.php';";
	echo "</script>";
}
else
{
	echo "Error: " . $sql . "<br>" . $conn->error;
}
}
?>