
<!DOCTYPE html>
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
	
</head>

<body>
<?php include('menu.php'); ?>
	<form action="#" method="post" class="register">
	<p>
		<div>
<ul class="drop_menu">
               <li>
              <a href="nursemaster_search.php">
                Search
              </a>
              </li>
                <li><a href="nursemastertable.php">View</a></li>
                <li>
                  <button class="button" type="submit">Save</button></li>
				  </ul>
				  </div>
</p>                	
		
		<div class="image">
              <img src="images/2.jpg" width="100%" height="100px"/>
              <h2>  Nurse Master </h2>
        </div><BR><BR><BR><BR><BR><BR><BR>
		<div style="width:600px; margin:0 auto;">
		<p class="agreement">
			<label for="hname">Nurse Code: </label>
			
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
			$str="select * from Nurse_master";
			$result=$conn->query($str);
			$count=1;
				while($row = $result->fetch_assoc()) {
					$count=$count+1;
				}
			echo "<input type='text' name='wc' value=NST".$count." readonly required style='width:185px; height:23px;'>";
?>
			
			</p><BR><BR><p class="agreement">
			<label for="hcode">Nurse Master Name:</label>
			<input type="text" name="wn" required style="width:185px; height:23px;">
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

$str="INSERT into Nurse_master(ns_code,ns_name,ns_createdby) values('".$val1."','".$val2."','".$_SESSION['username']."')";
if ($conn->query($str) == TRUE) {
   echo "<script>";
	echo "window.alert('Sucess');";
	echo "window.location.href='nurse_master.php';";
	echo "</script>";
}
else
{
	echo "Not inserted";
}
}
?>