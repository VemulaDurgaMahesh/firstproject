
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
		<BR><BR><BR><BR><br><br><br>
		<div style="width:600px; margin:0 auto;">
		<p class="agreement">
			<label for="hname">Servicegroup Code: </label>
			
			<input type='text' name='wc' value=<?php echo $_GET['t7']; ?> style='width:185px; height:23px;' readonly='readonly' required>
		
			</p><br><br>
			<p class="agreement">
			<label for="hcode">Servicegroup Name:</label>
			<input type="text" name="wn" value=<?php echo $_GET['t1']; ?> style='width:185px; height:23px;' required>
		</p><br><br>
		<p class="agreement">
			<label> Select Department</label>
                      <select id="tar" name="id" class="tar" style='width:185px; height:25px;' required="required">
                      <?php
                      $conn = new mysqli('localhost', 'root', '', 'hospital') or die ('Cannot connect to db');
                      $result1 = $conn->query("SELECT DISTINCT dept_name  from  department_master where dept_code='".$_GET['t2']."'");
					  while ($row = $result1->fetch_assoc()) 
                         {
                            unset($dept_name);
                          $dept_name = $row['dept_name']; 
                          echo "<option value='".$row['dept_code']."'>".$row['dept_name']."</option>";
                         }
					  $result = $conn->query("SELECT *  from  department_master");
                         while ($row = $result->fetch_assoc()) 
                         {
                            unset($dept_name);
                          $dept_name = $row['dept_name']; 
                          echo "<option value='".$row['dept_code']."'>".$row['dept_name']."</option>";
                         } ?>
                      </select>
					  <input type="text" id="tn" name="tn" class="tn" value="<?php echo $_GET['t2']; ?>" style='width:185px; height:23px;' readonly="readonly">			
        </p><br><br><p class="agreement">
					
					<?php if($_GET['t4']=='1')
			{
			echo "<label>Active</label> <input type='checkbox' name='stat' value='1' checked>";
			}
			else
			{
				echo "<label>Active</label> <input type='checkbox' name='stat' value='0'>";
			}
			?>
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
if (isset($_POST['stat'])) {
    $val4=true;
}
else
{
	$val4=false;
}


$t=time();

$str="UPDATE servicegroup_master SET servicegroup_code='".$val1."', servicegroup_name='".$val2."', servicegroup_dptcode='".$val3."',servicegroup_status='".$val4."',servicegroup_modifyby='".$_SESSION['username']."', servicegroup_modifydate='".date('Y-m-d h:m:s',$t)."' WHERE servicegroup_code='".$val1."'";
if ($conn->query($str) == TRUE) {
    ?>
	<script>
	window.alert('Sucessfully Updated');
	window.location.href='servicegrouptable.php';
	</script>
	<?php
}
else
{
	echo "Not inserted";
}
}
?>