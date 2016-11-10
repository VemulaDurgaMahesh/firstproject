<html>
<head>
<script type="text/javascript" src="jquery-1.4.1.min.js"></script>
<!--<script type="text/javascript">
$(document).ready(function()
{
	$(".form-control").change(function() {
		var id=$(this).val();
          $("#tn").val(id);
        })	
});
</script>-->
<meta charset='utf-8'>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="styles.css">
   <script src="jquery-latest.min.js" type="text/javascript"></script>
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
              <a href="bankmaster_search.php">
                Search
              </a>
              </li>
                <li><a href="banktable.php">View</a></li>
                <li>
                  <button class="button" type="submit">Save</button></li>
				  </ul>
				  </div>
</p>  
		<div class="image">
              <img src="images/2.jpg" width="100%" height="100px"/>
              <h2> Bank Master </h2>
        </div><BR><BR><BR><BR><BR><BR>
		<div style="width:600px; margin:0 auto;">
        <p class="agreement">
			<label for="hname">Bank Code: </label>
			<input type='text' name='wc' value="<?php echo $_GET['t1']; ?>" readonly required style="width:225px; height:23px;">
		</p><BR><BR>
		<p class="agreement">
			<label for="hcode">Branch Name:</label>
			<input type="text" name="bchn" value="<?php echo $_GET['t2']; ?>"  style="width:225px; height:23px;">
			</p><BR><BR>
			<p class="agreement">
            <label for="bank_address">Address</label>
            <textarea  class="form-control" name="badrs" value="<?php echo $_GET['t4']; ?>" style="width:225px; height:45px;"> </textarea>
               </p><BR>
			<p class="agreement">
			<?php if($_GET['t5']=='1')
			{
			echo "<label>Active</label> <input type='checkbox' name='stat' value='1' checked>";
			}
			else
			{
				echo "<label>Active</label> <input type='checkbox' name='stat' value='0'>";
			}
			?>
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
$val2=$_POST['bchn'];
$val3=$_POST['badrs'];

if (isset($_POST['stat'])) {
    $val4=true;
}
else
{
	$val4=false;
}
$str="UPDATE bank_master SET bank_branch='".$val2."', bank_address='".$val3."', bank_status='".$val4."', bank_modifyby='".$_SESSION['username']."', bank_modifydate='".date("Y-m-d H:i:s")."' WHERE bank_code='".$val1."'";
if ($conn->query($str) == TRUE) {
   echo "<script>";
	echo "window.alert('Updated');";
	echo "window.location.href='banktable.php'";
	echo "</script>";
}

else
{
	echo "Error: " . $sql . "<br>" . $conn->error;
}
}
?>