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
	<title>HOSPITAL CARE INFORMATION SYSTEM</title>
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
</head>

<body>

<?php include('menu.php'); ?>
	<form action="#" method="post" class="register">
	<p>
		<div>
<ul class="drop_menu">
               <li>
              <a href="servicegrouptable_search.php">
                Search
              </a>
              </li>
                <li><a href="servicegrouptable.php">View</a></li>
                <li>
                  <button class="button" type="submit">Save</button></li>
				  </ul>
				  </div>
</p>                	
		<div class="image">
              <img src="images/2.jpg" width="100%" height="100px"/>
          
        </div>
		<BR><BR><BR><BR>
		<div style="width:600px; margin:0 auto;">
		<p class="agreement">
			<label for="hname">Servicegroup Code: </label>
			
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
			$str="select * from servicegroup_master";
			$result=$conn->query($str);
			$count=1;
				while($row = $result->fetch_assoc()) {
					$count=$count+1;
				}
			echo "<input type='text' name='wc' value=SGM".$count." style='width:185px; height:23px;' readonly='readonly' required>";
?>
			
			</p><br><br><p class="agreement">
			<label for="hcode">Servicegroup Name:</label>
			<input type="text" name="wn" style='width:185px; height:23px;' required>
		</p><br><br><p class="agreement">
			<label> Select Department</label>
                      <select name="id" name="id" class="tar" style='width:185px; height:25px;' required>
					  <option value="NULL">--Select Department--</option>
                      <?php
                      $conn = new mysqli('localhost', 'root', '', 'hospital') or die ('Cannot connect to db');
					  
                      $result1 = $conn->query("SELECT * from  department_master where dept_status=true");
                         while ($row = $result1->fetch_assoc()) 
                         {
							 echo "<option value='".$row['dept_code']."'>".$row['dept_name']."</option>";
                         } ?>
                      </select>
			<input type="text" id="tn" name="tn" class="tntxt" style='width:185px; height:23px;' readonly="readonly">	
                    </p>
					
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
$val3=$_POST['id'];

$t=time();

$str="insert into servicegroup_master values('".$val1."','".$val2."','".$val3."',true,'".$_SESSION['username']."','".date('Y-m-d h:i:s',$t)."',NULL,NULL)";
if ($conn->query($str) == TRUE) {
    echo "<script>";
	echo "window.alert('Sucessfully Entered New Record');";
	echo "</script>";
}
else
{
	echo "Error: " . $sql . "<br>" . $conn->error;
}
}
?>