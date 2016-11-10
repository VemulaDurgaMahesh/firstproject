<?php
session_start();
$_SESSION['userid']="kishore";
$_SESSION['scode']="";
?>
<?php
include('dbcon.php');
include('dbcon2.php');
?>
<html>
<head>
<script type="text/javascript" src="jquery-1.4.1.min.js"></script>
<script type="text/javascript">
$(document).ready(function()
{
	$(".stype").change(function()
	{
		var id=$(this).val();
		var dataString = 'id='+ id;
	
		$.ajax
		({
			type: "POST",
			url: "get_data.php",
			data: dataString,
			cache: false,
			success: function(html)
			{
				$(".tn").html(html);
			} 
		});
	});
	
	
	$(".tn").change(function()
	{
		var id=$(this).val();
		var dataString = 'id1='+ id;
	
		$.ajax
		({
			type: "POST",
			url: "get_data.php",
			data: dataString,
			cache: false,
			success: function(html)
			{
				$(".sname").html(html);
			} 
		});
	});
	
	
});
</script>
	<meta charset="utf-8">
	<title> Referral Master </title>
<link rel="stylesheet" type="text/css" href="menu.css" />
<meta charset='utf-8'>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="styles.css">
   <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
   <script src="script.js"></script>
	
	<link rel="stylesheet" type="text/css" href="css/menu.css" />
<link rel="stylesheet" type="text/css" href="css/default.css" />


</head>

<body>
<?php include("menu.php");?>
<p>
	<ul class="drop_menu">
               <li>
              <a href="reftable_search.php">
                Search
              </a>
              </li>
                <li><a href="reftable.php">View</a></li>
          		
<li><button class="button" type="submit">Save</button></li>
				  </div>
</p>
		<div class="image">
              <img src="images/4.jpg" width="100%" height="100px"/>
				<h2> Source of Transcation Charges </h2>
				</div>

<form action="#" method="get" class="register">
<fieldset class="row1">
<legend>Service Orignal Charges</legend>

<div>

<label>Service Type :</label> 
<select name="stype" class="stype">
<option selected="selected">--Select Service Type--</option>
<option value="services">Services</option>
			<option value="investigations">Investigations</option>
			<option value="miscellaneous">Miscellaneous</option>
</select>

<label>Tariff Name :</label> <select name="tn" class="tn">
<option selected="selected">--Select Tariff--</option>
</select>


<label>Service Name :</label> <select name="sname" class="sname">
<option selected="selected">--Select Service--</option>
</select>
<button class="button" type="submit">Retrive</button>

<?php
			if(isset($_GET['sname']))
{
	$_SESSION['DTYPE']=$_GET['sname'];
	 
				$str="select * from soc_masters where soc_servicename='".$_GET['sname']."'";
				$result=$conn->query($str);
				$row = $result->fetch_assoc();
				echo"<p class='agreement'>";
				echo "<label>Service Group:</label>";
			echo "<input type='text' id='sg' class='sg' name='sg' value=".$row['soc_servicegroupname']." readonly='readonly'>";
		
			echo "<label>Charge:</label>";
			echo "<input type='text' id='sg' class='sg' name='sg' value=".$row['soc_charge']." readonly='readonly'>";
		
			echo "<label>Hospital%:</label>";
			echo "<input type='text' id='sg' class='sg' name='sg' value=".$row['soc_hospitalper']." readonly='readonly'><input type='text' id='sg' class='sg' name='sg' value=".$row['soc_hospitalcharge']." readonly='readonly'>";
			echo"</p><p class='agreement'>";
			echo "<label>Doctor%:</label>";
			echo "<input type='text' id='sg' class='sg' name='sg' value=".$row['soc_doctorper']." readonly='readonly'><input type='text' id='sg' class='sg' name='sg' value=".$row['soc_doctorcharge']." readonly='readonly'>";
			
			echo "<label>Application For</label>";
			echo "<input type='text' id='sg' class='sg' name='sg' value=".$row['soc_applicationfor']." readonly='readonly'>";
			echo"</p>";
			$_SESSION['scode']=$row['soc_code'];
			//$_SESSION['appli']=$row['soc_applicationfor'];
			
			
	}
	if(!isset($_GET['sname']))
	{
		echo "<label>Service Group:</label>";
			echo "<input type='text' id='sg' class='sg' name='sg' value='' readonly='readonly'>";
		
			echo "<label>Charge:</label>";
			echo "<input type='text' id='sg' class='sg' name='sg' value='' readonly='readonly'>";
		
			echo "<label>Hospital%:</label>";
			echo "<input type='text' id='sg' class='sg' name='sg' value='' readonly='readonly'><input type='text' id='sg' class='sg' name='sg' value='' readonly='readonly'>";
	echo"<br>";
            echo "<p>";
			echo "<label>Doctor%:</label>";
			echo "<input type='text' id='sg' class='sg' name='sg' value='' readonly='readonly'><input type='text' id='sg' class='sg' name='sg' value='' readonly='readonly'>";
		
	}
?>

</div>
</fieldset>
</form>

