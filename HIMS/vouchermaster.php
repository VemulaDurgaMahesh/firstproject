
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
              <a href="vouchertable_search.php">
                Search
              </a>
              </li>
                <li><a href="vouchertable.php">View</a></li>
                <li>
                  <button class="button" type="submit">Save</button></li>
				  </ul>
				  </div></p>
				<div class="image">
              <img src="images/4.jpg" width="100%" height="100px"/>
				<h2> voucher Master </h2>
				</div>

<br>
<br>
<br><br><br><br><br><br><br>

			<div style="width:600px; margin:0 auto;">
			<p class="agreement">
			<label>voucher Cd. </label>
			<?php include('dbcon.php');
			$count=1;
			$str="select * from voucher_master";
            $result=$conn->query($str);
            while($row = $result->fetch_assoc()) 
			{
             $count=$count+1;
            }
			echo "<input type='text' name='vouchercd' value=VOM".$count." readonly style='width:185px; height:23px;'>" ;
			?>
			</p><br><br>
			<p class="agreement">
			<label>voucher Name </label>
			<input type='text' id='vouchername' name='vouchername'  required style="width:185px; height:23px;"></p>
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
$val1=$_POST['vouchercd'];
$val2=$_POST['vouchername'];

$str="INSERT into voucher_master(voucher_code,voucher_name,voucher_createdby) values('".$val1."','".$val2."','".$_SESSION['username']."')";
if ($conn->query($str) == TRUE) {
    echo " <script>alert('success');window.location.href='vochermaster.php';
                              
                              </script> ";
}
else
{
	echo "Error: " . $sql . "<br>" . $conn->error;
}
}
?>