<html lang="en">

<head>
	<meta charset="utf-8">
	<title> Organisation / Insurance  Master </title>

	<meta charset='utf-8'>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="styles.css">
   <script src="jquery-latest.min.js" type="text/javascript"></script>
   <script src="script.js"></script>
<link rel="stylesheet" type="text/css" href="css/menu.css" />
<link rel="stylesheet" type="text/css" href="css/default.css" />


</head>

<body>
<?php include('menu.php'); ?>
	<form action="#" method="post" class="register">
	<p>
		<div>
<ul class="drop_menu">
               <li>
              <a href="orginsurance_search.php">
                Search
              </a>
              </li>
                <li><a href="orginsurancetable.php">View</a></li>
                <li>
                  <button class="button" type="submit">Save</button></li>
				  </ul>
				  </div>
</p>            	
<div style="width:1100px;height:80px;">
			<fieldset class="row1" style="width:400px;">
              <legend> Organisation / Insurance </legend>			
			<input type="radio" name="orgin" value="Organisation"><label> Organisation</label></input>
			<input type="radio" name="orgin" value="Insurance"><label> Insurance </label></input>			 
			 </fieldset>
			 <div style="margin-left:470px;width:550px;height:80px;">
			<table> <thead> <tr><th></th><th style="width:100px;"> ORG % </th> <th> EMP % </th></tr></thead>
			        <tbody><tr><th style="width:100px;"> OP </th> <th> <input type="text" name="oporgp" style="margin-left:0px; margin-right:0px; border:0;"/></th><th> <input type="text" name="opempp" style="margin-left:0px; margin-right:0px; border:0;"/></th></tr>
			     <tr> <th> IP </th> <th> <input type="text" name="iporgp" style="margin-left:0px; margin-right:0px; border:0;"/></th><th> <input type="text" name="ipempp" style="margin-left:0px; margin-right:0px; border:0;"/></th></tr>
				 </tbody>
				 </table>		 
	</div>
</div>	
			  <div style="width:1100px;overflow:hidden;">
<div style="width:1100px; float: left;">  
	<p class="agreement">
				<label> Consultation No</label> <input type="text" name="consulno" style=';height:23px;width:185px;'>
				 <label style="margin-left:50px;">Consultation Days </label><input type="text" name="consulday" style=';height:23px;width:185px;'><br><br>
	</p>			 
            <p class="agreement"> 
             <label>Organisation Code</label>
			<?php include('dbcon.php');
			$count=1;
			$str="select * from organisation";
            $result=$conn->query($str);
            while($row = $result->fetch_assoc()) {
             $count=$count+1;
            }
			echo "<input type='text' name='orcode' value=ORG".$count." style=';height:23px;width:185px;' readonly>";
			?>
      	    <label style="margin-left:50px;">Organisation Name </label><input type="text" name="orname" style=';height:23px;width:185px;'/> </p><br><br>
			<p class="agreement">
			<label>Contract No</label><input type="text" name="cno" style=';height:23px;width:185px;'/>
		    <label style="margin-left:50px;">Contract Date </label><input type="date" name="cdate" style=';height:23px;width:185px;'/></p><br><br>
			<p class="agreement">
			<label>Contact Person </label><input type="text" name="cperson" style=';height:23px;width:185px;'/>
			<label style="margin-left:50px;">Authorized Person </label><input type="text" name="aperson" style=';height:23px;width:185px;'/></p><br><br>
			<p class="agreement">
			<label>Effect From  </label><input type="date" name="effectf" style=';height:23px;width:185px;'/>
			<label style="margin-left:50px;">Effect To  </label><input type="date" name="effectto" style=';height:23px;width:185px;'/></p><br>
			</div> </div>
			<br><p class="agreement">
				<fieldset class="row1" style="width:400px;">
              <legend> Tariff Priority for: </legend>			
			<input type="radio" name="tprifor" value="IP"><label> IP </label></input>
			<input type="radio" name="tprifor" value="OP"> <label>OP </label></input>			 
			</fieldset>
			</p>
	<div style="width: 100%; overflow: hidden;">
	<div style="width: 500px; float: left;">
			<table> <caption>Tariff Priority for IP:</caption>
			<tr><th style="width:100px;">Priority</th> <th><select name="tpriip" style="margin-left:0px; margin-right:0px; border:0;">	
