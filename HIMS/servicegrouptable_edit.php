
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
              <h2>  Servicegroup Master </h2>
        </div>
        <BR><BR><BR><BR>
    <div style="width:600px; margin:0 auto;">
		<p class="agreement">
			<label for="hname">Servicegroup Code: </label>
	<input type='text' name='wc' value="<?php echo $_GET['t7']; ?>" readonly='readonly' required>
			</p><p class="agreement">
			<label for="hcode">Servicegroup Name:</label>
			<input type="text" name="wn" value="<?php echo $_GET['t1']; ?>" required>
		</p><p class="agreement">
			<label> Select Department Name</label>
                      <select class="form-control" name="dptnme" required="required">
                      <?php                      
                      $conn = new mysqli('localhost', 'root', '', 'hospital') or die ('Cannot connect to db');
                      $result1 = $conn->query("SELECT DISTINCT dept_name  from  department_master");
                         while ($row = $result1->fetch_assoc()) 
                         {
                            unset($dept_name);
                          $dept_name = $row['dept_name'];               
                          echo '<option value="'.$dept_name.'">'.$dept_name.'</option>';
                         } ?>
                      </select>			
                    </p>
                    <p class="agreement">
			<label> Select Department Code</label>
                      <select class="form-control" name="dptcde" required="required">
                      <?php
                      $conn = new mysqli('localhost', 'root', '', 'hospital') or die ('Cannot connect to db');               
                      $result1 = $conn->query("SELECT DISTINCT dept_code  from  department_master");
                         while ($row = $result1->fetch_assoc()) 
                         {
                            unset($dept_code);
                          $dept_code = $row['dept_code'];                          
                          echo '<option value="'.$dept_code.'">'.$dept_code.'</option>';
                         } ?>
                      </select>
			
                    </p>
                    <p class="agreement">
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
$t=time();
if (isset($_POST['stat'])) {
    $val4=true;
}
else
{
	$val4=false;
}
$str="UPDATE servicegroup_master SET servicegroup_name='".$val2."', servicegroup_status='".$val4."', servicegroup_modifyby='".$_SESSION['username']."', servicegroup_modifydate=".CURRENT_TIMESTAMP()." WHERE servicegroup_code='".$val1."'";
if ($conn->query($str) == TRUE) {
    echo "<center><h1>Updated successfully</h1></center>";
}
else
{
	echo "Error: " . $sql . "<br>" . $conn->error;
}
}
?>