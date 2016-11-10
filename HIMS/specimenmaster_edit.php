
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
<title>    header </title>

	<title>HOSPITAL CARE INFORMATION SYSTEM</title>
	<script type="text/javascript" src="jquery-1.4.1.min.js"></script>
</head>

<body>
<?php include('menu.php');
include('dbcon.php'); ?>
<form action="#" method="post" class="register">
<p>
		<div>
<ul class="drop_menu">
               <li>
              <a href="specimentable_search.php">
                Search
              </a>
              </li>
                <li><a href="specimentable.php">View</a></li>
                <li>
                  <button class="button" type="submit">Save</button></li>
				  </ul>
				</div></p>
<div class="image">
              <img src="images/4.jpg" width="100%" height="100px"/>
				<h2> SPECIMEN MASTER </h2>
				</div>

<br>
<br>
<br><br><br><br><br><br><br>

			<div style="width:600px; margin:0 auto;">
			<p class="agreement">
			<label>specimen Cd. </label>			
			<input type='text' name='Specimencd' value="<?php echo $_GET['t1']; ?>" readonly style="width:185px; height:23px;">
			</p><br><br>
			<p class="agreement">
			<label>Specimen Name </label>
			<input type='text' id='specimenname' name='specimenname' value="<?php echo $_GET['t2']; ?>" required style="width:185px; height:23px;"></p>
		<br><br>	<p class="agreement">
			<?php if($_GET['t7']=='1')
			{
			echo "<label>Active</label> <input type='checkbox' name='stat' value='1' checked>";
			}
			else
			{
				echo "<label>Active</label> <input type='checkbox' name='stat' value='0' unchecked>";
			}
			?><p>
		</div>	</form>
			
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

$val2=$_POST['specimenname'];
$x = $_GET['t1'];
if (isset($_POST['stat'])) {
    $val4=true;
}
else
{
	$val4=false;
}
$date = date("Y-m-d H:i:s");
$str="UPDATE specimen_master SET specimen_name='$val2' , specimen_modifyby='".$_SESSION['username']."',specimen_modifydate='$date',specimen_status='$val4' WHERE specimen_code='$x'";
if ($conn->query($str) == TRUE) {
    echo "<script>alert('Updated');window.location.href='specimentable.php';</script>";
}
else
{
	echo "Error: " . $sql . "<br>" . $conn->error;
}
}
?>