<p class="agreement">			
			<?php

			$str1="select * from tariff_master where tariff_status=true";
$result1=$conn->query($str1);
echo "<option value='NULL'>--Select Tariff--</option>";
    while($row1 = $result1->fetch_assoc()) {
	echo "<option value='".$row1['tariff_code']."'>".$row1['tariff_name']."</option>";
}			
		?></select></th><th style="width:100px;"> Discount % </th><th><input type="text" name="tpridisip" style="margin-left:0px; margin-right:0px; border:0;"/></th></tr></p>
		<tr><th style="width:100px;">Default </th><th><select name="dtpriip" style="margin-left:0px; margin-right:0px; border:0;">	
			 <?php
	$str1="select * from tariff_master where tariff_status=true";
$result1=$conn->query($str1);
echo "<option value='NULL'>--Select Tariff--</option>";
    while($row1 = $result1->fetch_assoc()) {
	echo "<option value='".$row1['tariff_code']."'>".$row1['tariff_name']."</option>";
}			
		?></select></th>

		<th style="width:100px;">Discount %</th><th><input type="text" name="dtpridisip" style="margin-left:0px; margin-right:0px; border:0;"/></th></tr></table>
		</div> <div style="margin-left: 520px;"><table> <caption> Tariff Priority for OP:</caption>
			<tr><th style="width:120px;">Priority </th><th><select name="tpriop" style="margin-left:0px; margin-right:0px; border:0;">	
			 <?php
	$str1="select * from tariff_master where tariff_status=true";
$result1=$conn->query($str1);
echo "<option value='NULL'>--Select Tariff--</option>";
    while($row1 = $result1->fetch_assoc()) {
	echo "<option value='".$row1['tariff_code']."'>".$row1['tariff_name']."</option>";
}			
		?></select></th>

		<th style="width:100px;">Discount % </th><th><input type="text" name="tpridisop" style="margin-left:0px; margin-right:0px; border:0;"/></th></tr>
		<tr><th>Default </th> <th><select name="dtpriop" style="margin-left:0px; margin-right:0px; border:0;">	
			 <?php
	$str1="select * from tariff_master where tariff_status=true";
$result1=$conn->query($str1);
echo "<option value='NULL'>--Select Tariff--</option>";
    while($row1 = $result1->fetch_assoc()) {
	echo "<option value='".$row1['tariff_code']."'>".$row1['tariff_name']."</option>";
}			
		?></select></th>

		<th>Discount %</th> <th><input type="text" name="dtpridisop" style="margin-left:0px; margin-right:0px; border:0;"/></th></tr></table></div></div>
		<br><div style="width: 100%; overflow: hidden;">
    <div style="width: 500px; float: left;">
		<table> <caption> AppOnServiceTypeWise</caption>
		     <thead> <tr><th></th><th style="height:20px;"> Priority % </th> <th> Default % </th></tr></thead>
			        <tbody><tr> <th> Service Charges </th> <th> <input type="text" name="scpri" style="margin-left:0px; margin-right:0px; border:0;"/></th><th> <input type="text" name="defscp" style="margin-left:0px; margin-right:0px; border:0;"/></th></tr>
					<tr> <th> Consultation Charges </th> <th> <input type="text" name="ccpri" style="margin-left:0px; margin-right:0px; border:0;"/></th><th> <input type="text" name="defccp" style="margin-left:0px; margin-right:0px; border:0;"/></th></tr>
					<tr> <th> Professional Charges </th> <th> <input type="text" name="pcpri" style="margin-left:0px; margin-right:0px; border:0;"/></th><th> <input type="text" name="defpcp" style="margin-left:0px; margin-right:0px; border:0;"/></th></tr>
					<tr> <th> Investigation Charges </th> <th> <input type="text" name="icpri" style="margin-left:0px; margin-right:0px; border:0;"/></th><th> <input type="text" name="deficp" style="margin-left:0px; margin-right:0px; border:0;"/></th></tr>
					<tr> <th> Procedure Charges </th> <th> <input type="text" name="prcpri" style="margin-left:0px; margin-right:0px; border:0;"/></th><th> <input type="text" name="defprcp" style="margin-left:0px; margin-right:0px; border:0;"/></th></tr>
					<tr> <th> Ward Charges </th> <th> <input type="text" name="wcpri" style="margin-left:0px; margin-right:0px; border:0;"/></th><th> <input type="text" name="defwcp" style="margin-left:0px; margin-right:0px; border:0;"/></th></tr>
					<tr> <th> Pharmacy Charges </th> <th> <input type="text" name="phcpri" style="margin-left:0px; margin-right:0px; border:0;"/></th><th> <input type="text" name="defphcp" style="margin-left:0px; margin-right:0px; border:0;"/></th></tr>
			     
				 </tbody>
				 </table>
				 <p class="agreement"></div><div style="margin-left: 220px;"><label>Remarks </label><textarea cols="58px" name="remarks" style="margin-left:0px; margin-right:0px; border:1;"></textarea></p>
			
		</div></div>

	</form>
	<?php
	include('dbcon.php');
