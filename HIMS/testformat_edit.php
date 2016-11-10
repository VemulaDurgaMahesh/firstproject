<head>
<script type="text/javascript" src="jquery-1.4.1.min.js"></script>
<script type="text/javascript">
$(document).ready(function()
{
	$(".mg").change(function() {
		var id=$(this).val();
          $("#mg1").val(id);
		  var dataString = 'id11='+id;
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
        })
		$(".tn").change(function() {
		var id=$(this).val();
          $("#tn1").val(id);
		  var dataString = 'id11='+id;
        })
		$(".cl").click(function(){
			var id1=$("#mg1").val();
		 // var id1=$("#mgr option:selected").val();
		var dataString = 'id12='+id1;
		  $.ajax
		({
			type: "POST",
			url: "get_data.php",
			data: dataString,
			cache: false,
			success: function(html)
			{
				$(".pr").html(html);
			} 
		});
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
	var c=filas;
	$("#cou").val(c);
	s="s"+c;
	p="p"+c;
	d="d"+c;
	x0.innerHTML = '<input type="checkbox" name="chk2">';
	x1.innerHTML='<input type="text" name='+s+' id='+s+' style="margin-left:0;margin-right:0;">';	
    x2.innerHTML = '<select name='+p+' id='+p+' class="pr" style="margin-left:0;margin-right:0;"><option>--Select Parameter---</option></select>';
    x3.innerHTML ='<input type="text" name='+d+' id='+d+' class="sc" style="margin-left:0;margin-right:0;">';
	
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
              <a href="testformat_search.php">
                Search
              </a>
              </li>
                <li><a href="testformat_view.php">View</a></li>
                <li>
                  <button class="button" type="submit">Save</button></li>
				  </ul>
				  </div>
</p>
				<br>
				<br>
			<div style="width:1100px; margin-left:0 auto;">
			<p>
			<label >Main Group:</label><select id="mgr" name="mgr" class="mg" required>
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
			<!-- <input type="radio" name="all" value="all"/><label>All</label> -->
		     
			<!-- <input type="checkbox" name="bold" value="bold"><label style="width:50px;">Bold</label> -->
			</p>
			<p>
			
			<label>Test Name:</label><select name="tname" id="tname" class="tn">
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
$str="select * from soc_masters where soc_servicecode='".$_GET['t4']."'";
$result=$conn->query($str);
$row = $result->fetch_assoc();
//echo "<select name='cnames'>";
echo "<option value='".$_GET['t4']."'>".$row['soc_servicename']."</option>";
   $str="select * from soc_masters";
$result=$conn->query($str);
//echo "<select name='cnames'>";

    while($row = $result->fetch_assoc()) {
	echo "<option value='".$row['soc_servicecode']."'>".$row['soc_servicename']."</option>";
}
?>
			</select>
			<input type="text" name="tna" id="tn1" value="<?php echo $_GET['t4']; ?>" style="width:300px;" readonly='readonly'/> 
			<!--<input type="radio" name="all" value="pending"/><label>Pending</label> -->
			<br>
			<p>
			<label>Format:</label>
			<input type="text" name="tfcode" value="<?php echo $_GET['t6']; ?>" readonly="readonly">
			<input type="text" name="fname" value="<?php echo $_GET['t7']; ?>" style="width:300px;"/>
			</p>
			<br>
			<br>	
			</div>	
			<div>
			<p>
			<label>Lab Equi Name:</label>
		     <input type="text" name="lename" style="width:450px;" value="<?php echo $_GET['t8']; ?>"/>
			 </p>
			 <div style="margin-left:550px;">
		<input type="button" onclick="insRow('myTable')" value="Insert row" class="cl" style="border:1px solid black;">
	    <INPUT type="button" value="Delete Row" onclick="deleteRow('myTable')" style="border:1px solid black;"/>
		</p><p></p>
		  <table  id="myTable" style="border: 1px solid black">
		  <thead>
		   <tr>
		   <th> Delete </th>
		  <th> SubTitle </th> 
		  <th> Parameter Description</th>
		  <th> Parameter Code</th>
		  </tr>
		  </thead>
		  <tbody>
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
$str="select * from test_table where format_code='".$_GET['t6']."'";
$result=$conn->query($str);
//echo "<select name='cnames'>";
$i=1;
    while($row = $result->fetch_assoc()) {
		$s="s".$i;
		$p="p".$i;
		$d="d".$i;
	echo "<td><input type='checkbox' name='chk2'></td><td>";
	echo "<input type='text' name='".$s."'  value=".$row['sub_title']." style='margin-left:0;margin-right:0;'/></td><td>";
	echo "<select  name='".$p."' style='margin-left:0;margin-right:0;'>";
	$str1="select * from parameter_master where p_pcode='".$row['parameter_desc']."'";
	$result1=$conn->query($str1);
	$row1 = $result1->fetch_assoc();
	//echo "<select name='cnames'>";
	echo "<option value='".$row['parameter_desc']."'>".$row1['p_pname']."</option>";
	echo "  </select>
		  </td>
		  <td>";
		  

		 
		  echo "<input type='text' name='".$d."' class='sc' id='pr1' value=".$row['normal']." style='margin-left:0;margin-right:0;width:200px;'>
		  </td>
		  </tr>";
		  $i=$i+1;
		  }
		  ?>
	</tbody>
		  </table>  
		   <input type="hidden" name="cou" id="cou" value="<?php echo $i;?>">
		  </div>
			 <p>
			<label>Report Title:</label>
		     <input type="text" name="rtname" style="width:450px;" value="<?php echo $_GET['t9']; ?>"/>
			 </p>
            <p>
			<?php if($_GET['t11']=='Male')
			{
			echo "<input type='radio' name='gen' value='Male' checked><label>Male</label>";
			echo "<input type='radio' name='gen' value='Female'><label>Female</label>";
			}
			else
			{
			echo "<input type='radio' name='gen' value='Male'><label>Male</label>";
			echo "<input type='radio' name='gen' value='Female' checked><label>Female</label>";
			}
			?>
			
			<?php if($_GET['t12']=='1')
			{
			echo "<input type='checkbox' name='gs' value='1' checked><label>Gender Specific</label>";
			}
			else
			{
				echo "<input type='checkbox' name='gs' value='0'><label>Gender Specific</label>";
			}
			?>
		    <?php if($_GET['t13']=='1')
			{
			echo "<input type='checkbox' name='df' value='1' checked><label>Default Format</label>";
			}
			else
			{
				echo "<input type='checkbox' name='df' value='0'><label>Default Format</label>";
			}
			?>
			</p>
			<br>
			<p style="margin-left:246px;">
			<?php if($_GET['t14']=='1')
			{
			echo "<input type='checkbox' name='sn' value='1' checked><label>Sample Needed</label>";
			}
			else
			{
				echo "<input type='checkbox' name='sn' value='0'><label>Sample Needed</label>";
			}
			?>
			<?php if($_GET['t15']=='1')
			{
			echo "<input type='checkbox' name='gr' value='1' checked><label>Growth</label>";
			}
			else
			{
				echo "<input type='checkbox' name='gr' value='0'><label>Growth</label>";
			}
			?>
			</p>
			<p>
			<label >Specimen:</label>
			<input type="text" name="speci" value="<?php echo $_GET['t16']; ?>" style="width:450px;"/> 
			</p>
			<br>
			<br>
			<p>
			<label>Col Cap 1:</label>
			<input type="text" name="cc1" value="<?php echo $_GET['t17']; ?>" style="width:150px;"/>
            <label style="margin-left:20px;">Col Cap 3:</label>
			<input type="text" name="cc3" value="<?php echo $_GET['t19']; ?>" style="width:150px;margin-left:8px;"/> 			
			</p>
			<br>
			<br>
			<p>
			<label>Col Cap 2:</label>
			<input type="text" name="cc2" value="<?php echo $_GET['t18']; ?>" style="width:150px;"/>
            <label style="margin-left:20px;">Col Cap 4:</label>
			<input type="text" name="cc4" value="<?php echo $_GET['t20']; ?>" style="width:150px;margin-left:8px;"/> 			
			</p>
			<br>
			<br>
			<p>
			<label>Min. Time:</label>
			<input type="text" name="mint" value="<?php echo $_GET['t21']; ?>" style="width:70px;"/><label>Minutes</label>
            <label>Max. Time:</label>
			<input type="text" name="maxt" value="<?php echo $_GET['t22']; ?>" style="width:75px;margin-left:6px;"/><label>Minutes</label>			
			</p>
			</div>
			<br>
			<br>
			<p>
			<div>
			<p>
			<?php if($_GET['t23']=='1')
			{
			echo "<input type='checkbox' name='an' value='1' checked><label>AccreditationNeeded</label>";
			}
			else
			{
				echo "<input type='checkbox' name='an' value='0'><label>AccreditationNeeded</label>";
			}
			?>
			</p>
			<p>
			<?php if($_GET['t24']=='1')
			{
			echo "<input type='checkbox' name='ch' value='1' checked><label>ClinicalHistory</label>";
			}
			else
			{
				echo "<input type='checkbox' name='ch' value='0'><label>ClinicalHistory</label>";
			}
			?>
			</p>
			<br>
			<p>
			<?php if($_GET['t25']=='1')
			{
			echo "<input type='checkbox' name='nnr' value='1' checked><label>NoNormalRanges</label>";
			}
			else
			{
				echo "<input type='checkbox' name='nnr' value='0'><label>NoNormalRanges</label>";
			}
			?>
			</p>
			<br>
			<p>
			<?php if($_GET['t26']=='1')
			{
			echo "<input type='checkbox' name='tn' value='1' checked><label>TemplateNeeded</label>";
			}
			else
			{
				echo "<input type='checkbox' name='tn' value='0'><label>TemplateNeeded</label>";
			}
			?>
			</p>
			</div>
			<div style="margin-left:275px;">
			<p>
			<?php if($_GET['t27']=='1')
			{
			echo "<input type='checkbox' name='mon' value='1' checked><label><font color='blue' style='font-weight:bold'>MultipleOrganismsNeeded</font></label>";
			
			}
			else
			{
				echo "<input type='checkbox' name='mon' value='0'><label><font color='blue' style='font-weight:bold'>MultipleOrganismsNeeded</font></label>";
			}
			?>
			
			</p>
		    <br>
			<p>
			<?php if($_GET['t28']=='1')
			{
			echo "<input type='checkbox' name='avr' value='1' checked><label><font color='blue' style='font-weight:bold'>AutoVerificationRequired</font></label>";
			
			}
			else
			{
				echo "<input type='checkbox' name='avr' value='0'><label><font color='blue' style='font-weight:bold'>AutoVerificationRequired</font></label>";
			}
			?>
			</p>
			<br>
			<p>
			<?php if($_GET['t29']=='1')
			{
			echo "<input type='checkbox' name='aar' value='1' checked><label><font color='blue' style='font-weight:bold'>AutoApprovalRequired</font></label>";
			
			}
			else
			{
				echo "<input type='checkbox' name='aar' value='0'><label><font color='blue' style='font-weight:bold'>AutoApprovalRequired</font></label>";
			}
			?>
			</p>
			</div>
			</p>
			 <fieldset class="row">
			 <legend>Result Values Alignment</legend>
			 <?php if($_GET['t30']=='SideOfTheParameter')
			{
			echo "<input type='radio' name='rva' value='SideOfTheParameter' checked><label>SideOfTheParameter</label>";
			echo "<input type='radio' name='rva' value='BeneathTheParameter'><label>BeneathTheParameter</label>";
			}
			else
			{
			echo "<input type='radio' name='rva' value='SideOfTheParameter'><label>SideOfTheParameter</label>";
			echo "<input type='radio' name='rva' value='BeneathTheParameter' checked style='margin-left:20'><label>BeneathTheParameter</label>";
			}
			?>
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
$val1=$_POST['mg1'];
$val2=$_POST['mgr'];
$val3=$_POST['tna'];
$val4=$_POST['tname'];
$val5=$_POST['tfcode'];
$val6=$_POST['fname'];
$val7=$_POST['lename'];
$val8=$_POST['rtname'];
//$val9=$_POST['stname'];
$val10=$_POST['gen'];
if (isset($_POST['gs'])) {
    $val11=true;
}
else
{
	$val11=false;
}
if (isset($_POST['df'])) {
    $val12=true;
}
else
{
	$val12=false;
}
if (isset($_POST['sn'])) {
    $val13=true;
}
else
{
	$val13=false;
}
if (isset($_POST['gr'])) 
{
    $val14=true;
}
else
{
	$val14=false;
}
$val15=$_POST['speci'];
$val16=$_POST['cc1'];
$val17=$_POST['cc2'];
$val18=$_POST['cc3'];
$val19=$_POST['cc4'];
$val20=$_POST['mint'];
$val21=$_POST['maxt'];
if (isset($_POST['an'])) 
{
    $val22=true;
}
else
{
	$val22=false;
}
if (isset($_POST['ch'])) 
{
    $val23=true;
}
else
{
	$val23=false;
}
if (isset($_POST['nnr'])) 
{
    $val24=true;
}
else
{
	$val24=false;
}
if (isset($_POST['tn'])) 
{
    $val25=true;
}
else
{
	$val25=false;
}
if (isset($_POST['mon'])) 
{
    $val26=true;
}
else
{
	$val26=false;
}
if (isset($_POST['avr'])) 
{
    $val27=true;
}
else
{
	$val27=false;
}
if (isset($_POST['aar'])) 
{
    $val28=true;
}
else
{
	$val28=false;
}
$val29=$_POST['rva'];
//$val30=$_POST['par'];
$val32=$_POST['cou'];
$t=time();
$str="UPDATE testformat_master SET  TF_MainGroupCode='".$val1."',TF_MainGroupName='".$val2."', TF_TestCode='".$val3."', TF_TestName='".$val4."',TF_FormatName='".$val6."',TF_LabeqName='".$val7."',TF_ReportTitle='".$val8."',TF_Gender='".$val10."',TF_GenderSpecific='".$val11."',TF_DefaultFormat='".$val12."',TF_SampleNeeded='".$val13."',TF_Growth='".$val14."',TF_Specimen='".$val15."',TF_Cap1='".$val16."',TF_Cap2='".$val17."',TF_Cap3='".$val18."',TF_Cap4='".$val19."',TF_Mintime='".$val20."',TF_Maxtime='".$val21."',TF_Accreditation='".$val22."',TF_ClinicalHistory='".$val23."',TF_NormalRanges='".$val24."',TF_TemplateNeeded='".$val25."',TF_MultiOrganisms='".$val26."',TF_AutoVerification='".$val27."',TF_AutoApproval='".$val28."',TF_ResultValueAlignment='".$val29."', TF_modifyby='".$_SESSION['username']."', TF_modifydate='".date("Y-m-d h:m:sa",$t)."' WHERE TF_FormatCode='".$val5."'";
if ($conn->query($str) == TRUE) {
    echo "<script>";
	echo "window.alert('Sucessfully Entered New Record');";
	echo "window.location.href='testformat_view.php'";
	echo "</script>";
	$str1="delete from test_table where format_code='".$val5."'";
	$conn->query($str1);
	for($i=1;$i<=$val32;$i++)
	{
		$s="s".$i;
		$p="p".$i;
		$d="d".$i;
		if(isset($_POST[$s]))
		{
			$str2="insert into test_table values('".$val5."','".$_POST[$s]."','".$_POST[$p]."','".$_POST[$d]."')";
			$conn->query($str2);
		}
	}
}
else
{
	echo "Error: " . $sql . "<br>" . $conn->error;
}
}
?>