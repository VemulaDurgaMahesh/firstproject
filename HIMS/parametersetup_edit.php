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
	$(".mg").change(function() {
		var id=$(this).val();
          $("#mg1").val(id);
	});
$('#noneAboveCheck').change(function () {                
      $('#noneAbove').toggle(this.checked);
    }).change();

    if ($('#incarcerated, #support').attr("checked")) {
     
      $('#noneAboveCheck').attr('disabled', true);
    } else {
      $('#noneAboveCheck').attr('disabled', false);
    }

});
</script>
</head>
<body>
<?php include('menu.php');
include('dbcon.php'); ?>
<form action="parametersetup_view.php" method="post" class="register">
<p>
	<ul class="drop_menu">
               <li>
              <a href="parametersetup_search.php">
                Search
              </a>
              </li>
                <li><a href="parametersetup_view.php">View</a></li>
                <li>
                  <button class="button" type="submit">Save</button></li>
				  </ul>
				  </div>
</p>
			<p class="agreement">
			<label>Lab Group </label>
			<select id="bh" name="bh" class="mg" required>
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
$str="select * from servicegroup_master where servicegroup_code='".$_GET['t2']."'";
$result=$conn->query($str);
$row = $result->fetch_assoc();
//echo "<select name='cnames'>";
echo "<option value='".$_GET['t2']."'>".$row['servicegroup_name']."</option>";
   $str="select * from servicegroup_master";
