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
	<script type="text/javascript" src="jquery-1.4.1.min.js"></script>
<script type="text/javascript">
	$(document).ready(function()
{
	
	$(".stat2").click(function()
	{
		if($(".stat2").is(':checked'))
		$("#registration").prop("readonly", false);
	else
		$("#registration").prop("readonly", true);
	});
	
	$(".stat3").click(function()
	{
		if($(".stat3").is(':checked'))
		$("#consultation").prop("readonly", false);
	else
		$("#consultation").prop("readonly", true);
	});
	$(".stat4").click(function()
	{
		if($(".stat4").is(':checked'))
		$("#opbilling").prop("readonly", false);
	else
		$("#opbilling").prop("readonly", true);
	});
	$(".stat5").click(function()
	{
		if($(".stat5").is(':checked'))
		{
			$('#ip').removeAttr('disabled');
			$('#ffa').removeAttr('disabled');
			//$('.ip').prop('disabled',false);
			//$("#ipb").css("pointer-events","auto");
		}
		else
		{
		$('.ip').prop('disabled',true);	
		$('#ffa').prop('disabled',true);	
		//$("#ipb").css("pointer-events","none");
		}
	});
	$(".stat6").click(function()
	{
		if($(".stat6").is(':checked'))
		$("#serchar").prop("readonly", false);
	else
		$("#serchar").prop("readonly", true);
	});
	$(".stat7").click(function()
	{
		if($(".stat7").is(':checked'))
		$("#cpc").prop("readonly", false);
	else
		$("#cpc").prop("readonly", true);
	});
	$(".stat8").click(function()
	{
		if($(".stat8").is(':checked'))
		$("#ic").prop("readonly", false);
	else
		$("#ic").prop("readonly", true);
	});
	$(".stat9").click(function()
	{
		if($(".stat9").is(':checked'))
		$("#pc").prop("readonly", false);
	else
		$("#pc").prop("readonly", true);
	});
	$(".stat10").click(function()
	{
		if($(".stat10").is(':checked'))
		$("#wc").prop("readonly", false);
	else
		$("#wc").prop("readonly", true);
	});
	$(".stat11").click(function()
	{
		if($(".stat11").is(':checked'))
		$("#payc").prop("readonly", false);
	else
		$("#payc").prop("readonly", true);
	});
	$("#ffa").change(function()
	{
		var id=$("#ffa").val();
		$(".serchar").val(id);
	});
		$(document).on('change', '.st1', function(event) {
		var id=$(this).val();
		var dataString = 'id13='+ id;
		var thisElement = $(this);
		$.ajax
		({
			type: "POST",
			url: "health.php",
			data: dataString,
			cache: false,
			success: function(html)
			{
				thisElement.parent().next().children('.sn1').html(html);
			} 
		});
	});
	$(document).on('change', '.sn1', function(event) {
		var id=$(this).val();
				$(this).parent().next().children('.sc1').val(id);
		
	});
});
function deleteRow(id,row) {
    document.getElementById(id).deleteRow(row);
}

function insRow(id) {
    var filas = document.getElementById("myTable").rows.length;
    var x = document.getElementById(id).insertRow(filas);
	var x0 = x.insertCell(0);
    var x1 = x.insertCell(1);
	var x2 = x.insertCell(2);
	var x3 = x.insertCell(3);
	var c=filas
	$("#cou").val(c);
	s="s"+c;
	st="st"+c;
	sn="sn"+c;
	sc="sc"+c;
	x0.innerHTML = '<input type="checkbox" name="chk2" id="chhh" class="chhh">';
	//x1.innerHTML = '<input type="text" name='+s+' id='+s+' class=s1 style="height:23px;width:185px;margin-left:0px;margin-right:0px;border:none;">';
	x1.innerHTML='<select name='+st+' id='+st+' class="st1" style="height:23px;width:185px;margin-left:0px;margin-right:0px;border:none;"><option value="NULL">-Select Service Type-</option><option value="ServiceGroup">Service Group</option><option value="Service">Service</option></select>';	
    x2.innerHTML = '<select name='+sn+' id='+sn+' class=sn1 style="height:23px;width:185px;margin-left:0px;margin-right:0px;border:none;"><option value="ServiceGroup">--Select Option--</option></select>';
    x3.innerHTML ='<input type="text" name='+sc+' id='+sc+' class=sc1 style="height:23px;width:185px;margin-left:0px;margin-right:0px;border:none;">';
	
}
function deleteRow(tableID) {
            try {
            var table = document.getElementById(tableID);
            var rowCount = table.rows.length;
 
            for(var i=0; i<rowCount; i++) {
                var row = table.rows[i];
                var chkbox = row.cells[0].childNodes[0];
                if(null != chkbox && true == chkbox.checked) {
                    if(rowCount <= 1) {
                        alert("Cannot delete all the rows.");
                        break;
                    }
                    table.deleteRow(i);
                    rowCount--;
                    i--;
                }
 
 
            }
			//var table1 = document.getElementById(tableID);
            //var rowCount1 = table1.rows.length;
			//$("#cou").val(rowCount1);
            }catch(e) {
                alert(e);
            }
        }
