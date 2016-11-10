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
	$(".desig").change(function()
	{
		var id=$(this).val();
		if(id=="Doctor")
		{
			$("label[for='empc']").html("Doctor");
				
		}
		else
		{
			$("label[for='empc']").html("Employee");
				
		}
		var dataString = 'id3='+ id;
	
		$.ajax
		({
			type: "POST",
			url: "get_data.php",
			data: dataString,
			cache: false,
			success: function(html)
			{
				
				$(".empcode").html(html);
				
			} 
		});
	});
	
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
			<input type='text' name='wc' value=<?php echo $_GET['t1']; ?> readonly='readonly' required>
			
			

			
			</p><br><br><p class="agreement">
			<label for="hcode">Ward Name:</label>
			<input type="text" name="wn" value=<?php echo $_GET['t2']; ?> required>
			</p><br><br><p class="agreement">
			<label for="lcode">Ward Group:</label>
			<select id="wg" name="wg" class="wg">
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

$str1="select * from wardgrop_master where WARDGRP_CODE='".$_GET['t3']."'";
$result1=$conn->query($str1);
//echo "<select name='cnames'>";
    $row1 = $result1->fetch_assoc();
	echo "<option value='".$row1['WARDGRP_CODE']."'>".$row1['WARDGRP_NAME']."</option>";
$str="select * from wardgrop_master";
$result=$conn->query($str);
//echo "<select name='cnames'>";

    while($row = $result->fetch_assoc()) {
	echo "<option value='".$row['WARDGRP_CODE']."'>".$row['WARDGRP_NAME']."</option>";
}
?>
</select>
<input type="text" name="wg1" id="wg1" value=<?php echo $_GET['t3']; ?> disabled/>
</p><br><br><p class="agreement">
			<label for='hcode'>Tariff Application:</label>
			<select id='tarapp' name='tarapp' class="tarapp" readonly='readonly'><?php 
			$str="select * from tariff_master t, wardgrop_master w where w.TARIFF_APPL=t.tariff_code and w.WARDGRP_CODE='".$_GET['t3']."'";
$result=$conn->query($str);
//echo "<select name='cnames'>";

    while($row = $result->fetch_assoc()) {
		$val=$row['tariff_code'];
	echo "<option value='".$row['tariff_code']."'>".$row['tariff_name']."</option>";
}
?>
			</select><input type="text" name="tarapp1" id="tarapp1" value=<?php echo $val; ?> disabled/>
			</p>
			<?php if($_GET['t10']=='1')
			{
			echo "<label>Active</label> <input type='checkbox' name='stat' value='1' checked>";
			}
			else
			{
				echo "<label>Active</label> <input type='checkbox' name='stat' value='0'>";
			}
			?>
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
$val4=$_POST['tarapp'];
if (isset($_POST['stat'])) {
    $val6=true;
}
else
{
	$val6=false;
}

$t=time();
$str="UPDATE ward_master SET WARD_CODE='".$val1."', WARD_NAME='".$val2."',WARD_GRPCODE='".$val3."',WARD_TARIFF='".$val4."', WARD_MODIFIEDBY='".$_SESSION['userid']."', WARD_MODIFIEDTIME='".date("d-m-Y h:m:sa",$t)."',WARD_ACTIVE='".$val6."' WHERE WARD_CODE='".$val1."'";
if ($conn->query($str) == TRUE) {
    ?>
	<script>
	window.alert('Sucessfully Updated');
	window.location.href='wardmastertable.php';
	</script>
	<?php
}
else
{
	echo "Error: " . $sql . "<br>" . $conn->error;
}
}
?>