<?php
include("dbcon.php");
?>
<html>	

<head>
	<title> Authorization Master </title>
	<script type="text/javascript" src="jquery-1.4.1.min.js"></script>
<meta charset='utf-8'>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="styles.css">
   <script src="jquery-latest.min.js" type="text/javascript"></script>
   <script src="script.js"></script>
<link rel="stylesheet" type="text/css" href="css/menu.css" />
<link rel="stylesheet" type="text/css" href="css/default.css" />
<script src="http://code.jquery.com/jquery-latest.js"></script>
    <script type="text/javascript">
    var popup;
    function SelectName(selectedRow) {
    	console.log(selectedRow);
    	var location = "Doc.php?rowID="+selectedRow;
        popup = window.open(location, "Popup", "width=500,height=300");
        popup.focus();
        return false
    }
    function SelectName1(selectedRow) {
    	console.log(selectedRow);
    	var location = "org.php?rowID="+selectedRow;
        popup = window.open(location, "Popup", "width=500,height=300");
        popup.focus();
        return false
    }
    function SelectName2(selectedRow) {
    	console.log(selectedRow);
    	var location = "stf.php?rowID="+selectedRow;
        popup = window.open(location, "Popup", "width=500,height=300");
        popup.focus();
        return false
    }
    function SelectName3(selectedRow) {
    	console.log(selectedRow);
    	var location = "rfrl.php?rowID="+selectedRow;
        popup = window.open(location, "Popup", "width=500,height=300");
        popup.focus();
        return false
    }
    $(document).ready(function(){	
		
		$('input[name=MyRadio]').click(function() 
		{
			if($(this).val() == "Doctor") 
			{
				$('#DivDoctor').show();
				$('#DivOrganisation').hide();
				$('#DivStaff').hide();
				$('#DivReferral').hide();
			}
			 else if ($(this).val() == "Organization") 
			 {
				$('#DivDoctor').hide();
				$('#DivOrganisation').show();
				$('#DivStaff').hide();
				$('#DivReferral').hide();
			 }
			else if ($(this).val() == "Staff") 
			{
				$('#DivDoctor').hide();
				$('#DivOrganisation').hide();
				$('#DivStaff').show();
				$('#DivReferral').hide();
		     }
		    else
			{
				$('#DivDoctor').hide();
				$('#DivOrganisation').hide();
				$('#DivStaff').hide();
				$('#DivReferral').show();
		     }
		});
	});
</script>
</head>
<body>
<?php 
	include('menu.php'); ?>
	<form action="#" method="post" class="register">
		<p>
		<div>
<ul class="drop_menu">
               <li>
              <a href="authorization_search.php">
                Search
              </a>
              </li>
                <li><a href="authorization_table.php">View</a></li>
                <li>
                  <button class="button" type="submit" name="submit">Save</button></li>
				  </ul>
				  </div>