$result=$conn->query($str);
//echo "<select name='cnames'>";

    while($row = $result->fetch_assoc()) {
	echo "<option value='".$row['servicegroup_code']."'>".$row['servicegroup_name']."</option>";
}
?>
			</select>
			<input type="text" name="mg1" id="mg1" value="<?php echo $_GET['t2']; ?>" style="width:300px;" readonly='readonly'/> 
			<p class="agreement">
			<label>Parameter </label>
			<input type='text' name='lpcode' value="<?php echo $_GET['t3']; ?>" readonly>
			<input type='text' id='parameter' name='parameter' class="long" value="<?php echo $_GET['t4']; ?>"></p>
			<p class="agreement">
			<label>Method </label>
			<input type='text' id='method' name='method' class="long" value="<?php echo $_GET['t5']; ?>">
			<label>ShortName </label>
			<input type='text' id='shortname' name='shortname' class="long" value="<?php echo $_GET['t6']; ?>">
			</p>
			<br>
			<br>
			<p class="agreement">
			<?php if($_GET['t11']=='1')
			{
			echo "<input type='checkbox' name='inc' value='1' checked><label>Include in Anti-Biotics</label>";
			}
			else
			{
				echo "<input type='checkbox' name='inc' value='0'><label>Include in Anti-Biotics</label>";
			}
			?>
			<?php if($_GET['t12']=='1')
			{
			echo "<input type='checkbox' name='units' value='1' checked><label>Units only</label>";
			}
			else
			{
				echo "<input type='checkbox' name='units' value='0'><label>Units only</label>";
			}
			?>
			
			</p>
			<br>
			<br>
			<fieldset class="row">
		     <legend>TextSize</legend>
			<p>
			<?php if($_GET['t7']=='S')
			{
			echo "<input type='radio' name='ts' value='S' checked> <label>Small</label> </input>";
			echo "<input type='radio' name='ts' value='B'> <label>Big</label></input>";
			}
			else
			{ 
		        echo "<input type='radio' name='ts' value='S'> <label>Small</label> </input>";
				echo "<input type='radio' name='ts' value='B' checked> <label>Big</label></input>";
			}
			?>
			</p>
			</fieldset>
			<br>
			<br>
			<br>
			<br>
			<fieldset class="row">
		     <legend>ParamDisplay</legend>
			<p>
			<?php if($_GET['t8']=='S')
			{
			echo "<input type='radio' name='pd' value='S' checked> <label>Side</label> </input>";
			echo "<input type='radio' name='pd' value='B'> <label>Beneath/label></input>";
			}
			else
			{ 
		        echo "<input type='radio' name='pd' value='S'> <label>Side</label> </input>";
				echo "<input type='radio' name='pd' value='B' checked> <label>Beneath</label></input>";
			}
			?>			
			</p>
			</fieldset>
			<br>
			<br>
			<p class="agreement">
			<?php if($_GET['t9']=='1')
			{
			echo "<input type='checkbox' name='accr' value='1' checked><label>Accredation Needed</label>";
			}
			else
			{
				echo "<input type='checkbox' name='accr' value='0' checked><label>Accredation Needed</label>";
			}
			?>
			<?php if($_GET['t10']=='1')
			{
			echo "<input type='checkbox' name='neworg' value='1' checked><label>New Organism Interface</label>";
			}
			else
			{
				echo "<input type='checkbox' name='neworg' value='0'><label>New Organism Interface</label>";
			}
			?>
			</p>
			<br>
			<br>
			<?php if($_GET['t13']=='1')
			{
			echo "<input type='checkbox' name='desc' value='1' checked><label>Description Only</label>";
			}
			else
			{
				echo "<input type='checkbox' name='desc' value='0'><label>Description Only</label>";
			}
			?>
			
			<p><?php if($_GET['t14']=='1')
			{
			echo "<input id='noneAboveCheck' type='checkbox' name='norm' value='1' checked/><label>Normal Ranges</label>";
			}
			else
			{
				echo "<input id='noneAboveCheck' type='checkbox' name='norm' value='0'/><label>Normal Ranges</label>";
			}
			?></p>
	       <div id="noneAbove" class="hidden">
		   <p><?php if($_GET['t15']=='1')
			{
			echo "<input id='incarcerated' type='checkbox' name='critical' value='1' checked/> <label> Critical Ranges</label>";
			}
			else
			{
				echo "<input id='incarcerated' type='checkbox' name='critical' value='0'/> <label> Critical Ranges</label>";
			}
			?></p>
          <p><?php if($_GET['t16']=='1')
			{
			echo "<input id='support' type='checkbox' name='default' value='1' checked/><label> Default Ranges</label>";
			}
			else
			{
				echo "<input id='support' type='checkbox' name='default' value='0'/><label> Default Ranges</label>";
			}
			?></p>
          </div>
		  <p>
		  <table>
		   <tr> <td><label>gender</label> </td><td> MinAge </td><td>UOM</td><td> MaxAge </td><td>UOM</td><td>Description</td><td>Symbol</td><td>MinRange</td><td>MaxRange</td><td>Units Normal Range</td><td>Min Critical</td><td>Max Critical</td><td>MinDefault</td><td>MaxDefault</td></tr>
		   <tr><td><select name="gender" style="margin-left:0px; margin-right:0px;"> <option> Male </option> <option> Female </option></select></td><td> <input type="text" name="minage" style="margin-left:0px; margin-right:0px;" value="<?php echo $_GET['t17']; ?>"></td><td> <input type="text" name="UOM1" style="margin-left:0px; margin-right:0px;" value="<?php echo $_GET['t18']; ?>"></td><td> <input type="text" name="maxage"  style="margin-left:0px; margin-right:0px;" value="<?php echo $_GET['t19']; ?>"></td><td> <input type="text" name="UOM2" style="margin-left:0px; margin-right:0px;" value="<?php echo $_GET['t20']; ?>"></td><td> <input type="text" name="desc" style="margin-left:0px; margin-right:0px;" value="<?php echo $_GET['t21']; ?>"></td><td><select name="symb" style="margin-left:0px; margin-right:0px;"><option><</option><option><=</option><option>=</option><option>></option><option>>=</option><option><></option></select></td><td> <input type="text" name="minrange" style="margin-left:0px; margin-right:0px;" value="<?php echo $_GET['t23']; ?>"></td><td> <input type="text" name="maxrange" style="margin-left:0px; margin-right:0px;" value="<?php echo $_GET['t24']; ?>"></td><td> <input type="text" name="unitsnormalrange" style="margin-left:0px; margin-right:0px;" value="<?php echo $_GET['t25']; ?>"></td><td> <input type="text" name="mincritical" style="margin-left:0px; margin-right:0px;" value="<?php echo $_GET['t26']; ?>"></td><td> <input type="text" name="maxcritical" style="margin-left:0px; margin-right:0px;" value="<?php echo $_GET['t27']; ?>"></td><td> <input type="text" name="mindefault" style="margin-left:0px; margin-right:0px;" value="<?php echo $_GET['t28']; ?>"></td><td> <input type="text" name="maxdefault" style="margin-left:0px; margin-right:0px;" value="<?php echo $_GET['t29']; ?>"></td></tr>
		   </table>
		   <p>
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
$val1=$_POST['bh'];
$val2=$_POST['mg1'];
$val3=$_POST['lpcode'];
$val4=$_POST['parameter'];
$val5=$_POST['method'];
$val6=$_POST['shortname'];
$val7=$_POST['ts'];
$val8=$_POST['pd'];
$val17=$_POST['gender'];
$val18=$_POST['minage'];
$val19=$_POST['UOM1'];
$val20=$_POST['maxage'];
$val21=$_POST['UOM2'];
$val22=$_POST['desc'];
$val23=$_POST['symb'];
$val24=$_POST['minrange'];
$val25=$_POST['maxrange'];
$val26=$_POST['unitsnormalrange'];
$val27=$_POST['mincritical'];
$val28=$_POST['maxcritical'];
$val29=$_POST['mindefault'];
$val30=$_POST['maxdefault'];
if (isset($_POST['inc'])) {
    $val11=true;
}
else
{
	$val11=false;
}
if (isset($_POST['units'])) {
    $val12=true;
}
else
{
	$val12=false;
}
if (isset($_POST['desc'])) {
    $val13=true;
}
else
{
	$val13=false;
}
if (isset($_POST['norm'])) {
    $val14=true;
}
else
{
	$val14=false;
}