</script>
</head>

<body>
<?php 
include('menu.php');
include('dbcon.php'); ?>

<form action="#" method="post" class="register">
			<p>
		<div>
<ul class="drop_menu">
               <li>
              <a href="healthcardentry_search.php">
                Search
              </a>
              </li>
                <li><a href="healthcardentrytable.php">View</a></li>
                <li>
                  <button class="button" type="submit">Save</button></li>
				  </ul>
				  </div>
</p>                	
	
	<div class="image">
              <img src="images/4.jpg" width="100%" height="100px"/>
		
				</div>	
 
		<div style="width: 1100px; overflow: hidden;">
	<div style="width: 500px; float: left;">
	 <p class="agreement">
			<input type='checkbox' name='stat' style="margin-left:0px;"><label>Allow to change Healthcard Amount</label>
		</p><br><br>
 <p class="agreement"><label>CardType Cd </label>
 <?php include('dbcon.php');
			$count=1;
			$str="select * from health_cards";
            $result=$conn->query($str);
            while($row = $result->fetch_assoc()) {
             $count=$count+1;
            }
			echo "<input type='text' name='ctypecd' value=HCR".$count." style=';height:23px;width:185px;margin-top:2px;' readonly='readonly'>";
			?>
			</p><p class="agreement">
 <label>HC Auto Prefix</label><input type="text" name="hcautopre" style=';height:23px;width:185px;margin-top:2px;'/> </p>
  <p class="agreement"><label>CardType Name</label><input type="text" name="ctypename" style=';height:23px;width:185px;margin-top:2px;'> </p>
  <p class="agreement"><label>Max Members</label><input type="text" name="maxmem" style=';height:23px;width:185px;margin-top:2px;'/></p> 
  <p class="agreement"><label>Valid Years</label><input type="text" name="validyears" style=';height:23px;width:185px;margin-top:2px;'/> </p>
  <p class="agreement"><label>Valid Days</label><input type="text" name="validdays" style=';height:23px;width:185px;margin-top:2px;'/> </p>
  <p class="agreement"><label>Card Amount</label><input type="text" name="camount" style='height:23px;width:185px;margin-top:2px;'/> </p>
  
			<p>
			<input type='checkbox' name='stat1' value='0' unchecked><label style="width:200px;">Include All Members</label></p>
			<p >
				<fieldset style="width: 450px;border:1px groove #000000;">
              <legend> Applicable For </legend>	
			  <p class="agreement">
			<input type='checkbox' name='stat2' class="stat2" value='0' unchecked><label>Registrations</label><input type="text" id="registration" name="registration" style='height:23px;width:185px;margin-top:2px;margin-left:-33px;' readonly>% </p>
		<p class="agreement" >
			<input type='checkbox' name='stat3' class="stat3" value='0' unchecked><label>Consultations</label><input type="text" id="consultation" name="consultation" style='height:23px;width:185px;margin-top:2px;margin-left:-33px;' readonly> %</p>
			<p class="agreement">
			<input type='checkbox' name='stat4' class="stat4" value='0' unchecked><label>OP Billing</label><input type="text" id="opbilling" name="opbilling" style='height:23px;width:185px;margin-top:2px;margin-left:-33px;' readonly> %</p>
			
			</div>
			<div style="margin-left:520px;margin-top:0px;position:absolute; width:600px;">
			<div class="ipb" id="ipb" disabled="disabled" style="disabled:true;margin-left:0px;">
			<br><br><br><br><p class="agreement">
			<input type='checkbox' name='stat5' class="stat5" value='0' unchecked><label>IP Billing</label></fieldset></p><br><br><p><label>Flat For All</label><input type="text" id="ffa" name="ffa" class="ffa"  style='height:23px;width:185px;margin-top:2px;'disabled/></p>
