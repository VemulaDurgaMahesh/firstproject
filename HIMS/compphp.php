<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hospital";
$count=1;
function newpop($url)
{
	
	echo "<script type='text/javascript'>";
	echo "window.alert('".$url."')";
	echo "</script>";
}
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

//$val=$_POST['cc'];
$str="select * from company";
$result=$conn->query($str);
if ($result->num_rows > 0) {
    // output data of each row
	include('home.php');
    echo newpop("Already Entered Company Details");

    }
	else
	{
		header('location:company.php');
	}
?>