if (isset($_POST['critical'])) 
{
    $val15=true;
}
else
{
	$val15=false;
}
if (isset($_POST['default'])) 
{
    $val16=true;
}
else
{
	$val16=false;
}
if (isset($_POST['accr'])) 
{
    $val9=true;
}
else
{
	$val9=false;
}
if (isset($_POST['neworg'])) 
{
    $val10=true;
}
else
{
	$val10=false;
}

$t=time();


$str="UPDATE  parameter_master SET p_labgroupname='".$val1."',p_labgroupcode='".$val2."',p_pcode='".$val3."',p_pname='".$val4."',p_method='".$val5."',p_shortname='".$val6."',p_textsize='".$val7."',p_pdisplay='".$val8."',p_acrneed='".$val9."',p_neworgint='".$val10."',p_antibiotics='".$val11."',p_unitsonly='".$val12."',p_descriponly='".$val13."',p_normalranges='".$val14."',p_criticalranges='".$val15."',p_defaultranges='".$val16."',p_gender='".$val17."',p_minage='".$val18."',p_uom1='".$val19."',p_maxage='".$val20."',p_uom2='".$val21."',p_desc='".$val22."',p_symb='".$val23."',p_minrange='".$val24."',p_maxrange='".$val25."',p_unitsnormalrange='".$val26."',p_mincritical='".$val27."',p_maxcritical='".$val28."',p_mindefault='".$val29."',p_maxdefault='".$val30."',createdby='prasanna',createdate='".date("d-m-Y h:m:sa",$t)."',modifyby='".$_SESSION['userid']."',modifydate='".date("d-m-Y h:m:sa",$t)."' where p_pcode='".$val3."'";
if ($conn->query($str) == TRUE) {
    echo "<center><h1>Updated successfully</h1></center>";
}
else
{
	echo "Error: " . $sql . "<br>" . $conn->error;
}
}
?>