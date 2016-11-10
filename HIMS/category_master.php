
<!DOCTYPE html>
<html lang="en">
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
	<title>HOSPITAL CARE INFORMATION SYSTEM</title>
	
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
              <img src="images/2.jpg" width="100%" height="100px"/><br>
              <br>
              <h2 style="text-align: center;">  Category Master </h2>
        </div><BR><BR><BR><BR><BR><BR>
		<div style="width:600px; margin:0 auto;">
		<p class="agreement">
			<label for="hname">Category Code: </label>
			
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
			$str="select * from category_master";
			$result=$conn->query($str);
			$count=1;
				while($row = $result->fetch_assoc()) {
					$count=$count+1;
				}
			echo "<input type='text' name='wc' value=CC".$count." readonly='readonly' required style='width:185px; height:23px;' > ";
?>
			</p><br>
			<br><p class="agreement">
			<label for="hcode">Category Name:</label>
			<input type="text" name="wn" required style="width:185px; height:23px;" >
		</p><br><br>
		<p class="agreement">
			<label>WeekOff Day</label>
                      <select class="form-control" name="wod" required="required" style="width:185px; height:23px;" >
                      <option name='NULL' value="0">--Select week of day--</option>
                        <option name="wod" value="Sunday">Sunday</option>
                        <option name="wod" value="Monday">Monday</option>
                        <option name="wod" value="Tuesday">Tuesday</option>
                        <option name="wod" value="Wednesday">Wednesday</option>
                         <option name="wod" value="Thursday">Thursday</option>
                        <option name="wod" value="Friday">Friday</option>
                        <option name="wod" value="Saturday">Saturday</option>
                      </select>
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
$val3=$_POST['wod'];

$str="INSERT into category_master (cat_code,cat_name,cat_wod,cat_createdby) values('".$val1."','".$val2."','".$val3."','".$_SESSION['username']."')";
if ($conn->query($str) == TRUE) {
    ?>
    <script>alert('success');window.location.href='category_master.php';</script>                       
    <?php
}
else
{
    ?>
    <script>alert('Not Inserted Please Try Again');window.location.href='category_master.php';</script>    
    <?php
}
}
?>