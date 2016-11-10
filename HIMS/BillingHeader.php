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
	
</head>

<body>
<?php include('menu.php'); ?>
	<form action="" method="post" class="register">
	<p>
		<div>
<ul class="drop_menu">
               <li>
              <a href="billing_search.php">
                Search
              </a>
              </li>
                <li><a href="billingheadertable.php">View</a></li>
                <li>
                  <button class="button" type="submit" name="submit">Save</button></li>
				  </ul>
				  </div>
</p>
		<div class="image">
              <img src="images/2.jpg" width="100%" height="100px"/>
            <h2> Billing Header </h2>
        </div>
						
				<div style="width:500px; margin:0 auto;">
				<br><br><br><br><br><br><br><br><br><br><br><br>
		<p class="agreement">
				<label>Billing Header</label><input type="text" name="bhead" style="width:185px; height:23px;"/>
				</p><br><br>	<p class="agreement">
				<label>Service Type</label><select name="stype" style="width:185px; height:23px;"> 
				 <option value="WardCharges">WardCharges</option>
				 <option value="ConsultationCharges">ConsultationCharges</option>
				 <option value="LaboratoryCharges">LaboratoryCharges</option>
				 <option value="ServiceCharges">ServiceCharges</option>
				 <option value="InvestigationCharges">InvestigationCharges</option>
				 <option value="PharmacyCharges">PharmacyCharges</option>
				 <option value="ProcedureCharges">ProcedureCharges</option>
				 <option value="ProfessionalCharges">ProfessionalCharges</option>
				</select>
				</p>
		</form>
		</body>
		</html>

<?php
include('dbcon.php');
if(isset($_POST['submit']))
{
$val1=$_POST['bhead'];
$val2=$_POST['stype'];

$str="INSERT into billing (billing_header,billing_servicetype,billing_createdby) values('".$val1."','".$val2."','".$_SESSION['username']."')";

if ($conn->query($str) == TRUE) {
    echo "<script>";
	echo "window.alert('Sucess');";
	echo "window.location.href='billingheader.php'";
	echo "</script>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
}
?>
</body>
<html>