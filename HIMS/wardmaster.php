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
	
	$(".wg").change(function()
	{
		var id=$(this).val();
		$("#wg1").val(id);
          var dataString = 'id6='+id;
	
		$.ajax
		({
			type: "POST",
			url: "get_data.php",
			data: dataString,
			cache: false,
			success: function(html)
			{
				
				$(".tarapp").html(html);
				var val1=$( "#tarapp option:selected").val();
				$("#tarapp1").val(val1);
			} 
		});
	});

	
});
</script>
</head>

<body>
<?php include('menu.php'); ?>
	<form action="#" method="post"class="register">
		<p>
		<div>
<ul class="drop_menu">
               <li>
              <a href="wardmaster_search.php">
                Search
              </a>
              </li>
                <li><a href="wardmastertable.php">View</a></li>
                <li>
                  <button class="button" type="submit">Save</button></li>
				  </ul>
				  </div>
</p>      
				<div class="image">
              <img src="images/2.jpg" width="100%" height="100px"/>
              <h2>  Ward Master </h2>
        </div>
		<BR><BR><BR><BR>
		<div style="width:600px; margin:0 auto;">
				<p class="agreement">
			<label for="hname">Ward Code: </label>
			
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
			$str="select * from ward_master";
			$result=$conn->query($str);
			$count=1;
				while($row = $result->fetch_assoc()) {
					$count=$count+1;
				}
			echo "<input type='text' name='wc' value=W".$count." readonly='reaonly'>";
?>
			
			</p><br><br><p class="agreement">
			<label for="hcode">Ward Name:</label>
			<input type="text" name="wn">
			</p><br><br><p class="agreement">
			<label for="lcode">Ward Group:</label>
			<select id="wg" name="wg" class="wg" >
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
$str="select * from wardgrop_master";
$result=$conn->query($str);
//echo "<select name='cnames'>";
echo "<option value='NULL'>--Select Ward Group--</option>";
    while($row = $result->fetch_assoc()) {
	echo "<option value='".$row['WARDGRP_CODE']."'>".$row['WARDGRP_NAME']."</option>";
}
?>
</select>
<input type="text" name="wg1" id="wg1" value=" " disabled/>
</p><br><br><p class="agreement">
			<label for='hcode'>Tariff Application:</label>
			<select id='tarapp' name='tarapp' class="tarapp" readonly='readonly'> <option value=" ">--select tarrif--</option>
			</select><input type="text" name="tarapp1" id="tarapp1"  disabled/>
			</p>

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
$val3=$_POST['wg'];
$t=time();
$str1="select * from wardgrop_master where wardgrp_code='".$val3."'";
$result=$conn->query($str1);
while($row = $result->fetch_assoc()) {
	$val5=$row['WARDGRP_NAME'];
	$val4=$row['TARIFF_APPL'];
}
$str="insert into ward_master values('".$val1."','".$val2."','".$val3."','".$val5."','".$val4."','".$_SESSION['userid']."','".date("d-m-Y h:m:sa",$t)."',NULL,NULL,true)";
if ($conn->query($str) == TRUE) {
   echo "<script>";
	echo "window.alert('Sucessfully Entered New Record');";
	echo "</script>";
}
else
{
	echo "Not inserted";
}
}
?>