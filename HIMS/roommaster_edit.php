<?php
session_start();
$_SESSION['userid']="kishore";
?>
<!DOCTYPE html>
<html lang="en">
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
<?php include("menu.php");?>
<p>
<form action="#" method="post" class="register">
	<ul class="drop_menu">
               <li>
              <a href="roommaster_search.php">
                Search
              </a>
              </li>
                <li><a href="roommastertable.php">View</a></li>
          		
<li><button class="button" type="submit">Edit</button></li>
				  </div>
</p>
	
		
				<div class="image">
              <img src="images/2.jpg" width="100%" height="100px"/>
              <h2>  Room Master </h2>
        </div><BR>
		<div style="width:600px; margin:0 auto;">
			<p class="agreement">
			<label for="lcode">Ward Code:</label>
			<select id="wc" name="wc" class="wc" readonly required>
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
$str1="select * from ward_master where WARD_CODE='".$_GET['t1']."'";
$result1=$conn->query($str1);
$row1 = $result1->fetch_assoc();
echo "<option value='".$_GET['t1']."'>".$row1['WARD_NAME']."</option>";
    while($row = $result->fetch_assoc()) {
	echo "<option value='".$row['WARD_CODE']."'>".$row['WARD_NAME']."</option>";
}
?>
</select>
<input type="text" id="wc1" name="wc1" value=<?php echo $_GET['t1']; ?> readonly required>
</p><p class="agreement">
<label for="hcode">Room Code:</label>
			<input type="text" name="rc" value=<?php echo $_GET['t3']; ?> readonly>
			</p><p class="agreement">
			<label for="hcode">Block:</label>
			<input type="text" name="bl" value=<?php echo $_GET['t4']; ?> readonly>
			</p><p class="agreement">
			<label for="hcode">No. of Beds:</label>
			<input type="text" name="nb" value=<?php echo $_GET['t5']; ?>>
		<?php	$_SESSION['nbed']=$_GET['t5'];?>
			</p><p class="agreement">
			<label for="hcode">Level:</label>
			<input type="text" name="ll" value=<?php echo $_GET['t6']; ?> readonly>
			</p><p class="agreement">
			<label for="hcode">Extension Number:</label>
			<input type="text" name="en" value=<?php echo $_GET['t7']; ?> readonly>
			</p><p class="agreement">
			<label for="ccode">Nurse Station: </label>
			<select name="ns" id="ns" class="ns" disabled>
			<?php
			$str="select * from nurse_master where ns_code='".$_GET['t8']."'";
$result=$conn->query($str);
$row = $result->fetch_assoc();
echo "<option value='".$_GET['t8']."'>".$row['ns_name']."</option>";
    //while($row = $result->fetch_assoc()) {
	//echo "<option value='".$row['ns_code']."'>".$row['ns_name']."</option>";
