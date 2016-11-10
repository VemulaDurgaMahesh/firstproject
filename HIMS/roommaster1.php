<?php
session_start();
?>
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
	$(".wc").change(function()
	{
		var id=$(this).val();
		$("#wc1").val(id);
	});
	$(".ns").change(function()
	{
		var id=$(this).val();
		$("#ns1").val(id);
	});
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
              <a href="roommaster_search.php">
                Search
              </a>
              </li>
                <li><a href="roommastertable.php">View</a></li>
                <li>
                  <button class="button" type="submit">Save</button></li>
				  </ul>
				  </div>
</p> 
				<div class="image">
              <img src="images/2.jpg" width="100%" height="100px"/>
              <h2>  Room Master </h2>
        </div>
			<p class="agreement">
			<label for="lcode">Ward Code:</label>
			<select id="wc" name="wc" class="wc" required>
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
$str="select * from ward_master where WARD_ACTIVE=true";
$result=$conn->query($str);
echo "<option value='NULL'>--Select Ward--</option>";
    while($row = $result->fetch_assoc()) {
	echo "<option value='".$row['WARD_CODE']."'>".$row['WARD_NAME']."</option>";
}
?>
</select>
<input type="text" id="wc1" name="wc1" readonly required>
</p><p class="agreement">
<label for="hcode">Room Code:</label>
			<input type="text" name="rc">
			</p><p class="agreement">
			<label for="hcode">Block:</label>
			<input type="text" name="bl">
			</p><p class="agreement">
			<label for="hcode">No. of Beds:</label>
			<input type="text" name="nb">
			</p><p class="agreement">
			<label for="hcode">Level:</label>
			<input type="text" name="ll">
			</p><p class="agreement">
			<label for="hcode">Extension Number:</label>
			<input type="text" name="en">
			</p><p class="agreement">
			<label for="ccode">Nurse Station: </label>
			<select name="ns" id="ns" class="ns">
			<?php
			$str="select * from nurse_master where ns_status=true";
$result=$conn->query($str);
echo "<option value='NULL'>--Select Nurse Station--</option>";
    while($row = $result->fetch_assoc()) {
	echo "<option value='".$row['ns_code']."'>".$row['ns_name']."</option>";
}
?>
</select>
<input type="text" id="ns1" name="ns1" readonly required>
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
$val2=$_POST['rc'];
$val3=$_POST['bl'];
$val4=$_POST['nb'];
$val5=$_POST['ll'];
$val6=$_POST['en'];
$val7=$_POST['ns'];
$t=time();
$str1="select * from ward_master where ward_code='".$val1."'";
$result=$conn->query($str1);
while($row = $result->fetch_assoc()) {
	$val8=$row['WARD_NAME'];
}
$str="insert into room_master values('".$val1."','".$val8."','".$val2."','".$val3."',".(int)$val4.",'".$val5."',".(int)$val6.",'".$val7."','Kishore','".date("d-m-Y h:m:sa",$t)."',NULL,NULL,true)";
if ($conn->query($str) == TRUE) {
	echo "<center><h1>New record created successfully</h1></center>";
	$str1="select * from rooms where rooms_wardcode='".$val1."' and rooms_code='".$val2."'";
$result=$conn->query($str1);
$count=1;
while($row = $result->fetch_assoc()) {
	$count=$count+1;
}
	for($i=$count;$i<=((int)$val4);$i=$i+1)
	{
		$str="insert into rooms values('".$i."','".$val1."','".$val8."','".$val2."','','Vacent','".$_SESSION['userid']."','".date("d-m-Y h:m:sa",$t)."',NULL,NULL,true)";
	$result=$conn->query($str);
	}
    echo "<center><h1>New records are created successfully</h1></center>";
	$_SESSION['VAL']=$val1;
	$_SESSION['VAL2']=$val2;
	$str="select * from rooms where rooms_wardcode='".$val1."' and rooms_code='".$val2."'";
$result=$conn->query($str);
if ($conn->query($str) == TRUE) {
echo "<table border=1>";
	echo "<tr><td>S. NO. </td><td>BED CODE</td><td>BED STATUS</td><td>IS ACTIVE</td><td>ROOM CODE</td><td>WARD CODE</td><td>WARD NAME</td><td>EDIT</td></form></tr>";
    while($row = $result->fetch_assoc()) {
	echo "<tr><form action='roomtab.php' method='post'><td><input type='text' name='t7' id='t7' value='".$row['ROOMS_SNO']."' readonly='readonly'></td><td><input type='text' name='t1' id='t1' value='".$row['ROOMS_BEDCODE']."' ></td><td><input type='text' name='t6' id='t6' value='".$row['ROOMS_BEDSTATUS']."' readonly='readonly'></td><td><input type='text' name='t2' id='t2' value='".$row['ROOMS_STATUS']."' readonly='readonly'></td><td><input name='t3' id='t3' value='".$row['ROOMS_CODE']."' readonly='readonly' ></td><td><input type='text' name='t4' id='t4' value='".$row['ROOMS_WARDCODE']."' readonly='readonly'></td><td><input type='text' name='t5' id='t5' value='".$row['ROOMS_WARDNAME']."' readonly='readonly'></td><td><input type='submit' name='edit' value='edit'></td></td></form></tr>";
}
echo "</table>";
}
else
{
	echo "Error: " . $sql . "<br>" . $conn->error;
	echo "Not inserted";
}
}
if(isset($_POST['edit']))
{
	$str="UPDATE rooms SET ROOMS_BEDCODE='".$_POST['t1']."' WHERE ROOMS_SNO='".$_POST['t7']."' AND ROOMS_CODE='".$_POST['t3']."' AND ROOMS_WARDCODE='".$_POST['t4']."'";
	$result=$conn->query($str);
	header("location:roomtab.php?a1=".$_POST['wc']."&a2=".$_POST['rc']);
}
}
?>