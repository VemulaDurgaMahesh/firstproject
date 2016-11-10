<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script type="text/javascript" src="jquery-1.4.1.min.js"></script>
<script type="text/javascript">
$(document).ready(function()
{
	$(".tar").change(function() {
		var id=$(this).val();
          $("#tn").val(id);
        })
	/*$(".tar").change(function()
	{
		var id=$(this).val();
		var dataString = 'id2='+ id;
	
		$.ajax
		({
			type: "POST",
			url: "get_data.php",
			data: dataString,
			cache: false,
			success: function(html)
			{
				$(".tntxt").html(html);
			} 
		});
	});*/
	
});
</script>
<meta charset='utf-8'>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="styles.css">
   <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
   <script src="script.js"></script>
<link rel="stylesheet" type="text/css" href="css/menu.css" />
<link rel="stylesheet" type="text/css" href="css/default.css" />
<title>    header </title>
</head>
<body>
<?php include('menu.php'); ?>
		<form action="#" method="post" class="register">
		<p>
		<div>
<ul class="drop_menu">
               <li>
              <a href="wardgrptable_search.php">
                Search
              </a>
              </li>
                <li><a href="wardgrptable.php">View</a></li>
                <li>
                  <button class="button" type="submit">Save</button></li>
				  </ul>
				  </div>
</p>                	
		
		
		<div class="image">
              <img src="images/2.jpg" width="100%" height="100px"/>
              <h2>  Ward Group Master </h2>
        </div>
		<BR><BR><BR><BR>
		<div style="width:600px; margin:0 auto;">
		<p class="agreement">
			<label for="hname">Ward group Code: </label>
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
$str="select * from wardgrop_master";
$result=$conn->query($str);
$count=1;
    while($row = $result->fetch_assoc()) {
        $count=$count+1;
    }
			echo "<input type='text' name='wgc' value=WG".$count.">";
			?>
			</p><br><br><p class="agreement">
			<label for="hcode">Ward Group Name:</label>
			<input type="text" name="wgn">
			</p><br><br><p class="agreement">
			<label for="lcode">Tariff Application:</label>
			<select name="tarapp" id="tarapp" class="tar" required>
			
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
$str="SELECT *  from  tariff_master";
$result=$conn->query($str);
//echo "<select name='cnames'>";
echo "<option value='NULL'>--Select Tariff--</option>";
    while($row = $result->fetch_assoc()) {
	echo "<option value='".$row['tariff_code']."'>".$row['tariff_name']."</option>";
}
?>
                     
                      </select>
					  
			<input type="text" id="tn" name="tn" class="tntxt" disabled>
			
			</p><p class="agreement">
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

$val1=$_POST['wgc'];
$val2=$_POST['wgn'];
$val3=$_POST['tarapp'];
$t=time();
$str="insert into wardgrop_master values('".$val1."','".$val2."','".$val3."','".$_SESSION['username']."','".date("d-m-Y h:m:sa",$t)."','NULL','NULL',true)";
if ($conn->query($str) == TRUE) {
    
}
$str="ALTER TABLE soc_masters ADD ".$val2." INT NULL ";
if ($conn->query($str) == TRUE) {
    
}
$str1="ALTER TABLE normal_charge ADD ".$val2." INT NULL ";
if ($conn->query($str1) == TRUE) {
    
}
$str2="ALTER TABLE emerg_charges ADD ".$val2." INT NULL ";
if ($conn->query($str2) == TRUE) {
    
}
$str3="ALTER TABLE revisit_charges ADD ".$val2." INT NULL ";
if ($conn->query($str3) == TRUE) {
    echo "<script>";
	echo "window.alert('Sucessfully Entered New Record');";
	echo "window.location.href='wardgroupmaster.php'";
	echo "</script>";
}
else
{
	echo "Not inserted";
}
}
?>