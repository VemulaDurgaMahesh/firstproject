<?php
session_start();
$_SESSION['userid']="kishore";
?>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title> New Registration </title>
<link rel="stylesheet" type="text/css" href="menu.css" />
<meta charset='utf-8'>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="styles.css">
   <script src="jquery-latest.min.js" type="text/javascript"></script>
   <script src="script.js"></script>	
	<link rel="stylesheet" type="text/css" href="css/menu.css" />
<link rel="stylesheet" type="text/css" href="css/default.css" />
<script language="javascript">
var popupWindow = null;
function positionedPopup(url,winName,w,h,t,l,scroll){
settings =
'height='+h+',width='+w+',top='+t+',left='+l+',scrollbars='+scroll+',resizable'
popupWindow = window.open(url,winName,settings)
}
</script>
<script type="text/javascript">
    var popup;
    function SelectName() {
        popup = window.open("occ.php", "Popup", "width=700,height=700");
        popup.focus();
        return false
    }
</script>
</head>

<body>
<?php include("menu.php");?>
	<form action="newregistrationdetails.php" method="post" class="register">
<p>
		<div>
<ul class="drop_menu">
				 <li>
              <a href="newregistration_search.php">
                Search
              </a>
              </li>
				<li>
				<a href="newregistration_table.php">View</a>
				</li>
                <li>
                  <button class="button" type="submit">Save</button>
                  </li>
				  </ul>
				  </div>
