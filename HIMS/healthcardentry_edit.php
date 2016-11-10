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
	x0.innerHTML = '<input type="checkbox" name="chk2">';
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
<?php include('menu.php');
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
	<?php
	if($_GET['t19']==true)
	{
		echo "<input type='checkbox' name='stat' style='margin-left:0px;' checked><label>Allow to change Healthcard Amount</label>";
	}
	else
	{
		echo "<input type='checkbox' name='stat' style='margin-left:0px;' unchecked><label>Allow to change Healthcard Amount</label>";
	}
	?>
			
		</p><br><br> 
		
 <p class="agreement"><label>CardType Cd </label>
 
 <?php include('dbcon.php');
			$count=1;
			$str="select * from health_cards";
            $result=$conn->query($str);
            while($row = $result->fetch_assoc()) {
             $count=$count+1;
            }
			echo "<input type='text' name='ctypecd' value=".$_GET['t2']." style='height:23px;width:185px;margin-top:2px;' readonly='readonly'>";
			?>
 <label>HC Auto Prefix</label><input type="text" name="hcautopre" value="<?php echo $_GET['t9'];?>" style='height:23px;width:185px;margin-top:2px;'/> </p>
  <p class="agreement"><label>CardType Name</label><input type="text" name="ctypename" class="long" value="<?php echo $_GET['t3'];?>" style='height:23px;width:185px;margin-top:2px;'> </p>
  <p class="agreement"><label>Max Members</label><input type="text" name="maxmem" value="<?php echo $_GET['t4'];?>" style='height:23px;width:185px;margin-top:2px;'/></p> 
  <p class="agreement"><label>Valid Years</label><input type="text" name="validyears" value="<?php echo $_GET['t6'];?>" style='height:23px;width:185px;margin-top:2px;'/> </p>
  <p class="agreement"><label>Valid Days</label><input type="text" name="validdays" value="<?php echo $_GET['t7'];?>" style='height:23px;width:185px;margin-top:2px;'/> </p>
  <p class="agreement"><label>Card Amount</label><input type="text" name="camount" value="<?php echo $_GET['t8'];?>" style='height:23px;width:185px;margin-top:2px;'/> </p>
  
			<p>
			<?php if($_GET['t5']=='1')
			{
			echo "<input type='checkbox' name='stat1' value='1'  checked><label style='width:200px;'>Include All Members</label>";
			}
			else
			{
				echo "<input type='checkbox' name='stat1' value='0' ><label style='width:200px;'>Include All Members</label>";
			}
			?>
			
			<p>
				<fieldset>
              <legend> Applicable For </legend>	
			  <p>
			  <?php if($_GET['t10']!='0')
			{
			echo "<input type='checkbox' name='stat2' value='1' checked><label>Registrations</label>";
			echo "<input type='text' id='registration' name='registration' value=".$_GET['t10']." style='height:23px;width:185px;margin-top:2px;' ><label>%</label> </p>";
			}
			else
			{
				echo "<input type='checkbox' name='stat2' value='0'><label>Registrations</label>";
				echo "<input type='text' id='registration' name='registration' style='height:23px;width:185px;margin-top:2px;' ><label>%</label> </p>";
			}
			?>
		
			<p >
			<?php if($_GET['t11']!='0')
			{
			echo "<input type='checkbox' name='stat3' class='stat3' value='1' checked><label>Consultations</label>";
			echo "<input type='text' id='consultation' name='consultation' value=".$_GET['t11']." style='height:23px;width:185px;margin-top:2px;' ><label>%</label> </p>";
			}
			else
			{
				echo "<input type='checkbox' name='stat3' class='stat3' value='0' unchecked><label>Consultations</label>";
				echo "<input type='text' id='consultation' name='consultation' value=' '  style='height:23px;width:185px;margin-top:2px;'><label>%</label> </p>";
			}
			?>
			
			<p>
			<?php if($_GET['t12']!='0')
			{
			echo "<input type='checkbox' name='stat4' class='stat4' value='1' checked><label>OP Billing</label>";
			echo "<input type='text' id='consultation' name='consultation' value=".$_GET['t12']." style='height:23px;width:185px;margin-top:2px;' ><label>%</label> </p>";
			}
			else
			{
				echo "<input type='checkbox' name='stat4' class='stat4' value='0' unchecked><label>OP Billing</label>";
				echo "<input type='text' id='consultation' name='consultation' value=' ' style='height:23px;width:185px;margin-top:2px;' ><label>%</label> </p>";
			}
			?>
			<p>
			</div>
			<div style="margin-left:520px;margin-top:0px;position:absolute; width:600px;">
			<?php if($_GET['t13']!='0' || $_GET['t14']!='0' || $_GET['t15']!='0' || $_GET['t16']!='0'||$_GET['t17']!='0'||$_GET['t18']!='0')
			{
			echo "<input type='checkbox' name='stat5' class='stat5' value='1' checked><label>IP Billing</label></fieldset></p>";
			echo "<div class='ipb' id='ipb'>";
			echo "<p><label>Flat For All</label><input type='text' id='ffa' name='ffa' style='height:23px;width:185px;margin-top:2px;' class='ffa'/></p>";
			}
			else
			{
				echo "<input type='checkbox' name='stat5' class='stat5' value='0' unchecked><label>IP Billing</label></fieldset></p>";
				echo "<div class='ipb' id='ipb' disabled='disabled' style='disabled:true;'>";
				echo "<p><label>Flat For All</label><input type='text' id='ffa' name='ffa' class='ffa' style='height:23px;width:185px;margin-top:2px;' disabled/></p>";
			}
			?></p><p>
			<fieldset class="ip" id="ip" >
              <legend> AppOnService </legend>	
			  <p class="agreement">
			<input type='checkbox' name='stat6' class="stat6" value='1' checked><label>Service Charges</label>
			<input type="text"  class="serchar" id="serchar" name="serchar" value="<?php echo $_GET['t13'];?>" style='height:23px;width:185px;margin-top:2px;'>% </p>
			<p class="agreement">
			<input type='checkbox' name='stat7' class="stat7" value='1' checked><label>Consultation And Professional Charges</label>
			<input type="text" class="serchar" id="cpc" name="cpc" value="<?php echo $_GET['t14'];?>" style='height:23px;width:185px;margin-top:2px;'>%</p>
			<p class="agreement">
			<input type='checkbox' name='stat8' class="stat8" value='1' checked><label>Investigation Charges</label>
			<input type="text" class="serchar" id="ic" name="ic" value="<?php echo $_GET['t15'];?>" style='height:23px;width:185px;margin-top:2px;'>% </p>
			<p class="agreement">
			<input type='checkbox' name='stat9' class="stat9" value='1' checked><label>Procedure Charges</label>
			<input type="text" class="serchar" id="pc" name="pc" value="<?php echo $_GET['t16'];?>" style='height:23px;width:185px;margin-top:2px;'>%</p>
			<p class="agreement">
			<input type='checkbox' name='stat10' class="stat10" value='1' checked><label>Ward Charges</label>
			<input type="text" class="serchar" id="wc" name="wc" value="<?php echo $_GET['t17'];?>" style='height:23px;width:185px;margin-top:2px;'>% </p>
			<p class="agreement">
			<input type='checkbox' name='stat11' class="stat11" value='1' checked><label>Pharmacy Charges</label>
			<input type="text" class="serchar" id="payc" name="payc" value="<?php echo $_GET['t18'];?>" style='height:23px;width:185px;margin-top:2px;'>%</fieldset> </p>
			</div>
			</div>
			</div>
			<br><br>
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
  <tr>
  
  
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
$str="select * from health_card_services where ctcode='".$_GET['t2']."'";
$result=$conn->query($str);
//echo "<select name='cnames'>";
$i=1;
    while($row = $result->fetch_assoc()) {
		$s="st".$i;
		$p="sn".$i;
		$d="sc".$i;
	echo "<td><input type='checkbox' name='chk2'></td><td>";
	echo "<select name='".$s."' id='".$s."' class='st1' style='height:25px;width:185px;margin-left:0px;margin-right:0px;border:none;'><option value=".$row['service_type'].">".$row['service_type']."</option></select></td>";
	if($row['service_type']=="ServiceGroup")
	{
		$str2="select * from servicegroup_master where servicegroup_code='".$row['service_name']."'";
	$result2=$conn->query($str2);
	
	$row2 = $result2->fetch_assoc();
	echo "<td><select name='".$p."' id='".$p."' class='sn1' style='height:25px;width:185px;margin-left:0px;margin-right:0px;border:none;'><option value=".$row['service_name'].">".$row2['servicegroup_name']."</option></select></td>";
	
	echo "<td><input type='text' name='".$d."' id='".$d."' class='sc1' value=".$row['service_name']." style='height:25px;width:185px;margin-left:0px;margin-right:0px;border:none;'></td></tr>";
	}
	if($row['service_type']=="Service")
	{
	$str1="select * from soc_masters where soc_servicecode='".$row['service_name']."'";
	$result1=$conn->query($str1);
	$row1 = $result1->fetch_assoc();
	echo "<td><select name='".$p."' id='".$p."' class='sn1' style='height:25px;width:185px;margin-left:0px;margin-right:0px;border:none;'><option value=".$row['service_name'].">".$row1['soc_servicename']."</option></select></td>";
	echo "<td><input type='text' name='".$d."' id='".$d."' class='sc1' value=".$row['service_name']." style='height:25px;width:185px;margin-left:0px;margin-right:0px;border:none;'></td></tr>";
	}
	 $i=$i+1;
	}
