
<html lang=''>
<head>
   <meta charset='utf-8'>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="styles1.css">
   <script src="jquery-latest.min.js" type="text/javascript"></script>
   <script src="script.js"></script>
   <title>HOSPITAL CARE INFORMATION SYSTEM</title>

	<!-- Google Fonts -->
	<link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700|Lato:400,100,300,700,900' rel='stylesheet' type='text/css'>

	<link rel="stylesheet" href="css/animate.css">
	<!-- Custom Stylesheet -->
	<link rel="stylesheet" href="css/style.css">
</head>
<body>

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

$val1=$_POST['hname'];
$val2=$_POST['hcode'];
$val3=$_POST['lcode'];
$val4=$_POST['lname'];
$val5=$_POST['lstno'];
$val6=$_POST['cstno'];
$val7=$_POST['panno'];
$val8=$_POST['vatno'];
$val9=$_POST['add1'];
$val10=$_POST['add2'];
$val11=$_POST['add3'];
$val12=$_POST['pin'];
$str="insert into company values('".$val1."','".$val2."','".$val3."','".$val4."','".$val5."','".$val6."','".$val7."','".$val8."','".$val9."','".$val10."','".$val11."','".$val12."',true)";
if ($conn->query($str) == TRUE) {
    echo "<script>";
	echo "window.alert('Sucessfully Entered New Record');";
	echo "window.location.href='home.php';";
	echo "</script>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
?>
</body>
<html>