//}
?>
</select>
<input type="text" id="ns1" name="ns1" value=<?php echo $_GET['t8']; ?> readonly required>
			</p>
			</div>
			<div class="tab" id="tab" name="tab">
		<table border=1>
		<tr><td>S. NO. </td><td>BED CODE</td><td>BED STATUS</td><td>IS ACTIVE</td><td>ROOM CODE</td><td>WARD CODE</td><td>WARD NAME</td></form></tr>
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
$cou=0;
$str="select * from rooms where rooms_wardcode='".$_GET['t1']."' and rooms_code='".$_GET['t3']."'";
$result=$conn->query($str);
while($row = $result->fetch_assoc()) {
		$room="ro".$cou;
		$sno="so".$cou;
	echo "<tr><td><input type='text' style='margin-left:0; border:none;' name='".$sno."' id='t7' value='".$row['ROOMS_SNO']."' readonly='readonly'></td><td><input type='text' style='margin-left:0; border:none;' name='".$room."' id='t1' value='".$row['ROOMS_BEDCODE']."' readonly='readonly'></td><td><input type='text' style='margin-left:0; border:none;' name='t6' id='t6' value='".$row['ROOMS_BEDSTATUS']."' readonly='readonly'></td><td><input type='text' style='margin-left:0; border:none;' name='t2' id='t2' value='".$row['ROOMS_STATUS']."' readonly='readonly'></td><td><input name='t3' id='t3' style='margin-left:0; border:none;' value='".$row['ROOMS_CODE']."' readonly='readonly' ></td><td><input type='text' style='margin-left:0; border:none;' name='t4' id='t4' value='".$row['ROOMS_WARDCODE']."' readonly='readonly'></td><td><input type='text' style='margin-left:0; border:none;' name='t5' id='t5' value='".$row['ROOMS_WARDNAME']."' readonly='readonly'></td></td></tr>";
	$cou=$cou+1;
	$_SESSION['cou']=$cou;
}
?>
</table>
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
//$val7=$_POST['ns'];
$t=time();
$str1="select * from ward_master where ward_code='".$val1."'";
$result=$conn->query($str1);
while($row = $result->fetch_assoc()) {
	$val8=$row['WARD_NAME'];
}
$str="UPDATE room_master SET ROOM_BEDNO='".$val4."' WHERE ROOM_WARDCODE='".$val1."' and ROOM_CODE='".$val2."'";
if ($conn->query($str) == TRUE) {
		$str1="select * from rooms where rooms_wardcode='".$val1."' and rooms_code='".$val2."'";
$result=$conn->query($str1);
$count=1;
while($row = $result->fetch_assoc()) {
	$count=$count+1;
}
	for($i=($_SESSION['nbed']+1);$i<=((int)$val4);$i=$i+1)
	{
		$str="insert into rooms values('".$i."','".$val1."','".$val8."','".$val2."','','Vacent','".$_SESSION['userid']."','".date("d-m-Y h:m:sa",$t)."',NULL,NULL,true)";
	$result=$conn->query($str);
	}
  	$_SESSION['VAL']=$val1;
	$_SESSION['VAL2']=$val2;
	?>
<script type="text/javascript">$('#tab').hide()</script>
<?php

	$cou=0;
	echo "<form action='room.php' method='post'>";
echo "<table border=1>";
	//starttttt
	for($i=1;$i<=((int)$val4);$i=$i+1)
	{
	$str="select * from rooms where rooms_wardcode='".$val1."' and rooms_code='".$val2."' and ROOMS_SNO='".$i."'";
$result=$conn->query($str);
   $row = $result->fetch_assoc();
		$room="ro".$cou;
		$sno="so".$cou;
		$st="st".$cou;
	echo "<tr><td><input type='text' style='margin-left:0; border:none;' name='".$sno."' id='".$sno."' value='".$row['ROOMS_SNO']."' readonly='readonly'></td><td><input type='text' style='margin-left:0; border:none;' name='".$room."' id='".$room."' value='".$row['ROOMS_BEDCODE']."' ></td>";
	echo "<td><select style='margin-left:0; border:none;' name='".$st."' id='".$st."'>";
	echo "<option value='".$row['ROOMS_BEDSTATUS']."'>".$row['ROOMS_BEDSTATUS']."</option>";
	echo "<option value='Full'>Full</option>";
	echo "<option value='Vacent'>Vacent</option>";
	echo "<option value='Retain'>Retain</option>";
	echo "<option value='Blocked'>Blocked</option>";
	echo "<option value='Additional'>Additional</option>";
	echo "</select></td>";
	
	echo"<td><input type='text' style='margin-left:0; border:none;' name='t2' id='t2' value='".$row['ROOMS_STATUS']."' readonly='readonly'></td><td><input name='t3' id='t3' style='margin-left:0; border:none;' value='".$row['ROOMS_CODE']."' readonly='readonly' ></td><td><input type='text' style='margin-left:0; border:none;' name='t4' id='t4' value='".$row['ROOMS_WARDCODE']."' readonly='readonly'></td><td><input type='text' style='margin-left:0; border:none;' name='t5' id='t5' value='".$row['ROOMS_WARDNAME']."' readonly='readonly'></td></td></tr>";
	$cou=$cou+1;
	}
	$_SESSION['cou']=($cou-1);
echo "</table>";
echo "<input type='submit' name='edit' value='Save'>";
echo "</form>";
}
else
{
	echo "Error: " . $sql . "<br>" . $conn->error;
	echo "Not inserted";
}
if(isset($_POST['edit']))
{
	for($i=0;$i<$cou;$i++)
	{
		$room="ro".$i;
		$sno="so".$i;
	$str="UPDATE rooms SET ROOMS_BEDCODE='".$_POST[$room]."' WHERE ROOMS_SNO='".$_POST[$sno]."' AND ROOMS_CODE='".$_POST['t3']."' AND ROOMS_WARDCODE='".$_POST['t4']."'";
	$result=$conn->query($str);
	}
	 echo "<script>";
	echo "window.alert('Sucessfully Updated');";
	echo "</script>";
	//header("Refresh:0; url:")
	//unset($_POST['edit']);
//header("location:roomcreate.php");
}
}
if($_SERVER['REQUEST_METHOD']=='GET')
{

	$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hospital";
if(isset($_GET['edit']))
{
	for($i=0;$i<$_SESSION['cou'];$i++)
	{
		$room="ro".$i;
		$sno="so".$i;
	$str="UPDATE rooms SET ROOMS_BEDCODE='".$_GET[$room]."' WHERE ROOMS_SNO='".$_GET[$sno]."' AND ROOMS_CODE='".$_GET['t3']."' AND ROOMS_WARDCODE='".$_GET['t4']."'";
	$result=$conn->query($str);
	}
	 echo "<script>";
	echo "window.alert('Sucessfully Updated');";
	echo "</script>";
	//header("Refresh:0; url:")
	//unset($_POST['edit']);
//header("location:roomcreate.php");
}
}
?>