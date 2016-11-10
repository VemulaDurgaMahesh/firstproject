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
</head>

<body>
<?php include('menu.php');?>
	<form action="#" method="post" class="register">
		<p>
		<div>
<ul class="drop_menu">
               <li>
              <a href="equipmentmaster_search.php">
                Search
              </a>
              </li>
                <li><a href="equipmentmastertable.php">View</a></li>
                <li>
                  <button class="button" type="submit">Save</button></li>
				  </ul>
				  </div>
</p> 
  <div class="image">
              <img src="images/4.jpg" width="100%" height="100px"/>
				<h2>Equipment Master</h2>
				</div>
				<BR><BR><BR><BR><br><br>
		<div style="width:600px; margin:0 auto;">
			<p class="agreement">
			<label>Equipment Group Name:</label>
			<input type="text" name="wgn" required style="width:185px; height:23px;">
			</p><br><br><p class="agreement">
			
			<label for="hname">Equipment Code: </label>
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
$str="select * from equipment_master";
$result=$conn->query($str);
$count=1;
    while($row = $result->fetch_assoc()) {
        $count=$count+1;
    }
			echo "<input type='text' name='egc' value=EC".$count." readonly style='width:185px; height:23px;'>";
			?>
			</p><br><br><p class="agreement">
			<label>Equipment Block:</label>
             <input type="text" name="e_block" required style="width:185px; height:23px;">
			</p><br><br><p class="agreement">
                     
            <label>Equipment Wing:</label>
            <input type="text" name="e_wing" required style="width:185px; height:23px;">
             </p><br><br><p class="agreement">
            <label>Equipment Name:</label>
            <input type="text" name="e_ename" required style="width:185px; height:23px;">
            </p><br><br><p class="agreement"> 
            <label>Extension Number:</label>
            <input type="text" name="e_extno" required style="width:185px; height:23px;">
           </p><br><br><p class="agreement">      
            <label>Equipment Level:</label>
            <input type="text" name="e_level" required style="width:185px; height:23px;">
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

$val1=$_POST['wgn'];
$val2=$_POST['egc'];
$val5=$_POST['e_block'];
$val6=$_POST['e_wing'];
$val3=$_POST['e_ename'];
$val7=$_POST['e_extno'];
$val4=$_POST['e_level'];
$t=time();
$str="INSERT into equipment_master (eqp_groupname,eqp_code,eqp_name,eqp_createdby,eqp_level,eqp_block,eqp_wing,eqp_extensionno) values('".$val1."','".$val2."','".$val3."','".$_SESSION['username']."','".$val4."','".$val5."','".$val6."','".$val7."')";
if ($conn->query($str) == TRUE) {
   echo "<script>";
	echo "window.alert('Sucess');";
  echo "window.location.href='equipment_master.php'";
	echo "</script>";
}
else
{
	echo "Not inserted";
}
}
?>