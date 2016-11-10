
<html>

<head>
<script type="text/javascript" src="jquery-1.4.1.min.js"></script>
<!--<script type="text/javascript">
$(document).ready(function()
{
	$(".tar").change(function() {
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
              <a href="tarrifmaster_search.php">
                Search
              </a>
              </li>
                <li><a href="tarrifmastertable.php">View</a></li>
                <li>
                  <button class="button" type="submit">Save</button></li>
				  </ul>
				  </div>
</p>                	
		
		
		<div class="image">
              <img src="images/2.jpg" width="100%" height="100px"/>
              <h2> Tariff Master </h2>
        </div><BR><BR><BR><BR><br><br>
		<div style="width:600px; margin:0 auto;">
		<p class="agreement">
	          <label for="hname">Tarrif Code: </label>
				<input type="text" name="wc" value="<?php echo $_GET['t1']; ?>" readonly style="width:185px; height:23px;">
		</p><br><br><p class="agreement">
			<label>Tarrif Name:</label>
			<input type="text" name="wn" value="<?php echo $_GET['t2']; ?>" required style="width:185px; height:23px;">
		</p><br><br><p class="agreement">
			<label> Contact Person</label>
            <input type="text" class="form-control" name="trperson" value="<?php echo $_GET['t3']; ?>" style="width:185px; height:23px;">
			</p><br><br><p class="agreement">
            <label> Effect From</label>
            <input type="date" class="form-control" name="treffectfrom" value="<?php echo $_GET['t4']; ?>" style="width:185px; height:23px;">
            </p><br><br>
            <p class="agreement">
             <label>Effect To</label>
            <input type="date" class="form-control" name="treffectto"  value="<?php echo $_GET['t5']; ?>" style="width:185px; height:23px;">  
</p>	  <br>   <br> 
			
			</p><p class="agreement">
			<?php if($_GET['t6']=='1')
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
$val3=$_POST['trperson'];
$val5=$_POST['treffectfrom'];
$val6=$_POST['treffectto'];

if (isset($_POST['stat'])) {
    $val4=true;
}
else
{
	$val4=false;
}
$str="UPDATE tariff_master SET tariff_name='".$val2."', tariff_contactperson='".$val3."', tariff_effectfrom='".$val5."', tariff_effectto='".$val6."', tariff_status='".$val4."', tariff_modifyby='".$_SESSION['username']."', tariff_modifydate='".date("Y-m-d H:i:s")."' WHERE tariff_code='".$val1."'";
if ($conn->query($str) == TRUE) {
 ?>
    <script>alert('Updated'); window.location.href='tarrifmastertable.php';</script>                       
   <?php
}

else
{
	echo "Error: " . $sql . "<br>" . $conn->error;
}
}
?>