</p>   
	<div class="image">
              <img src="images/4.jpg" width="100%" height="100px"/>
				<h2> New Registration </h2>
				</div>
				<p>
				<fieldset class="row1">
              <legend> Patient Details </legend>			
			<input type="radio" name="rtype" value="new user"/> <label>NEW</label>
			<input type="radio" name="rtype" value="old user"/> <label>OLD</label>
			<label> UMR No:</label>
			<?php include('dbcon.php');
			$count=1;
			$str="select * from new_registration";
            $result=$conn->query($str);
            while($row = $result->fetch_assoc()) {
             $count=$count+1;
            }
			echo "<input type='text' name='umrcode' value=UMR".$count." readonly>";
			?>
			 <input type="button" name="search" value="search">
			<label>REG#:</label>
			<?php include('dbcon.php');
			$count=1;
			$str="select * from new_registration";
            $result=$conn->query($str);
            while($row = $result->fetch_assoc()) {
             $count=$count+1;
            }
			echo "<input type='text' name='rgcode' value=REG".$count." readonly>";
			?>
			<label> Reg Dt: </label>
			<input type="text" name="current-date" value="<?php echo date('Y-m-d H:i:s');?>" readonly="readonly">
			 </fieldset>
			 </p>	
			 <p>
			 <fieldset>
			 <label>Title:</label>
			 <select name="title">
			 <?php
			 	include('dbcon.php');
			 	$str="select * from title_master";
			 	$result=$conn->query($str);
			 	echo "<option value='NULL'>--Select Title--</option>";
    			while($row = $result->fetch_assoc()) 
    			{
				echo "<option value='".$row['title_title']."'>".$row['title_title']."</option>";
				}
			 ?>
			</select>
		     <label>P.Name(F/M/L):</label>
			 <input type="text" name="fname"/>
			 <input type="text" name="mname"/>
			 <input type="text" name="lname"/>
			 <label>Image:</label>
			 <input type="file" name="browse" Value="Browse">
			</fieldset>
			</p>
			<p>
			<fieldset>
			<label>D.O.B:</label>
			<input type="date"  name="dob" placeholder="m/d/y" required="required">
			<label>Age(Y/M/D):</label>
			<input type="text" name="age">
			<label>Gender:</label>
			<select name="gndr">
			 <option value="Male">Male</option> 
			  <option value="Female">Female</option> 
			   </select>
			<label>M.Status</label>
			<select name="ms">
			<option value="0">--Not specified--</option>
			 <option value="1">Married</option> 
			  <option value="2">Single</option>
			  <option value="3">widowed</option>
			  <option value="4">Divorce</option> 
			   </select>
			</fieldset>
			</p>
			<p>
			<fieldset>
			<label>Father:</label>
			 <select name="fthr">
			 <option value="1">S/O</option> 
			  <option value="2">D/O</option> 
			   <option value="3">B/O</option> 
			   </select>
			   <input type="text" name="father">
			   <label>Mother:</label>
			   <input type="text" name="mthr">
			</fieldset>
			</p>
			<p>
			<fieldset>
			<label>Religion:</label>
			 <select name="rlgn">
			<option value="0">--Not Specified--</option>
			 <option value="1">Hindu</option> 
			  <option value="2">Muslim</option> 
			   <option value="3">Christian</option>
			   <option value="4">Sikh</option>
			   <option value="5">Jain</option> 
			   <option value="6">Parsi</option> 
			   </select>
			<label>Nationality:</label>
			<select name="ntnlty">
			 <option value="1">INDIA</option> 
			  <option value="2">Others</option> 
			   </select>
			<label>Passport NO:</label>
			<input type="text" name="psprtno">
			<label>Blood Group:</label>
			<select name="bgp">
			 <option value="O+">O+</option> 
			  <option value="O-">O-</option>
			  <option value="A+">A+</option> 
			  <option value="A-">A-</option>
			  <option value="B+">B+</option>
			  <option value="B-">B-</option>
			  <option value="AB+">AB+</option>
			  <option value="AB-">AB-</option>
			   </select>
			</fieldset>
			</p>
			<p>
			<fieldset>
			<label>P.Type</label>
			<select name="pt">
			 <option value="General">General</option> 
			  <option value="Staff">Staff</option>
			  <option value="Staff Department">StaffDependent</option>
			  <option value="Corporate">Corporate</option>
			  <option value="Insurance">Insurance</option>
			  </select>
			<label>Employee:</label>
			<input type="text" name="emp">
			<input type="button" name="search" value="search">
			<input type="text" name="emp1">
			</fieldset>
			</p>
			<p>
			<fieldset>
			<label>Occup:</label>
			<input type="text" name="ocpn" id="txtName" readonly="readonly" /><img src="search.png" onclick="SelectName()" />		
			</fieldset>
			</p>
			<p>
			<fieldset>
			<label>Consultant:</label>
			<input type="text" name="cnsltnt">
			<input type="button" name="search" value="search">
			<input type="text" name="cnsltnt1">
			<input type="text" name="cnsltnt2">
 			</fieldset>
			</p>
			<p>
			<fieldset>
			<label>Referral:</label>
			<select name="refer">
			<option value="Walkin">Walkin</option>
			<option value="Staff Doctors">Staff Doctors</option> 
			 <option value="Other Doctors">Other Doctors</option> 
			 <option value='other Hospitals'>Other Hospitals</option>
			 <option value="Staff">Staff</option>
			 <option value="Organizations">Organizations</option>
			 <option value="Others">Others</option>
			 <option value="Health Co-Ordinates">Health Co-ordinates</option>  
			 </select>
			<label>ReferredBy:</label>
			<input type="text" name="rfrd">
			<input type="button" name="search" value="search">
			<input type="text" name="rfrd1">
			<input type="text" name="rfrd2">
			</fieldset>
			</p>
			<p>
			<fieldset class="row2">
			<legend> Address Details </legend>
			<p>
			 <label>Address: </label>
			 <textarea name="addr" rows="5" cols="50"></textarea>
			 </p>
			 <p>
			<label>City:</label>
			<input type="text" name="city">
			<input type="text" name="city1">
			</p>
			<p>
			<label>State:</label>
			<input type="text" name="st">
			<input type="text" name="st1">
			</p>
			<p>
			<label>Country:</label>
			<input type="text" name="ctry">
			<input type="text" name="ctry1">
			</p>
			<p>
			<label>Pin/Zip:</label>
			<input type="text" name="pz">
			<label>Phone#:</label>
			<input type="text" name="phone">
			</p>
			<p>
			<label>Mobile#:</label>
			<input type="text" name="mbl">
			<label>Fax:</label>
			<input type="text" name="fx">
			</p>
			<p>
			<label>Email:</label>
			<input type="text" name="eml">
			</p>
			</fieldset>
			</p>
			<p>
			<fieldset class="row2">
			<legend> Receipt Details </legend>
			<p>
			<label>Reg.Fee: </label>
			<input type="text" name="rf">
			<label>Receipt No:</label>
			<input type="text" name="rcptnum">
			</p>
			<p>
			<label>concession:</label>
			<input type="text" name="cncsn">
			<label>Validity:</label>
			<input type="text" name="vldty">
			</p>
			<p>
			<label>Conc.Auth:</label>
			<input type="text" name="cnath">
			<input type="text" name="cnath1">
			</p>
			<p>
			<label>Receipt Mode:</label>
			<input type="text" name="rm">
			<label>Amount:</label>
			<input type="text" name="amt">
			</p>
			<p>
			<label>ChequeNo:</label>
			<input type="text" name="chno">
			<label>ChequeDt</label>
			<input type="text" name="chdt">
			</p>
			<p>
			<label>Bank:</label>
			<input type="text" name="bnk">
			<input type="text" name="bnk1">
			</p>
			<p>
			<label>Remarks:</label>
			<input type="text" name="rmrk">
			</p>
			</fieldset>
			</p>
			<p>
			<fieldset class="row2">
			<legend> Questionary </legend>
			<p>
			<label>How did you hear about this Hospital </label>
			<select name="qstnry">
			 <option value="By word of Mouth">By word of Mouth</option> 
			  <option value="Refered by Friends">Refered by Friends</option> 
			   <option value="Web">Web</option>
			   <option value="Advertisements">Advertisements</option>
			   </select>
			</p>
			</fieldset>
			</p>
	</form>
</body>
</html>
