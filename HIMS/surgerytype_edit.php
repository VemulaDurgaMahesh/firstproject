<html>
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
  </head>
  <body>
  <?php include('menu.php'); ?>
<form action="#" method="post">
<p>
    <div>
<ul class="drop_menu">
               <li>
              <a href="surgerytype_search.php">
                Search
              </a>
              </li>
                <li><a href="viewsurgery_type.php">View</a></li>  
              <li>  <button class="button" type="submit" name="ed">Save</button></li>             
          </ul>
          </div>
</p>
<div class="image">
              <img src="images/2.jpg" width="100%" height="100px"/>
              <h2>  Surgery Type Master </h2>
        </div>
                  <h3> Surgery Type Details</h3>
                  <br><br><br><br><br><br><br><br><br>
                <div style="width:600px; margin:0 auto;">  
<p>
		<label for="titlecode"> Surgery Type Code</label>
     <input type='text' name='t7' value="<?php echo $_GET['t7']?>" disabled style="width:185px; height:23px;"> 
 </p>
 <p>
 	<label for="titlename"> Surgery type Name</label>
	<input type='text' name='t1' value="<?Php echo $_GET['t1'] ?>"  style="width:185px; height:23px;">
</p>
<p class="agreement">
			<?php if($_GET['t5']=='1')
			{
			echo "<label>Active</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type='checkbox' name='stat' value='1' checked>";
			}
			else
			{
				echo "<label>Active</label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type='checkbox' name='stat' value='0'>";
			}
			?>
</p>
</form>

<?php
if($_SERVER['REQUEST_METHOD']=='POST')
{
	$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hospital";
$count=1;
$x = $_GET['t7'];
if (isset($_POST['stat'])) {
    $val4=true;
}
else
{
	$val4=false;
}
$ottype = $_POST['t1'];
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
if(isset($_POST['ed']))
{
	$date = date("Y-m-d H:i:s");
	$str="UPDATE surgerytype_master SET  st_name='$ottype', st_status='$val4', st_modifyby='".$_SESSION['username']."' , st_modifydate='$date' WHERE st_code='$x'";
	$result=$conn->query($str);
	?>
	<script>
	window.location.href='viewsurgery_type.php';
	</script>
	<?php
}

}
?>
</body>
</html>