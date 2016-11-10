
<?php include('menu.php'); ?>
<html>
<style>
    .act { color:#F00; }
    .act1 {color:#2E2EFE;} 
</style>
<body>
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
$str="select * from billing where billing_header='".$_GET['t1']."' OR billing_servicetype='".$_GET['t2']."' AND billing_status=true";
$result=$conn->query($str);
echo "<br>";
echo "<table border=1 class='act'>";
	echo "<tr><td><input type='hidden'></td><td>BILLING HEADER</td><td>SERVICE TYPE</td><td>DELETE</td></form></tr>";
    while($row = $result->fetch_assoc()) {
	echo "<tr><form action='#' method='post'><td><input type='hidden' name='t8' id='t8' value='".$row['billing_sno']."' visibility='hidden' ></td><td><input type='text' name='t1' id='t1' value='".$row['billing_header']."' ></td><td><input type='text' name='t2' id='t2' value='".$row['billing_servicetype']."' ></td><td><input type='submit' value='delete' name='del'></td></form></tr>";
}
echo "</table>";
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
if(isset($_POST['del']))
{
	$str="UPDATE billing SET billing_status= false WHERE billing_sno='".$_POST['t8']."'";
	$result=$conn->query($str);
	//header("location:doctortable.php");
	
}
}
?>