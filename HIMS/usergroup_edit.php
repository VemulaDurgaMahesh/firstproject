<html>
<head>
<script type="text/javascript" src="jquery-1.4.1.min.js"></script>
<script type="text/javascript">
$(document).ready(function()
{
	$(".tar").change(function() {
		var id=$(this).val();
          $("#tn").val(id);
        })	
});
</script>
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
              <a href="usergroup_search.php">
                Search
              </a>
              </li>
                <li><a href="view_usergroup.php">View</a></li>
                <li>
                  <button class="button" name="submit" type="submit">Save</button></li>
				  </ul>
				  </div>
</p>                	
		
		
		<div class="image">
              <img src="images/2.jpg" width="100%" height="100px"/>
              <h2>  User Group Master </h2>
        </div>
        <br><br><br><br><br><br><br><br><br>
        <div style="width:600px;margin:0 auto;">
		<p class="agreement">
			<label for="hname">User Category Code: </label>
			<input type="text" name="wgc" value="<?php echo $_GET['t7']; ?>" readonly style="width:185px; height:23px;">
			</p><br><br><p class="agreement">
			<label for="hcode">User Category Name:</label>
			<input type="text" name="wgn" value="<?php echo $_GET['t1']; ?>" style="width:185px; height:23px;">
			</p><br><br>
			<p class="agreement">
      <label for="lcode">Department Type</label>
      <select name="tarapp" id="tarapp" class="tar" readonly style="width:185px; height:23px;">      
      <?php 
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
$str1="SELECT *  from  department_master WHERE dept_code='".$_GET['t9']."'"; 
$result1=$conn->query($str1);
$row1 = $result1->fetch_assoc();
echo "<option value='".$_GET['t9']."'>".$row1['dept_name']."</option>";
$str="SELECT *  from  department_master WHERE dept_status=1";
$result=$conn->query($str);
//echo "<select name='cnames'>";

    while($row = $result->fetch_assoc()) {
	echo "<option value='".$row['dept_code']."'>".$row['dept_name']."</option>";
}
?>
</select>
  <input type="text" id="tn" name="tn" class="tntxt" value="<?php echo $_GET['t9']; ?>" disabled style="width:185px; height:23px;">
      
      </p><p class="agreement">
			<?php if($_GET['t5']=='1')
			{
			echo "<label>Active</label> <input type='checkbox' name='stat' value='1' checked>";
			}
			else
			{
				echo "<label>Active</label> <input type='checkbox' name='stat' value='0'>";
			}
			?>
		</div></p>
	</div>
	</form>
</body>
</html>
<?php
	$connect = mysql_connect ("localhost","root","") or die();
                         mysql_select_db("hospital")or die();
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

$val1=$_GET['ed'];
$val2=$_POST['wgn'];
$val3=$_POST['tarapp'];
$date = date("Y-m-d H:i:s");
if (isset($_POST['stat'])) {
    $val4=true;
}
else
{
	$val4=false;
}
$str=mysql_query("UPDATE user_groupmaster SET user_categoryname='$val2', user_categorydeptcode='$val3', user_categorystatus='$val4', user_groupmodifyby='".$_SESSION['username']."', user_groupmodifydate='$date' WHERE id='$val1'");
if($str)
{
	?>
                             <script>alert('Updated');
                             window.location.href='view_usergroup.php';
                             </script>                       
                          <?php
}

else
{
	echo "Error: " . "<br>" . $conn->error;
}
}

?>