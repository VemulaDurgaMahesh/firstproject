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
	<script src="jquery-latest.js"></script>
    <script type="text/javascript">
    var popup;
    function SelectName(selectedRow)
     {
    	console.log(selectedRow);
    	var location = "Doc.php?rowID="+selectedRow;
        popup = window.open(location, "Popup", "width=500,height=300");
        popup.focus();
        return false
    }
    function SelectName1(selectedRow) 
    {
    	console.log(selectedRow);
    	var location = "org.php?rowID="+selectedRow;
        popup = window.open(location, "Popup", "width=500,height=300");
        popup.focus();
        return false
    }
    function SelectName2(selectedRow) 
    {
    	console.log(selectedRow);
    	var location = "stf.php?rowID="+selectedRow;
        popup = window.open(location, "Popup", "width=500,height=300");
        popup.focus();
        return false
    }
    function SelectName3(selectedRow) 
    {
    	console.log(selectedRow);
    	var location = "rfrl.php?rowID="+selectedRow;
        popup = window.open(location, "Popup", "width=500,height=300");
        popup.focus();
        return false
    }
    $(document).ready(function()
    {	
		
		$('input[name=MyRadio]').click(function() 
		{
			if($(this).val() == "Doctor") 
			{
				$('#div1').hide();
				$('#DivDoctor').show();
				$('#DivOrganisation').hide();
				$('#DivStaff').hide();
				$('#DivReferral').hide();
			}
			 else if ($(this).val() == "Organization") 
			 {
			 	$('#div1').hide();
				$('#DivDoctor').hide();
				$('#DivOrganisation').show();
				$('#DivStaff').hide();
				$('#DivReferral').hide();
			 }
			else if ($(this).val() == "Staff") 
			{
				$('#div1').hide();
				$('#DivDoctor').hide();
				$('#DivOrganisation').hide();
				$('#DivStaff').show();
				$('#DivReferral').hide();
		     }
		    else if ($(this).val() == "Referal") 
			{
				$('#div1').hide();
				$('#DivDoctor').hide();
				$('#DivOrganisation').hide();
				$('#DivStaff').hide();
				$('#DivReferral').show();
		     }
		     else
		     {
		     	$('#div1').show();
		     	$('#DivDoctor').hide();
				$('#DivOrganisation').hide();
				$('#DivStaff').hide();
				$('#DivReferral').hide();
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
                <li><a href="authorization_table.php">View</a>
                </li>
                <li>
                  <button class="button" type="submit" name="submit">Save</button>
                  </li>
				  </ul>
				  </div>
				</p>      
			  <div class="image">
              <img src="images/2.jpg" width="100%" height="100px"/>
              <h2> Authorization Master </h2>
        	  </div>

			<fieldset class="row1" style="width:700px;">
			<legend>Designation</legend>
			<input type="radio" name="MyRadio" value="Doctor" /><label>Doctor</label>
			<input type="radio" name="MyRadio" value="Organization" /><label>Organization</label>
			<input type="radio" name="MyRadio" value="Staff"/><label>Staff</label>
			<input type="radio" name="MyRadio" value="Referal" /><label>Referal</label>
			</fieldset>
			<p>
			<fieldset>
			<p class="agreement">
			
			<label>Authorization Code: </label> 
			<?php 
			include('dbcon.php');
			$count=1;
			$str="select * from author_master";
			$result=$conn->query($str);
			$count=1;
				while($row = $result->fetch_assoc()) {
					$count=$count+1;
				}
			echo "<input type='text' name='wc' value=ATH".$count." readonly required>";
			?>

			</p>
			<p class="agreement">
			<div id="div1" style="padding-left: 15; font-size: 15;">
                <label> Reference Code:</label>&nbsp;&nbsp;&nbsp;
				<input type="text" readonly/>
				<img src="search.png" onclick="">
			</div>
            <div id="DivDoctor" style="display:none; padding-left: 15; font-size: 15;">
                <label >Reference Code:</label>&nbsp;&nbsp;&nbsp;
				<input type="text" name="txtDoctor1" id="txtDoctor1" required readonly placeholder="Select doctor"  />
				<img src="search.png" onclick="SelectName(1)">
			</div>
			<div id="DivOrganisation" style="display:none; padding-left: 15; font-size: 15;">
                <label >Reference Code:</label>&nbsp;&nbsp;&nbsp;
				<input type="text" name="txtOrganisation1" id="txtOrganisation1" readonly placeholder="select Organisation" required />
				<img src="search.png" onclick="SelectName1(1)">
			</div>
			<div id="DivStaff" style="display:none; padding-left: 15; font-size: 15;">
                <label >Reference Code:</label>&nbsp;&nbsp;&nbsp;
				<input type="text" name="txtStaff1" id="txtStaff1" readonly placeholder="Select Staff" required  />
				<img src="search.png" onclick="SelectName2(1)">
			</div>
			<div id="DivReferral" style="display:none; padding-left: 15; font-size: 15;">
                <label >Reference Code:</label>&nbsp;&nbsp;&nbsp;
				<input type="text" name="txtReferral" id="txtReferral1" readonly placeholder="Select Referral" required / >
				<img src="search.png" onclick="SelectName3(1)">
			</div>
			</p>
			<p class="agreement">
			<label >Authorization Name:</label>
			<input type="text" name="athname1" id="athname1" >
			</p>
			<p class="agreement">
			<label >Authorization For:</label>
			<p>
			<input type="checkbox" name="cb0" id="cb0">
			<label><u>O</u>PConcession</label>	
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	&nbsp;&nbsp;&nbsp;&nbsp;
			<input type="checkbox" name="cb1" id="cb1">
			<label><u>I</u>PConcession</label>	
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<input type="checkbox" name="cb2" id="cb2">
			<label><u>V</u>ocher Approval</label>
			</p>
			<p>
			<br>
			<label></label>
			<input type="checkbox" name="cb3" id="cb3">
			<label>OP<u>C</u>redit</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<input type="checkbox" name="cb4" id="cb4">
			<label>IP<u>C</u>redit</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<input type="checkbox" name="cb5" id="cb5">
			<label>Modif<u>y</u>ing Approved Trans</label>
			</p>
			<p>
			<br>
			<label></label>
			<input type="checkbox" name="cb6" id="cb6">
			<label>OP Canc<u>e</u>llations</label>
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<input type="checkbox" name="cb7" id="cb7">
			<label>IP Canc<u>e</u>llations</label>
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<input type="checkbox" name="cb8" id="cb8">
			<label>Discharge<u>W</u>ithout Settlement</label>
			</p>
			<p>
			<br>
			<label></label>
			<input type="checkbox" name="cb9" id="cb9">
			<label>OP Pharmacy Concession</label>&nbsp;&nbsp;
			<input type="checkbox" name="cb10" id="cb10">
			<label>Patient<u>B</u>ill Conversion</label>
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<input type="checkbox" name="cb11" id="cb11">
			<label>FNB D<u>u</u>e</label>
			</p>
			<p>
			<br>
			<label></label>
			<input type="checkbox" name="cb12" id="cb12">
			<label>OP Pharmacy Due</label>
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<input type="checkbox" name="cb13" id="cb13">
			<label><u>F</u>NB Concession</label>
			</p>
			</p>
			</fieldset>
			</p>
			</form>
			</body>
			</html>
			<?php
if($_SERVER['REQUEST_METHOD']=='POST')
{
	include ('dbcon.php');
	$desig=$_POST['MyRadio'];
	$athcode=$_POST['wc'];
	$d='Doctor';
	$o='Organization';
	$s='Staff';
	if($desig==$d)
	{
		$refcode=$_POST['txtDoctor1'];
	}
	else if($desig==$o)
	{
		$refcode=$_POST['txtOrganisation1'];
	}
	else if($desig==$s)
	{
		$refcode=$_POST['txtStaff1'];
	}
	else
	{
		$refcode=$_POST['txtReferral'];
	}

	$athname=$_POST['athname1'];
	if (isset($_POST['cb0'])) 
	{
    	$opcnscn=true;
	}
	else
	{
		$opcnscn=false;
	}
	if (isset($_POST['cb1'])) 
	{
    	$ipcnscn=true;
	}
	else
	{
		$ipcnscn=false;
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
	if (isset($_POST['cb12'])) 
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
	$str="insert into author_master (designtn,am_code,refcode,athname,opcnscn,ipcnscn,vocherapproval,opcrdt,ipcrdt,mfdapdtrans,opcncln,ipcncln,dscgewostlmnt,opphcnscn,patntbillcnvrsn,fnbdue,opphdue,fnbcnscn,createdby,modifyby,modifydate,status) values ('$desig','$athcode','$refcode','$athname','$opcnscn','$ipcnscn','$vchraprvl','$opcrdt','$ipcrdt','$modfyngaprvdtrans','$opcncl','$ipcncl','$dscgewostlmnt','$opphcnscn','$ptntbillcnvrsn','$fnbdue','$opphdue','$fnbcnscn','".$_SESSION['username']."',NULL,NULL,true)";
	if ($conn->query($str) == TRUE) 
	{
	echo "<script>";
	echo "window.alert('One Record Inserted Sucessfully');";
	echo "window.location.href='authorizationmaster.php'";
	echo "</script>";
	} 
	else 
	{
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}	
}
?>