<form action="#" method="get" class="register">
				<fieldset>
              <legend> Service Modification Details</legend>	
				<fieldset>
              <legend> Application For</legend>
			<label><input type="radio" name="dtype" value="Both"> Both </input></label>
			<label><input type="radio" name="dtype" value="IP"> IP </input></label>
			<label><input type="radio" name="dtype" value="OP"> OP </input></label>
			<label><input type="radio" name="dtype" value="IPV"> IP (Variations) </input></label>
			<label<input type="submit" name="app" value="get charges"></label>
			</fieldset>
			</form>
			<form action="#" method="post">
			
				
				<p><label>Service Type	</label>	
			<input type="radio" name="stype" value="services"><label>Services</label>
			<input type="radio" name="stype" value="investigations"/><label>Investigations</label>
			<input type="radio" name="stype" value="miscellaneous"/><label>Miscellaneous</label></p>
			<p class="agreement">
			<label>SofService Code::</label> 
			<?php include('dbcon.php');
			$count=1;
			$str="select * from soc_masters";
            $result=$conn->query($str);
            while($row = $result->fetch_assoc()) {
             $count=$count+1;
            }
			echo "<input type='text' name='srcode' value='".$_SESSION['scode']."' readonly='readonly'>";
			?>
			
			<label for='hcode'>Service Name:</label>
			<input type='text' id='sername' name='sername'>
			<label for='hcode'>Service Code:</label>
			<input type='text' id='sercode' name='sercode' >
		</p>
		<p class="agreement">
			<label>Billing Head:</label> 
			<select id="bh" name="bh">
			<?php 
				$str="select * from wardgrop_master";
				$result=$conn->query($str);
				//echo "<select name='cnames'>";
				echo "<option value='NULL'>--Select Billing Header--</option>";
				while($row = $result->fetch_assoc()) {
				echo "<option value='".$row['WARDGRP_CODE']."'>".$row['WARDGRP_NAME']."</option>";
				}
			?>
			</select>
			<label for='hcode'>Charge:</label>
			<input type='text' id='charge' name='charge'>
			</p>
			<p class="agreement">
			<label for='hcode'>Hospital %:</label>
			<input type='text' id='hosp' name='hosp' >
			<input type='text' id='hospam' name='hospam' >
		
			<label for='hcode'>Doctor %:</label>
			<input type='text' id='doc' name='doc' >
			<input type='text' id='docam' name='docam' >
			</p>
					<p class="agreement">
			<label for='hcode'>Instruction:</label>
			<input type='text' id='inst' name='inst' >
		
			</p>
			
			<?php
			if(isset($_GET['app']))
{
	$_SESSION['DTYPE']=$_GET['dtype'];
	if($_GET['dtype']=="IPV")
	{
	echo"<fieldset><legend>Ward Group Wise Charges</legend><table border=1><tr>";	 
			
			   
			   $count=0;
				$str="select * from wardgrop_master";
				$result=$conn->query($str);
				echo "<td><td>";
				while($row = $result->fetch_assoc()) {
				echo "<td>".$row['WARDGRP_NAME']."</td>";
				$count=$count+1;
				}
			
			echo "</tr></tr>";
			
			$str="select * from wardgrop_master";
				$result=$conn->query($str);
				echo "<td>Old Charge<td>";
				while($row = $result->fetch_assoc()) {
			$str1="select * from soc_masters where soc_code='".$_SESSION['scode']."'";
				$result1=$conn->query($str1);
				$row1=$result1->fetch_assoc();
				echo "<td><input type='text' value='".$row1[$row['WARDGRP_NAME']]."' readonly='readonly'></td>";
			}
			
			echo "</tr></tr>";
			
			echo "<td>New Charge<td>";
			for($i=0;$i<$count;$i=$i+1)
				echo "<td><input type='text' name='".$i."'></td>";
		
echo" </tr></table></fieldset>"; }}?>
			</fieldset>


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
$val1=$_POST['stype'];
//$val2=$_POST['tn'];
//$val3=$_POST['sg'];
$val4=$_POST['bh'];
$val5=$_POST['sername'];
$val6=$_POST['sercode'];
$val7=$_POST['charge'];
$val8=$_POST['hosp'];
$val9=$_POST['hospam'];
$val10=$_POST['doc'];
$val11=$_POST['docam'];
$val12=$_POST['inst'];
$val13=$_SESSION['DTYPE'];
$val14=$_POST['srcode'];
$t=time();
$str="update soc_masters set soc_servicename='".$val5."', soc_charge='".$val7."', soc_hospitalper='".$val8."', soc_hospitalcharge='".$val9."', soc_doctorper='".$val10."', soc_doctorcharge='".$val11."', soc_instructions='".$val12."', soc_applicationfor='".$val13."' where soc_code='".$_SESSION['scode']."'";
if ($conn->query($str) == TRUE) {
    echo "<center><h1>New record created successfully</h1></center>";
	if($_SESSION['DTYPE']=="IPV")
	{
	$str="select * from wardgrop_master";
				$result=$conn->query($str);
				$i=0;
				while($row = $result->fetch_assoc()) {
				$str1="UPDATE soc_masters SET ".$row['WARDGRP_NAME']."='".$_POST[$i]."' where soc_code='".$val14."'";
				$conn->query($str1);
				$i=$i+1;
				}
	}
}
else
{
	echo "Error: " . $sql . "<br>" . $conn->error;
}
}
?>