</p>      
				<div class="image">
              <img src="images/2.jpg" width="100%" height="100px"/>
              <h2> Authorization Master </h2>
        </div>
           <div>
			<p class="agreement">
			<fieldset class="row1" style="width:700px;">
			<form>
			<legend>Designation</legend>
			<?php
			if($_GET['t1']=="Doctor")
			{
			echo "<input type='radio' name='MyRadio' value='Doctor' checked /><label>Doctor</label>";
			echo "<input type='radio' name='MyRadio' value='Organization' /><label>Organization</label>";
			echo "<input type='radio' name='MyRadio' value='Staff'/><label>Staff</label>";
			echo "<input type='radio' name='MyRadio' value='Referal' /><label>Referal</label>";
			}
		else if($_GET['t1']=="Organization")
		{
			echo "<input type='radio' name='MyRadio' value='Doctor' /><label>Doctor</label>";
			echo "<input type='radio' name='MyRadio' value='Organization' checked /><label>Organization</label>";
			echo "<input type='radio' name='MyRadio' value='Staff'/><label>Staff</label>";
			echo "<input type='radio' name='MyRadio' value='Referal' /><label>Referal</label>";
		}
		else if($_GET['t1']=="Staff")
		{
			echo "<input type='radio' name='MyRadio' value='Doctor' /><label>Doctor</label>";
			echo "<input type='radio' name='MyRadio' value='Organization' /><label>Organization</label>";
			echo "<input type='radio' name='MyRadio' value='Staff' checked /><label>Staff</label>";
			echo "<input type='radio' name='MyRadio' value='Referal' /><label>Referal</label>";
		}
		else
		{
			echo "<input type='radio' name='MyRadio' value='Doctor' /><label>Doctor</label>";
			echo "<input type='radio' name='MyRadio' value='Organization' /><label>Organization</label>";
			echo "<input type='radio' name='MyRadio' value='Staff' /><label>Staff</label>";
			echo "<input type='radio' name='MyRadio' value='Referal' checked /><label>Referal</label>";
		}
		?>
			</form>
			</fieldset>
			</p>
           </div>
			<br>
			<div style="margin-left:0px;">
			<p class="agreement">
		  <label for="empc">Authorization Code: </label>			
		<input type='text' name='wc' value="<?php echo $_GET['t2']; ?>" readonly='readonly' required>
	  </p>
		  </div>
		<p class="agreement">
            <div id="DivDoctor" style="display:none; padding-left: 15; font-size: 15;">
                <label for="athname">Reference Code</label>
				<input type="text" name="txtDoctor" id="txtDoctor1" value="Doctor" />
				<img src="search.png" onclick="SelectName(1)">
			</div>
			<div id="DivOrganisation" style="display:none; padding-left: 15; font-size: 15;">
                <label for="athname">Reference Code</label>
				<input type="text" name="txtOrganisation" id="txtOrganisation1" value="Organisation" />
				<img src="search.png" onclick="SelectName1(1)">
			</div>
			<div id="DivStaff" style="display:none; padding-left: 15; font-size: 15;">
                <label for="athname">Reference Code</label>
				<input type="text" name="txtStaff" id="txtStaff1" value="Staff" />
				<img src="search.png" onclick="SelectName2(1)">
			</div>
			<div id="DivReferral" style="display:none; padding-left: 15; font-size: 15;">
                <label for="athname">Reference Code</label>
				<input type="text" name="txtReferral" id="txtReferral1" value="Referral" />
				<img src="search.png" onclick="SelectName3(1)">
			</div>
		</p>
		<p class="agreement">
		<label for="athname">Authorization Name:</label>
		<input type="text" name="athname" value="<?php echo $_GET['t4']; ?>" id="athname1">
		</p>
		<p class="agreement">
		<label for="athfor">Authorization For:</label>
		<br>
		<br>
		<input type="checkbox" name="cb0" id="cb0" value="<?php echo $_GET['t5']; ?>">
		<label><u>O</u>PConcession</label>
		<input type="checkbox" name="cb1" id="cb1" value="<?php echo $_GET['t6']; ?>">
		<label><u>I</u>PConcession</label>
		<input type="checkbox" name="cb2" id="cb2" value="<?php echo $_GET['t7']; ?>">
		<label><u>V</u>ocher Approval</label>
		</p>
		<p class="agreement">
		<br>
		<label></label>
		<input type="checkbox" name="cb3" id="cb3" value="<?php echo $_GET['t8']; ?>">
		<label>OP<u>C</u>redit</label>
		<input type="checkbox" name="cb4" id="cb4" value="<?php echo $_GET['t9']; ?>">
		<label>IP<u>C</u>redit</label>
		<input type="checkbox" name="cb5" id="cb5" value="<?php echo $_GET['t10']; ?>">
		<label>Modif<u>y</u>ing Approved Trans</label>
		</p>
		<p class="agreement">
		<br>
		<label></label>
		<input type="checkbox" name="cb6" id="cb6" value="<?php echo $_GET['t11']; ?>">
		<label>OP Canc<u>e</u>llations</label>
		<input type="checkbox" name="cb7" id="cb7" value="<?php echo $_GET['t12']; ?>">
		<label>IP Canc<u>e</u>llations</label>
		<input type="checkbox" name="cb8" id="cb8" value="<?php echo $_GET['t13']; ?>">
		<label>Discharge<u>W</u>ithout Settlement</label>
		</p>
		<p class="agreement">
		<br>
		<label></label>
		<input type="checkbox" name="cb9" id="cb9" value="<?php echo $_GET['t14']; ?>">
		<label>OP Pharmacy Concession</label>
		<input type="checkbox" name="cb10" id="cb10" value="<?php echo $_GET['t15']; ?>">
		<label>Patient<u>B</u>ill Conversion</label>
		<input type="checkbox" name="cb11" id="cb11" value="<?php echo $_GET['t16']; ?>">
		<label>FNB D<u>u</u>e</label>
		</p>
		<p class="agreement">
		<br>
		<label></label>
		<input type="checkbox" name="cb12" id="cb12" value="<?php echo $_GET['t17']; ?>">
		<label>OP Pharmacy Due</label>
		<input type="checkbox" name="cb13" id="cb13" value="<?php echo $_GET['t18']; ?>">
		<label><u>F</u>NB Concession</label>
		</p>
		<?php if($_GET['t23']=='1')
			{
			echo "<label>Active</label> <input type='checkbox' name='stat' value='1' checked>";
			}
			else
			{
				echo "<label>Active</label> <input type='checkbox' name='stat' value='0'>";
			}
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
	if ($conn->connect_error) 
	{
	    die("Connection failed: " . $conn->connect_error);
	} 

	$desig=$_POST['MyRadio'];
	$athcode=$_POST['wc'];
	$d='Doctor';
	$o='Organization';
	$s='Staff';
	if($desig==$d)
	{
		$refcode=$_POST['txtDoctor'];
	}
	else if($desig==$o)
	{
		$refcode=$_POST['txtOrganisation'];
	}
	else if($desig==$s)
	{
		$refcode=$_POST['txtStaff'];
	}
	else
	{
		$refcode=$_POST['txtReferral'];
	}

	$athname=$_POST['athname'];
	if (isset($_POST['cb0'])) 
	{
    	$opcncscn=true;
	}
	else
	{
		$opcncscn=false;
	}
	if (isset($_POST['cb1'])) 
	{
    	$ipcncscn=true;
	}
	else
	{
		$ipcncscn=false;
	}
	if (isset($_POST['cb2'])) 
	{
    	$vchraprvl=true;
	}
	else
	{
		$vchraprvl=false;
	}
	if (isset($_POST['cb3'])) 
	{
    	$opcrdt=true;
	}
	else
	{
		$opcrdt=false;
	}
	if (isset($_POST['cb4'])) 
	{
    	$ipcrdt=true;
	}
	else
	{
		$ipcrdt=false;
	}
	if (isset($_POST['cb5'])) 
	{
    	$modfyngaprvdtrans=true;
	}
	else
	{
		$modfyngaprvdtrans=false;
	}
	if (isset($_POST['cb6'])) 
	{
    	$opcncl=true;
	}
	else
	{
		$opcncl=false;
	}
	if (isset($_POST['cb7'])) 
	{
    	$ipcncl=true;
	}
	else
	{
		$ipcncl=false;
	}
	if (isset($_POST['cb8'])) 
	{
    	$dscgewostlmnt=true;
	}
	else
	{
		$dscgewostlmnt=false;
	}
	if (isset($_POST['cb9'])) 
	{
    	$opphcnscn=true;
	}
	else
	{
		$opphcnscn=false;
	}
	if (isset($_POST['cb10'])) 
	{
    	$ptntbillcnvrsn=true;
	}
	else
	{
		$ptntbillcnvrsn=false;
	}
	if (isset($_POST['cb11'])) 
	{
    	$fnbdue=true;
	}
	else
	{
		$fnbdue=false;
	}
	if (isset($_POST['cb112'])) 
	{
    	$opphdue=true;
	}
	else
	{
		$opphdue=false;
	}
	if (isset($_POST['cb13'])) 
	{
    	$fnbcnscn=true;
	}
	else
	{
		$fnbcnscn=false;
	}
	if (isset($_POST['stat']))
	{
	 	$status=true;
	}
	else
	{
		$status=false;
	}
	$t=time();
	$str1="select * from author_master where am_code='".$athcode."'";
	$result1=$conn->query($str1);
	$row1 = $result1->fetch_assoc();
	$val30=$row1['ref_createdby'];
	$val31=$row1['ref_createddate'];
	$str2="delete from author_master where am_code='".$athcode."'";
	$conn->query($str2);
	$str="INSERT into author_master (designtn,am_code,refcode,athname,opcnscn,ipcnscn,vocherapproval,opcrdt,ipcrdt,mfdapdtrans,opcncln,ipcncln,dscgewostlmnt,opphcnscn,patntbillcnvrsn,fnbdue,opphdue,fnbcnscn,createdby,createddate,modifyby,modifyddate,status) values ('".$desig."','".$athcode."','".$refcode."','".$athname."','".$opcncscn."','".$ipcncscn."','".$vchraprvl."','".$opcrdt."','".$ipcrdt."','".$modfyngaprvdtrans."','".$opcncl."','".$ipcncl."','".$dscgewostlmnt."','".$opphcnscn."','".$ptntbillcnvrsn."','".$fnbdue."','".$opphdue."','".$fnbcnscn."','".$val30."','".$val31."','".$_SESSION['username']."','".date('Y-m-d h:i:s',$t)."','".$status."')";
	if ($conn->query($str) == TRUE) 
	{
	echo "<script>";
	echo "window.alert('Sucessfully Updated');";
	echo "window.location.href='authorization_table.php';";
	echo "</script>";
	} 
	else 
	{
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}	
}
?>