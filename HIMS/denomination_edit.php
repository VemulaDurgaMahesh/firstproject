<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?php
session_start();
$_SESSION['userid']="kishore";
$_SESSION['scode']="";
?>
<head>
<script type="text/javascript" src="jquery-1.4.1.min.js"></script>
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
			<input type="text" name="wc" value="<?php echo $_GET['t1']; ?>" readonly="readonly">
			</p><p class="agreement">
			<label for="hcode">Denomination Value: </label>
			<input type="text" name="wn" value="<?php echo $_GET['t2']; ?>">
			</p>
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
$str="UPDATE denomination_master SET denom_value='".$val2."', denom_status='".$val4."',denom_modifyby='".$_SESSION['userid']."', denom_modifydate='".date("d-m-Y h:m:sa",$t)."' WHERE denom_code='".$val1."'";
if ($conn->query($str) == TRUE) {
    echo "<center><h1>Updated successfully</h1></center>";
}
else
{
	echo "Error: " . $sql . "<br>" . $conn->error;
}
}
?>