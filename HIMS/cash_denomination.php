<?php
session_start();
$_SESSION['userid']="kishore";
?>
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
</head>

<body>
<?php include('menu.php'); ?>
	<form action="#" method="post" class="register">
	<p>
		<div>
<ul class="drop_menu">
               <li>
              <a href="denomination_search.php">
                Search
              </a>
              </li>
                <li><a href="denominationtable.php">View</a></li>
                <li>
                  <button class="button" type="submit">Save</button></li>
				  </ul>
				  </div>
</p>   
		<div class="image">
              <img src="images/2.jpg" width="100%" height="100px"/>
              <h2> Cash Denomination Master </h2>
        </div>
		<p class="agreement">
			<label for="hname">Denomination Code: </label>
			
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
			$str="select * from denomination_master";
			$result=$conn->query($str);
			$count=1;
				while($row = $result->fetch_assoc()) {
					$count=$count+1;
				}
			echo "<input type='text' name='wc' value=DENOM".$count." readonly='readonly' required>";
?>
			
			</p><p class="agreement">
			<label for="hcode">Denomination Value:</label>
			<input type="text" name="wn" required>
			</p><p class="agreement">

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

$str="insert into denomination_master values('".$val1."','".$val2."',true,'".$_SESSION['userid']."','".date("d-m-Y h:m:sa",$t)."',NULL,NULL,true)";
if ($conn->query($str) == TRUE) {
    echo "<center><h1>New record created successfully</h1></center>";
}
else
{
	echo "ERROR:".$sql. $conn->error;
	echo "Not inserted";
}
}
?>