if($_SERVER['REQUEST_METHOD']=='POST')
{
$val1=$_POST['orgin'];
$val2=$_POST['orcode'];
$val3=$_POST['orname'];
$val4=$_POST['cno'];
$val5=$_POST['cdate'];
$val6=$_POST['cperson'];
$val7=$_POST['effectf'];
$val8=$_POST['effectto'];
$val9=$_POST['aperson'];
$val10=(int)$_POST['oporgp'];
$val11=(int)$_POST['opempp'];
$val12=(int)$_POST['iporgp'];
$val13=(int)$_POST['ipempp'];
$val14=(int)$_POST['consulno'];
$val15=(int)$_POST['consulday'];
$val16=$_POST['tprifor'];
$val17=$_POST['tpriip'];
$val18=$_POST['tpridisip'];
$val19=$_POST['dtpriip'];
$val20=$_POST['dtpridisip'];
$val21=$_POST['tpriop'];
$val22=$_POST['tpridisop'];
$val23=$_POST['dtpriop'];
$val24=$_POST['dtpridisop'];
$val25=$_POST['remarks'];
$val26=$_POST['scpri'];
$val27=$_POST['defscp'];
$val28=$_POST['ccpri'];
$val29=$_POST['defccp'];
$val30=$_POST['pcpri'];
$val31=$_POST['defpcp'];
$val32=$_POST['icpri'];
$val33=$_POST['deficp'];
$val34=$_POST['prcpri'];
$val35=$_POST['defprcp'];
$val36=$_POST['wcpri'];
$val37=$_POST['defwcp'];
$val38=$_POST['phcpri'];
$val39=$_POST['defphcp'];
$t=time();
$str="insert into organisation values('".$val1."','".$val2."','".$val3."','".$val4."','".$val5."','".$val6."','".$val7."','".$val8."','".$val9."','".$val10."','".$val11."','".$val12."','".$val13."','".$val14."','".$val15."','".$val16."','".$val17."','".$val18."','".$val19."','".$val20."','".$val21."','".$val22."','".$val23."','".$val24."','".$val25."','".$val26."','".$val27."','".$val28."','".$val29."','".$val30."','".$val31."','".$val32."','".$val33."','".$val34."','".$val35."','".$val36."','".$val37."','".$val38."','".$val39."','".$_SESSION['username']."','".date('Y-m-d h:m:s',$t)."',NULL,NULL,true)";

if ($conn->query($str) == TRUE) {
    echo "<script>";
	echo "window.alert('Sucessfully Entered New Record');";
	echo "window.location.href='orginsurance.php';";
	echo "</script>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
}
?>
</body>
</html>