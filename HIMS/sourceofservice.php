
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title> Source Of Service Master </title>
<meta charset='utf-8'>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
   <script src="script.js"></script>
<link rel="stylesheet" type="text/css" href="css/menu.css" />
<link rel="stylesheet" type="text/css" href="css/default.css" />
<script type="text/javascript" src="jquery-1.4.1.min.js"></script>
<script type="text/javascript">
$(document).ready(function()
{
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
         
        })	
		$(".sg").change(function() {
			var id=$(this).val();
			var dataString = 'id9='+id;
			$.ajax
			({
			type: "POST",
			url: "get_data.php",
			data: dataString,
			cache: false,
			success: function(data)
			{
				$("#sercode").val(data);
			} 
		});
		});
		$(".tn").change(function() {
		var id=$(this).val();
		$("#tn1").val(id);
		});
		$(".sg").change(function() {
		var id=$(this).val();
		$("#sg1").val(id);
		});
		$(".bh").change(function() {
		var id=$(this).val();
		$("#bh1").val(id);
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
</head>

<body>
<?php include("menu.php");?>
<form action="#" method="post" class="register">
	<p>
	<ul class="drop_menu">
               <li>
              <a href="sostable_search.php">
                Search
              </a>
              </li>
                <li><a href="sostable.php">View</a></li>
                 <li><button class="button" type="submit" name="sub">Save</button></li>
				  </ul>
				  </div>
</p>
		<div class="image">
              <img src="images/4.jpg" width="100%" height="100px"/>
				
				</div>
			
				<fieldset class="row1" style="width:700px;">
              <legend> Application For</legend>
			<input type="radio" class="dtype" name="dtype" value="Both" checked><label> Both </label></input>
			<input type="radio" class="dtype" name="dtype" value="IP"> <label>IP</label> </input>
			<input type="radio" class="dtype" name="dtype" value="OP"> <label>OP </label></input>
			<input type="radio" class="dtype" name="dtype" value="IPV"> <label>IP (Variations)</label> </input>
		
			</fieldset>
				<fieldset class="row1">
              <legend> Service Type</legend>
					
			<input type="radio" name="stype" value="services" checked><label>Services</label></input>
			<input type="radio" name="stype" value="investigations"><label>Investigations</label></input>
			<input type="radio" name="stype" value="miscellaneous"><label>Miscellaneous</label></input>
			</fieldset>
			<p class="agreement">
			<label>SofService Code:</label>
			<?php include('dbcon.php');
			$count=1;
			$str="select * from soc_masters";
            $result=$conn->query($str);
            while($row = $result->fetch_assoc()) {
             $count=$count+1;
            }
			echo "<input type='text' name='srcode' value=SGM".$count." style='width:185px; height:23px;'  readonly='readonly'>";
			?>
			</p><p class="agreement">
			<label>Tariff Name: </label>
			<select id="tn" name="tn" class="tn" style='width:185px; height:25px;' >
			<?php 
				$str="select * from tariff_master";
				$result=$conn->query($str);
				//echo "<select name='cnames'>";
				echo "<option value='NULL'>--Select Tariff--</option>";
				while($row = $result->fetch_assoc()) {
				echo "<option value='".$row['tariff_code']."'>".$row['tariff_name']."</option>";
				}
			?>
			<input type="text" id="tn1" name="tn1" style='width:185px; height:23px;'  readonly>
			</select></p><p class="agreement">
			<label for='hcode'>Service Group:</label>
			<select name="sg" class="sg" style='width:185px; height:25px;' >
			<?php 
				$str="select * from servicegroup_master";
				$result=$conn->query($str);
				//echo "<select name='cnames'>";
				echo "<option value='NULL'>--Service Group--</option>";
				while($row = $result->fetch_assoc()) {
				echo "<option value='".$row['servicegroup_code']."'>".$row['servicegroup_name']."</option>";
				}
			?>
			</select>
			<input type="text" id="sg1" name="sg1" style='width:185px; height:23px;'  readonly>
			</p><p class="agreement">
			<label>Billing Head: </label>
			<select id="bh" name="bh" class="bh" style='width:185px; height:25px;' >
			<?php 
				$str="select * from billing";
				$result=$conn->query($str);
				//echo "<select name='cnames'>";
				echo "<option value='NULL'>--Select Billing Header--</option>";
				while($row = $result->fetch_assoc()) {
				echo "<option value='".$row['billing_sno']."'>".$row['billing_header']."</option>";
				}
			?>
			</select><input type="text" id="bh1" name="bh1" style='width:185px; height:23px;'  readonly></p><p class="agreement">
			<label for='hcode'>Service Name:</label>
			<input type='text' id='sername' name='sername' style='width:185px; height:23px;' >
			</p><p class="agreement">
			<label for='hcode'>Service Code:</label>
			<input type='text' id='sercode' name='sercode' style="text-align:left;width:185px; height:23px;'  readonly>
			</p><p class="agreement">
			<label for='hcode'>Charge:</label>
			<input type='text' id='charge' name='charge' style='width:185px; height:23px;' >
			</p><p class="agreement">
			<label for='hcode'>Hospital %:</label>
			<input type='text' id='hosp' name='hosp' style='width:185px; height:23px;' >
			<input type='text' id='hospam' name='hospam' style='margin-left:7px;width:185px; height:23px;' >
			</p><p class="agreement">
			<label for='hcode'>Doctor %:</label>
			<input type='text' id='doc' name='doc' style='width:185px; height:23px;' >
			<input type='text' id='docam' name='docam' style='margin-left:7px;width:185px; height:23px;' >
			</p><p class="agreement">
			<label for='hcode'>Instruction:</label>
			<input type='text' id='inst' name='inst' class="long" style='width:800px; height:23px;'  >
		</p><p class="agreement">
				<div class="divhide" name="divhi" hidden>
	<fieldset><legend>Ward Group Wise Charges</legend><table border=1><tr>
			  <?php 
			   $count=0;
				$str="select * from wardgrop_master";
				$result=$conn->query($str);
				while($row = $result->fetch_assoc()) {
				echo "<th style='width:100px;'>".$row['WARDGRP_NAME']."</th>";
				$count=$count+1;
				}
			
			echo "</tr><tr>";
			
			for($i=0;$i<$count;$i=$i+1)
				echo "<td><input type='text' style='margin-left:0px; border:none; margin-right:0px;width:185px; height:23px; ' name='".$i."'/></td>";
			
			echo" </tr></table></fieldset>";
?>
</div>
</p>
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


if(isset($_POST['sub']))
{
$val1=$_POST['stype'];
$val2=$_POST['tn'];
$val3=$_POST['sg'];
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
$val14=$_POST['srcode'];
$t=time();
$str="insert into soc_masters(`soc_type`, `soc_code`, `soc_tariffname`, `soc_servicegroupname`, `soc_billinghead`, `soc_servicename`, `soc_servicecode`, `soc_charge`, `soc_hospitalper`, `soc_hospitalcharge`, `soc_doctorper`, `soc_doctorcharge`, `soc_instructions`, `soc_applicationfor`, `soc_createdby`, `soc_createdtime`, `soc_modifiedby`, `soc_modifiedtime`, `soc_status`) values('".$val1."','".$val14."','".$val2."','".$val3."','".$val4."','".$val5."','".$val6."','".$val7."','".$val8."','".$val9."','".$val10."','".$val11."','".$val12."','".$val13."','".$_SESSION['username']."','".date("d-m-Y h:m:sa",$t)."',NULL,NULL,true)";
if ($conn->query($str) == TRUE) {
    echo "<center><h1>New record created successfully</h1></center>";
	if($val13=="IPV")
	{
	$str2="select * from wardgrop_master";
				$result2=$conn->query($str2);
				$i=0;
				while($row2 = $result2->fetch_assoc()) {
				$str1="UPDATE soc_masters SET ".$row2['WARDGRP_NAME']."='".$_POST[$i]."' where soc_code='".$val14."'";
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
}
?>