?>
 
		</table>
		</div>
		<div style="margin-left:770px;margin-top:0px;position:absolute;">
		<input type="button" onclick="insRow('myTable')" value="Insert row" style="border:1px solid black;"><br><br>
	    <INPUT type="button" value="Delete Row" onclick="deleteRow('myTable')" style="border:1px solid black;"/><br><br>
		<?php if($_GET['t26']=='1')
			{
			echo "<label>Active</label> <input type='checkbox' name='stat45' value='1' checked>";
			}
			else
			{
				echo "<label>Active</label> <input type='checkbox' name='stat45' value='0'>";
			}
			?>
		</div>
		</div>
		<?php
		$count=0;
		$str="select * from health_card_services where ctcode='".$_GET['t2']."'";
		$result=$conn->query($str);
		while($row=$result->fetch_assoc()){
			$count=$count+1;
		}
		echo "<input type='hidden' name='cou' id='cou' value=".$count.">";
		?>
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
	$val7="true";

}
else
{
	$val7="false";
}
if(isset($_POST['stat2']))
{
	
	$val8=$_POST['registration'];
}
else
{
	$val8="false";
}
if(isset($_POST['stat3']))
{
	$val9=$_POST['consultation'];
}
else
{
	$val9="false";
}
if(isset($_POST['stat4']))
{
	
		$val10=$_POST['opbilling'];
}
else
{
	$val10="false";
}
/*if(isset($_POST['stat5']))
{
	$val11="true";
}
else
{
	$val11="false";
}*/
if(isset($_POST['stat6']))
{
	
		$val12=$_POST['serchar'];
}
else
{
	$val12="false";
}
if(isset($_POST['stat7']))
{
	
		$val13=$_POST['cpc'];
}
else
{
	$val13="false";
}
if(isset($_POST['stat8']))
{
	
		$val14=$_POST['ic'];
}
else
{
	$val14="false";
}
if(isset($_POST['stat9']))
{
	
		$val15=$_POST['pc'];
}
else
{
	$val15="false";
}
if(isset($_POST['stat10']))
{
	
		$val16=$_POST['wc'];
}
else
{
	$val16="false";
}
if(isset($_POST['stat11']))
{
	
		$val17=$_POST['payc'];
}
else
{
	$val17="false";
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
$str="select * from health_cards where card_code='".$val1."'";
$result=$conn->query($str);
$row=$result->fetch_assoc();
$val40=$row['ID'];
$val41=$row['createdby'];
$val42=$row['createddate'];
$val32=$_POST['cou'];
$str="delete from health_cards where card_code='".$val1."'";
$conn->query($str);
$str="insert into health_cards values('".$val40."','".$val1."','".$val2."','".$val3."','".$val4."','".$val5."','".$val19."','".$val6."','".$val7."','".$val8."','".$val9."','".$val10."','".$val12."','".$val13."','".$val14."','".$val15."','".$val16."','".$val17."','".$val18."','".$val41."','".$val42."','".$_SESSION['username']."','".date("Y-m-d h:m:s",$t)."','".$val22."')";
if ($conn->query($str) == TRUE) {
	$str3="delete from health_card_services where ctcode='".$val1."'";
	$conn->query($str3);
	echo $val32;
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
	echo "window.alert('Sucessfully Updated Sucessfully');";
	echo "window.location.href='healthcardentrytable.php';";
	echo "</script>";

}
else
{
	echo "Error: " . $sql . "<br>" . $conn->error;
}
}
?>