<p>			
			<fieldset class="ip" id="ip" disabled="true" style="width:500px;border:1px groove #000000;">
              <legend> AppOnService </legend>	
			  <p class="agreement">
			<input type='checkbox' name='stat6' class="stat6" value='1' checked><label>Service Charges</label><input type="text"  class="serchar" id="serchar" name="serchar" style='height:23px;width:185px;' readonly>% </p>
			<p class="agreement">
			<input type='checkbox' name='stat7' class="stat7" value='1' checked><label>Consultation And Professional Charges</label><input type="text" class="serchar" id="cpc" name="cpc" style='height:23px;width:185px;' readonly>%</p>
			<p class="agreement">
			<input type='checkbox' name='stat8' class="stat8" value='1' checked><label>Investigation Charges</label><input type="text" class="serchar" id="ic" name="ic" style='height:23px;width:185px;' readonly>% </p>
			<p class="agreement">
			<input type='checkbox' name='stat9' class="stat9" value='1' checked><label>Procedure Charges</label><input type="text" class="serchar" id="pc" name="pc" style='height:23px;width:185px;' readonly>%</p>
			<p class="agreement">
			<input type='checkbox' name='stat10' class="stat10" value='1' checked><label>Ward Charges</label><input type="text" class="serchar" id="wc" name="wc" style='height:23px;width:185px;' readonly>% </p>
			<p class="agreement">
			<input type='checkbox' name='stat11' class="stat11" value='1' checked><label>Pharmacy Charges</label><input type="text" class="serchar" id="payc" name="payc" style='height:23px;width:185px;' readonly>%</fieldset> </p>
			</div>
			</div>
			</div>
			<br><br>
			<legend> Exclude Services Details</legend>
			<div style="width: 100%; overflow: hidden;">
	<div style="width: 750px; float: left;">
				
		<table style="width=auto" id="myTable" cellspacing="0" border="1">
		  <tr>
		  <td></td>
    <!--<td>S.No</td>-->
    <td>Service Type</td>
	<td>Service Code</td>
	<td>Service Name</td>
  </tr> 
  <tr><td><input type="checkbox" name="chk2" id="chhh" class="chhh"></td>
  <!--<td><input type="text" name="s1" id="s1" class="s1" style="height:25px;width:185px;margin-left:0px;margin-right:0px;border:none;"></td>-->
  <td><select name="st1" id="st1" class="st1" style="height:25px;width:185px;margin-left:0px;margin-right:0px;border:none;"><option value="NULL">-Select Service Type-</option><option value="ServiceGroup">Service Group</option><option value="Service">Service</option></select></td>
  <td><select name="sn1" id="sn1" class="sn1" style="height:25px;width:185px;margin-left:0px;margin-right:0px;border:none;"><option value="NULL">--Select Option--</option></select></td>
  <td><input type="text" name="sc1" id="sc1" class="sc1" style="height:25px;width:185px;margin-left:0px;margin-right:0px;border:none;"></td></tr>
 
		</table>
		</div>
		<div style="margin-left:770px;margin-top:0px;position:absolute;">
		<input type="button" onclick="insRow('myTable')" value="Insert row" style="border:1px solid black;"><br><br>
	    <INPUT type="button" value="Delete Row" onclick="deleteRow('myTable')" style="border:1px solid black;"/>
		</div>
		</div>
		<input type="hidden" name="cou" id="cou" value="1">
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
$val1=$_POST['ctypecd'];
$val2=$_POST['hcautopre'];
$val3=$_POST['ctypename'];
$val4=$_POST['maxmem'];
$val5=$_POST['validyears'];
$val19=$_POST['validdays'];
$val6=$_POST['camount'];
if(isset($_POST['stat1']))
{
	$val7=true;

}
else
{
	$val7=false;
}
if(isset($_POST['stat2']))
{
	
	$val8=$_POST['registration'];
}
else
{
	$val8=false;
}
if(isset($_POST['stat3']))
{

		$val9=$_POST['consultation'];
}
else
{
	$val9=false;
}
if(isset($_POST['stat4']))
{
	
		$val10=$_POST['opbilling'];
}
else
{
	$val10=false;
}
/*if(isset($_POST['stat5']))
{
	$val11=true;
}
else
{
	$val11=false;
}*/
if(isset($_POST['stat6']))
{
	
		$val12=$_POST['serchar'];
}
else
{
	$val12=false;
}
if(isset($_POST['stat7']))
{
	
		$val13=$_POST['cpc'];
}
else
{
	$val13=false;
}
if(isset($_POST['stat8']))
{
	
		$val14=$_POST['ic'];
}
else
{
	$val14=false;
}
if(isset($_POST['stat9']))
{
	
		$val15=$_POST['pc'];
}
else
{
	$val15=false;
}
if(isset($_POST['stat10']))
{
	
		$val16=$_POST['wc'];
}
else
{
	$val16=false;
}
if(isset($_POST['stat11']))
{
	
		$val17=$_POST['payc'];
}
else
{
	$val17=false;
}
if(isset($_POST['stat']))
{
	$val18=true;

}
else
{
	$val18=false;
}
/*$val18=$_POST['ffa'];*/
$val32=$_POST['cou'];
$t=time();
$count=1;
				$str="select * from health_cards";
				$result=$conn->query($str);
				while($row = $result->fetch_assoc()) {
				$count=$count+1;
				}
$str="insert into health_cards values('".$count."','".$val1."','".$val2."','".$val3."','".$val4."','".$val5."','".$val19."','".$val6."','".$val7."','".$val8."','".$val9."','".$val10."','".$val12."','".$val13."','".$val14."','".$val15."','".$val16."','".$val17."','".$val18."','".$_SESSION['username']."','".date("Y-m-d h:m:s",$t)."',NULL,NULL,true)";
if ($conn->query($str) == TRUE) {
	for($i=1;$i<=$val32;$i++)
	{
		$s="st".$i;
		$p="sn".$i;
		$d="sc".$i;
		if(isset($_POST[$d]))
		{
			$str="insert into health_card_services values('".$val1."','".$_POST[$s]."','".$_POST[$p]."')";
			$conn->query($str);
		}
	}
    echo "<script>";
	echo "window.alert('Sucessfully Entered New Record');";
	echo "window.location.href='healthcardentry.php';";
	echo "</script>";

}
else
{
	echo "Error: " . $sql . "<br>" . $conn->error;
}
}
?>