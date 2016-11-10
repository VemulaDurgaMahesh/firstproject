
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
              <a href="categorymaster_search.php">
                Search
              </a>
              </li>
                <li><a href="categorymastertable.php">View</a></li>
                <li>
                  <button class="button" type="submit">Save</button></li>
				  </ul>
				  </div>
</p>                	
		
		
		<div class="image">
              <img src="images/2.jpg" width="100%" height="100px"/>
              <h2>  Category Master </h2>
        </div><BR><BR><BR><BR><BR><BR>
		<div style="width:600px; margin:0 auto;">
		    <p class="agreement">
			<label for="hname">Category Code: </label>
			<input type="text" name="wc" value="<?php echo $_GET['t1']; ?>" readonly="readonly" style="width:185px; height:23px;">
			</p>
			<br><br>
			<p class="agreement">
			<label for="hcode">Category Name:</label>
			<input type="text" name="wn" value="<?php echo $_GET['t2']; ?>" style="width:185px; height:23px;">
			</p>
			<br><br>
			<p class="agreement">
			     <label>WeekOff Day</label>
                      <select class="form-control" name="wod" required="required" style="width:185px; height:23px;">
                      <option name="wod"><?php echo $_GET['t3']; ?></option> 
                        <option name="wod">Sunday</option>
                        <option name="wod">Monday</option>
                        <option name="wod">Tuesday</option>
                        <option name="wod">Wednesday</option>
                         <option name="wod">Thursday</option>
                        <option name="wod">Friday</option>
                        <option name="wod">Saturday</option>
                      </select>
                      </p>  
		<!--	<input type="text" id="tn" name="tn" class="tntxt" value=<?php echo $_GET['t7']; ?> disabled>-->
			
			</p><p class="agreement">
			<?php if($_GET['t4']=='1')
			{
			echo "<label>Active</label> <input type='checkbox' name='stat' value='1' checked>";
			}
			else
			{
			echo "<label>Active</label> <input type='checkbox' name='stat' value='0'>";
			}
			?>
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
$val3=$_POST['wod'];
if (isset($_POST['stat'])) {
    $val4=true;
}
else
{
	$val4=false;
}
$str="UPDATE category_master SET cat_name='".$val2."', cat_wod='".$val3."', cat_status='".$val4."', cat_modifiedby='".$_SESSION['username']."', cat_modifieddate='".date('Y-m-d h:i:s')."' WHERE cat_code='".$val1."'";
if ($conn->query($str) == TRUE) {
    ?>
    <script>alert('Updated');window.location.href='categorymastertable.php';</script>                       
    <?php
}
else
{
	echo "Error: " . $sql . "<br>" . $conn->error;
}
}
?>