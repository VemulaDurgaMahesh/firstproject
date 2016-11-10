<html lang="en">

<head>
	<meta charset="utf-8">
	<title> Test Format Master </title>
<link rel="stylesheet" type="text/css" href="menu.css" />
<meta charset='utf-8'>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="styles.css">
   <script src="jquery-latest.min.js" type="text/javascript"></script>
   <script src="script.js"></script>
	
	<link rel="stylesheet" type="text/css" href="css/menu.css" />
<link rel="stylesheet" type="text/css" href="css/default.css" />
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
        });
		$(".tn").change(function() {
		var id=$(this).val();
		var id1=$("#mgr option:selected").val();
          $("#tn1").val(id);
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
		/*$(".pr").change(function() {
		var id=$(this).val();
          $("#pr1").val(id);
		  var dataString = 'id12='+id;
        });*/
		
		
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
</head>
<body>
<?php include("menu.php");?>
	<form action="#" method="post" class="register">
	<p>
	<ul class="drop_menu">
               <li>
              <a href="testformattable_search.php">
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
$str="select * from servicegroup_master";
$result=$conn->query($str);
//echo "<select name='cnames'>";
echo "<option value='NULL'>--Select Sevice Group--</option>";
    while($row = $result->fetch_assoc()) {
	echo "<option value='".$row['servicegroup_code']."'>".$row['servicegroup_name']."</option>";
}
?>
			</select>
			<input type="text" name="mg1" id="mg1" value="" style="width:300px;" readonly='readonly'/> 
			<!-- <input type="radio" name="all" value="all"/><label>All</label> -->
			</p>
			<p>
			<label>Test Name:</label><select name="tname" id="tname" class="tn">
			<option value='NULL'>--Select Sevice--</option>
			</select>
			<input type="text" name="tna" id="tn1" value="" style="width:300px;" readonly='readonly'/> 
			<!--<input type="radio" name="all" value="pending"/><label>Pending</label> -->
			<!--<button type="button"><font color="red">Colour</font></button> -->
			</p>
			<br>
			<p>
			<label>Format:</label>
			<?php include('dbcon.php');
			$count=1;
			$str="select * from testformat_master";
            $result=$conn->query($str);
            while($row = $result->fetch_assoc()) {
             $count=$count+1;
            }
			echo "<input type='text' name='tfcode' value=FMT".$count." readonly>";
			?>
			<input type="text" name="fname" style="width:300px;"/>
			</p>
			<br>
			<br>	
			<p>
			<label>Lab Equi Name:</label>
		     <input type="text" name="lename" style="width:450px;"/>
			 </p>
			 </div>
	     <div style="margin-left:550px;">
		<input type="button" onclick="insRow('myTable')" value="Insert row" style="border:1px solid black;">
	    <INPUT type="button" value="Delete Row" onclick="deleteRow('myTable')" style="border:1px solid black;"/>
		</p><p></p>
		  <table  id="myTable" style="border: 1px solid black">
		  <thead>
		   <tr>
		   <th> Delete </th>
		  <th> SubTitle </th> 
		  <th> Parameter Description</th>
		  <th> Normal</th>
		  </tr>
		  </thead>
		  <tbody>
		  <tr>
		  <td><input type="checkbox" name="chk2"></td>
		  <td> 
		  <input type="text" name="s1" class="sc" style="margin-left:0;margin-right:0;">
		  </td>
		  <td> 
		  <select name="p1" style="margin-left:0;margin-right:0;" class="pr">
		  <option value='NULL'>--Select parameter--</option>
		  </select>
		  </td>
		  <td> 
		  <input type="text" name="d1" class="sc" id="pr1" value="" style="margin-left:0;margin-right:0;width:200px;">
		  </td>
		  </tr>
	</tbody>
		  </table>  
		  <input type="hidden" name="cou" id="cou" value="1">
		  </div>
			 <p>
			<label>Report Title:</label>
		     <input type="text" name="rtname" style="width:450px;"/>
			 </p>
            <p>
			<input type="radio" name="gen" value="Male"><label>Male</label> </input> 
			<input type="radio" name="gen" value="Female"><label> Female </label></input>
			<input type="checkbox" name="gs" value="GS"><label>Gender Specific</label>
			<input type="checkbox" name="df" value="DF"><label>Default Format</label>
			</p>
			<br>
			<p style="margin-left:246px;">
			<input type="checkbox" name="sn" value="SN"><label>Sample Needed</label>
			<input type="checkbox" name="gr" value="GR"><label>Growth</label>
			</p>
			<p>
			<label >Specimen:</label>
			<input type="text" name="speci" style="width:450px;"/> 
			</p>
			<br>
			<br>
			<p>
			<label>Col Cap 1:</label>
			<input type="text" name="cc1" style="width:150px;"/>
            <label style="margin-left:20px;">Col Cap 3:</label>
			<input type="text" name="cc3" style="width:150px;margin-left:8px;"/> 			
			</p>
			<br>
			<br>
			<p>
			<label>Col Cap 2:</label>
			<input type="text" name="cc2" style="width:150px;"/>
            <label style="margin-left:20px;">Col Cap 4:</label>
			<input type="text" name="cc4" style="width:150px;margin-left:8px;"/> 			
			</p>
			<br>
			<br>
			<p>
			<label>Min. Time:</label>
			<input type="text" name="mint" style="width:70px;"/><label>Minutes</label>
            <label>Max. Time:</label>
			<input type="text" name="maxt" style="width:75px;margin-left:6px;"/><label>Minutes</label>			
			</p>
			</div>
			<br>
			<br>
			<p>
			<div>
			<p>
			<input type="checkbox" name="an" value="an"><label><font color="blue" style="font-weight:bold">AccreditationNeeded</font></label>
			</p>
			<p>
			<input type="checkbox" name="ch" value="ch"><label><font>ClinicalHistory</font></label>
			</p>
			<br>
			<p>
			<input type="checkbox" name="nnr" value="nnr"><label>NoNormalRanges</label>
			</p>
			<br>
			<p>
			<input type="checkbox" name="tn" value="tn"><label><font>TemplateNeeded</font></label>
			</p>
			</div>
			<div style="margin-left:275px;">
			<p>
			<input type="checkbox" name="mon" value="mon"><label><font color="blue" style="font-weight:bold">MultipleOrganismsNeeded</font></label>
			</p>
		    <br>
			<p>
			<input type="checkbox" name="avr" value="avr"><label><font color="blue" style="font-weight:bold">AutoVerificationRequired</font></label>
			</p>
			<br>
			<p>
			<input type="checkbox" name="aar" value="aar"><label><font color="blue" style="font-weight:bold">AutoApprovalRequired</font></label>
			</p>
			</div>
			</p>
			 <fieldset class="row">
			 <legend>Result Values Alignment</legend>
			 <input type="radio" name="rva" value="SideOfTheParameter"/><label>SideOfTheParameter</label> <br><br>
			 <input type="radio" name="rva" value="BeneathTheParameter"/><label>BeneathTheParameter </label>
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
$val32=$_POST['cou'];
//$val30=$_POST['par'];
//$val31=$_POST['pdesc'];
$t=time();
$count=1;
$str="select * from testformat_master";
			$result=$conn->query($str);
			$count=1;
				while($row = $result->fetch_assoc()) {
					$count=$count+1;
				}
$str="insert into testformat_master values('".$count."','".$val1."','".$val2."','".$val3."','".$val4."','".$val5."','".$val6."','".$val7."','".$val8."','".$val10."','".$val11."','".$val12."','".$val13."','".$val14."','".$val15."','".$val16."','".$val17."','".$val18."','".$val19."','".$val20."','".$val21."','".$val22."','".$val23."','".$val24."','".$val25."','".$val26."','".$val27."','".$val28."','".$val29."',true,true,'".$_SESSION['username']."','".date("Y-m-d h:m:s",$t)."','".$_SESSION['username']."','".date("Y-m-d h:m:s",$t)."')";
if ($conn->query($str) == TRUE) {
   echo "<script>";
	echo "window.alert('Sucessfully New Record Entered');";
	echo "</script>";
	for($i=1;$i<=$val32;$i++)
	{
		$s="s".$i;
		$p="p".$i;
		$d="d".$i;
		if(isset($_POST[$s]))
		{
			$str="insert into test_table values('".$val5."','".$_POST[$s]."','".$_POST[$p]."','".$_POST[$d]."')";
			$conn->query($str);
		}
	}
}
else
{
	
	echo "Error: " . $sql . "<br>" . $conn->error;
}
}
?>