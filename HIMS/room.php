<?php
session_start();
$_SESSION['userid']="kishore";
if($_SERVER['REQUEST_METHOD']=='POST')
{

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

$cou=$_SESSION['cou'];
if(isset($_POST['edit']))
{
	for($i=1;$i<=$cou;$i++)
	{
		$room="ro".$i;
		$sno="so".$i;
		$st="st".$i;
	$str="UPDATE rooms SET ROOMS_BEDCODE='".$_POST[$room]."', ROOMS_BEDSTATUS='".$_POST[$st]."' WHERE ROOMS_SNO='".$_POST[$sno]."' AND ROOMS_CODE='".$_POST['t3']."' AND ROOMS_WARDCODE='".$_POST['t4']."'";
	$result=$conn->query($str);
	}
	 echo "<script>";
	echo "window.alert('Sucessfully Updated');";
	echo "</script>";
	//header("Refresh:0; url:")
	//unset($_POST['edit']);
//header("location:roomcreate.php");
}
}
?>