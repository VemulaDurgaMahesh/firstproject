<?php include('menu.php'); 

?>
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

		<form action="#" method="post" class="register">
		<p>
		<div>
<ul class="drop_menu">
               <li>
              <a href="state_search.php">
                Search
              </a>
              </li>
                <li><a href="view_state.php">View</a></li>
                <li>
                  <button class="button" name="submit" type="submit">Save</button></li>
				  </ul>
				  </div></p>                	
		
		
		<div class="image">
              <img src="images/2.jpg" width="100%" height="100px"/>
              <h2> State Master </h2>
        </div><BR><BR><BR><BR><BR><BR><BR><BR>
		<div style="width:600px; margin:0 auto;">
		<p class="agreement">
			<label for="hname">State Code: </label>
			<input type="text" name="wgc" value="<?php echo $_GET['t7']; ?>" readonly="readonly" style="width:185px; height:23px;">
			</p><BR><BR><p class="agreement">
			<label for="hcode">State Name:</label>
			<input type="text" name="wgn" value="<?php echo $_GET['t1']; ?>" style="width:185px; height:23px;" >
			</p><BR><BR><p class="agreement">
			<label for="lcode">Select Country</label>
			<select name="tarapp" id="tarapp" class="tar" required style="width:185px; height:23px;">
			
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
$str1="SELECT * from country_master WHERE country_code='".$_GET['t9']."'";
$result1=$conn->query($str1);
$row1 = $result1->fetch_assoc();
echo "<option value='".$_GET['t9']."'>".$row1['country_name']."</option>";
$str="SELECT *  from  country_master WHERE country_status=1";
$result=$conn->query($str);
//echo "<select name='cnames'>";

    while($row = $result->fetch_assoc()) {
	echo "<option value='".$row['country_code']."'>".$row['country_name']."</option>";
}
?>
</select>
					  
			<input type="text" id="tn" name="tn" class="tntxt"  value="<?php echo $_GET['t9']; ?>" disabled style="width:185px; height:23px;">
			
			</p><BR><BR>
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
		</div></p>
	</div>
	</form>
</body>
</html>
<?php
$connect = mysql_connect ("localhost","root","") or die();
mysql_select_db("hospital")or die();

if(isset($_POST['submit']))
{
$val1=$_GET['t7'];
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
$str=mysql_query("UPDATE state_master SET state_name='$val2', country_code='$val3', state_status='$val4', s_modifyby='".$_SESSION['username']."', s_modifydate='$date' WHERE state_code='$val1'");
if($str)
{
	?>
    <script>alert('Updated'); window.location.href='view_state.php';</script>                       
   <?php
}

else
{
	echo "Error: " . $sql . "<br>" . $conn->error;
}
}

?>