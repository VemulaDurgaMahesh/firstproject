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
		$("#tn1").val(id);
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
	$(".sname").change(function()
	{
		var id=$(this).val();
		$("#sc").val(id);
		$("#sercode").val(id);
		var dataString = 'id10='+ id;
		$.ajax
		({
			type: "POST",
			url: "get_data.php",
			data: dataString,
			cache: false,
			success: function(html)
			{
				$("#ss").html(html);
				$("#sercode").val();
				var x=$("#sname option:selected").text();
				$("#sername").val(x);
				var y=$("#sercode").val();
				var dataString = 'c='+y;
				$.ajax
				({
			type: "POST",
			url: "get_data.php",
			data: dataString,
			cache: false,
			success: function(html)
			{
				$("#divhide").html(html);
				var z=$("#appfor").val();
				if(z=="IPV")
				{
					$(".divhide").show();
				}
				else
				{
					$(".divhide").hide();
				}
			} 
		});
			} 
		});
	});
	$(".dtype").change(function() {
		var id=$(this).val();
		if(id=="IPV")
		{
			$(".divhide").show();
		}
		else
		{
			$(".divhide").hide();
		}
         
        });
	$(".bh").change(function()
	{
		var id=$(this).val();
		$("#bn1").val(id);
	});	
	$("#hosp").change(function() {
		var id=$(this).val();
		var ch=$("#charge").val();
		var am=(id*ch)/100;
		$("#hospam").val(am);
		});
		$("#doc").change(function() {
		var id=$(this).val();
		var ch=$("#charge").val();
		var am=(id*ch)/100;
		$("#docam").val(am);
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
   <script src="jquery-latest.min.js" type="text/javascript"></script>
   <script src="script.js"></script>
	
	<link rel="stylesheet" type="text/css" href="css/menu.css" />
<link rel="stylesheet" type="text/css" href="css/default.css" />


</head>

<body>
<?php include("menu.php");?>
<p>
<form action="#" method="post" class="register">
	<ul class="drop_menu">
               <li>
              <a href="sostable_search.php">
                Search
              </a>
              </li>
                <li><a href="sostable.php">View</a></li>
          		
<li><button class="button" type="submit">Save</button></li>
				  </div>
</p>


<fieldset class="row1" style="width:1000px;">
<legend>Service Orignal Charges</legend>

<div>
<p>
<fieldset>
              <legend> Service Type</legend>
			<label><input type="radio" name="stype" class="stype" value="services" checked> Services </input></label>
			<label><input type="radio" name="stype" class="stype" value="investigations"> Investigations </input></label>
			<label><input type="radio" name="stype" class="stype" value="miscellaneous"> Miscellaneous </input></label>
			</fieldset>
</p>
<br>

<p class="agreement">
<label>Tariff Name :</label> <select name="tn" class="tn" style='width:185px; height:23px;' readonly>
<option selected="selected">--Select Tariff--</option>
</select>
<input type="text" id="tn1" name="tn1" style='width:185px; height:23px;'>
</p><p class="agreement">
<label>Service Name :</label> <select id="sname" name="sname" class="sname" style='width:185px; height:23px;' readonly>
<option selected="selected">--Select Service--</option>
</select>
<input type="text" name="sc" id="sc" style='width:185px; height:23px;' readonly>
</p>
<div class="ss" id="ss">

<?php 
			echo "<p class='agreement'>";
			echo "<label>Service Group</label><input type='text' style='width:185px; height:23px;' readonly>";
			echo"<p class='agreement'>";
			echo "<label>Charge:</label>";
			echo "<input type='text'  readonly='readonly' style='width:185px; height:23px;'>";
			echo "</p><p class='agreement'>";
			echo "<label>Hospital%:</label>";
			echo "<input type='text'  readonly='readonly' style='width:185px; height:23px;'><input type='text'  readonly='readonly' style='margin-left:7px;width:185px; height:23px;'>";
			echo"</p><p class='agreement'>";
			echo "<label>Doctor%:</label>";
			echo "<input type='text' readonly='readonly' style='width:185px; height:23px;'><input type='text'   readonly='readonly' style='margin-left:7px;width:185px; height:23px;'>";
			echo "</p><p class='agreement'>";
			echo "<label>Application For</label>";
			echo "<input type='text' id='appfor' class='appfor' name='appfor' style='width:185px; height:23px;' readonly='readonly'>";
			echo"</p>";
?>

</div>
</fieldset>

<br><br>

				<fieldset class="row1" style="width:1000px;">
              <legend> Service Modification Details</legend>	
			  <br>
				<fieldset>
              <legend> Application For</legend>
			<label><input type="radio" name="dtype" class="dtype" value="Both" checked> Both </input></label>
			<label><input type="radio" name="dtype" class="dtype" value="IP"> IP </input></label>
			<label><input type="radio" name="dtype" class="dtype" value="OP"> OP </input></label>
			<label><input type="radio" name="dtype" class="dtype" value="IPV"> IP (Variations) </input></label>
			</fieldset>
		
			<br>
	
			
				
				<p><label>Service Type	</label>	
			<input type="radio" name="stype" value="services" checked><label>Services</label>
			<input type="radio" name="stype" value="investigations"/><label>Investigations</label>
			<input type="radio" name="stype" value="miscellaneous"/><label>Miscellaneous</label></p><br><br>
			<p class="agreement">
			<label for='hcode'>Service Code:</label>
			<input type='text' id='sercode' name='sercode' style='width:185px; height:23px;' readonly>
			
			
			<label for='hcode'>Service Name:</label>
			<input type='text' id='sername' name='sername' style='width:185px; height:23px;'>
		</p><p class="agreement">
			<label>Billing Head:</label> 
			<select id="bh" name="bh" class="bh" style='width:185px; height:23px;'>
			<?php 
				$str="select * from billing";
				$result=$conn->query($str);
				//echo "<select name='cnames'>";
				echo "<option value='NULL'>--Select Billing Header--</option>";
				while($row = $result->fetch_assoc()) {
				echo "<option value='".$row['billing_sno']."'>".$row['billing_header']."</option>";
				}
			?>
			</select>
			<input type="text" name="bn1" id="bn1" style='width:185px; height:23px;'>
			</p><p class="agreement">
			<label for='hcode'>Charge:</label>
			<input type='text' id='charge' name='charge' style='width:185px; height:23px;'>
			</p>
			<p class="agreement">
			<label for='hcode'>Hospital %:</label>
			<input type='text' id='hosp' name='hosp' style='width:185px; height:23px;'>
			<input type='text' id='hospam' name='hospam' style='margin-left:7px;width:185px; height:23px;'>
		</p><p class="agreement">
			<label for='hcode'>Doctor %:</label>
			<input type='text' id='doc' name='doc' style='width:185px; height:23px;'>
			<input type='text' id='docam' name='docam' style='margin-left:7px;width:185px; height:23px;'>
			</p>
					<p class="agreement">
			<label for='hcode'>Instruction:</label>
			<input type='text' id='inst' name='inst' style='width:185px; height:23px;' >
	
			</p>
		<p class="agreement">
		<div class="divhide" name="divhi" id="divhide" hidden>		
			<?php
	/*echo"<fieldset><legend>Ward Group Wise Charges</legend><table border=1><tr>";	 
			
			   
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
				$valll=$row['WARDGRP_NAME'];
				echo "<td><input type='text' value='".$row1[$valll]."' style='margin-left:0px; border:none; margin-right:0px;' readonly='readonly'></td>";
			}
			
			echo "</tr></tr>";
			
			echo "<td>New Charge<td>";
			for($i=0;$i<$count;$i=$i+1)
				echo "<td><input type='text' name='".$i."' style='margin-left:0px; border:none; margin-right:0px;'></td>";
		
echo" </tr></table></fieldset>"; 
			echo "</fieldset>"; */?>

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
$val13=$_POST['dtype'];
//$val14=$_POST['srcode'];
$t=time();
$str="update soc_masters set soc_servicename='".$val5."', soc_charge='".$val7."', soc_hospitalper='".$val8."', soc_hospitalcharge='".$val9."', soc_doctorper='".$val10."', soc_doctorcharge='".$val11."', soc_instructions='".$val12."', soc_applicationfor='".$val13."' where soc_servicecode='".$val6."'";
if ($conn->query($str) == TRUE) {
   
	if($val13=="IPV")
	{
	$str="select * from wardgrop_master";
				$result=$conn->query($str);
				$i=0;
				while($row = $result->fetch_assoc()) {
				$str1="UPDATE soc_masters SET ".$row['WARDGRP_NAME']."='".$_POST[$i]."' where soc_servicecode='".$val6."'";
				$conn->query($str1);
				$i=$i+1;
				}
	}
	echo "<script>";
	echo "window.alert('Sucessfully Updated');";
	echo "</script>";
}
else
{
	echo "Error: " . $sql . "<br>" . $conn->error;
}
}
?>