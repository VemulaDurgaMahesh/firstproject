<?php include "dbcon.php";
?>
<html lang="en">

<head> <title>Source of Consultation Charges</title>

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
	$(".tn").change(function()
	{
		var id=$(this).val();
		$("#tn1").val(id);
	});
	
});
</script>
</head>

<body>
<?php include('menu.php'); ?>
	<form action="sourceofconsultationp.php" method="post" class="register">
		<p>
		<div>
<ul class="drop_menu">
               <li>
              <a href="sourceofconsultation_search.php">
                Search
              </a>
              </li>
                <li><a href="socconstable.php">View</a></li>
                <li>
                  <button class="button" type="submit">Save</button></li>
				  </ul>
				  </div>
</p> 
 
<body>
		<div class="image">
              <img src="images/2.jpg" width="100%" height="100px"/>
            
        </div><br><br>
				<p class="agreement">
				<label>Tariff Name</label>	
				<select id="tname" name="tname" class="tn">
			<?php 
				$str="select * from tariff_master where tariff_status=true";
				$result=$conn->query($str);
				//echo "<select name='cnames'>";
				echo "<option value='NULL'>--Select Tariff--</option>";
				while($row = $result->fetch_assoc()) {
				echo "<option value='".$row['tariff_code']."'>".$row['tariff_name']."</option>";
				}
			?>
			</select><input type="text" id="tn1" disabled></p>
			<br><p class="agreement">
				<label>Consultant Code </label>
				<?php include('dbcon.php');
			$count=1;
			$str="select * from soc_consultation";
            $result=$conn->query($str);
            while($row = $result->fetch_assoc()) {
             $count=$count+1;
            }
			echo "<input type='text' name='concode' value=SOC".$count." readonly='readonly'>";
			?>
			</p><br><p class="agreement">
				<label>Consultant Name</label><input type="text" name="conname"/>
				</p><br><br><p class="agreement">
			<table> <thead> <tr><td></td><td>Charge</td><td> Hospital</td></tr></thead>
			 <tbody><tr><td> Normal</td><td><input type="text" style="margin-left:0px;margin-right:0px;border:0px;" name="normch"/></td><td><input type="text" style="margin-left:0px;margin-right:0px;border:0px;" name="normhch"/>
			 <tr><td> Emergency</td><td><input type="text" style="margin-left:0px;margin-right:0px;border:0px;" name="emch"/></td><td><input type="text" style="margin-left:0px;margin-right:0px;border:0px;" name="emhch"/>
			 <tr><td> Revisit </td><td><input type="text" style="margin-left:0px;margin-right:0px;border:0px;" name="revch"/></td><td><input type="text" style="margin-left:0px;margin-right:0px;border:0px;" name="revhch"/>
			 </tbody>
			 </table>
			 </p><br><p class="agreement">
			 <label>Registration Fee</label><input type="text" name="regfee"/>
			 </p><br><p class="agreement">
			 <label>Number of Days</label> <input type="text" name="nodays"/>
			 </p><br><p class="agreement">
			 <label>Number of Visits</label><input type="text" name="nov"/>
			 </p><br><p class="agreement">
			 <?php
			echo"<fieldset><legend>Ward Group Wise Charges</legend><table border=1><tr><td></td>";
			   
			   $count=0;
				$str="select * from wardgrop_master";
				$result=$conn->query($str);
				while($row = $result->fetch_assoc()) {
				echo "<td>".$row['WARDGRP_NAME']."</td>";
				$count=$count+1;
				}
			
			echo "</tr><tr><td style='width:40px;'>Normal Charges</td>";
			
			for($i=0;$i<$count;$i=$i+1)
			{
				$c="n".$i;
				echo "<td><input type='text' style='margin-left:0px;margin-right:0px;border:0px;' name='".$c."'></td>";
				
			}
			echo "</tr><tr><td>Emergency Charges</td>";
			for($i=0;$i<$count;$i=$i+1)
				{
				$c="e".$i;
				echo "<td><input type='text' style='margin-left:0px;margin-right:0px;border:0px;' name='".$c."'></td>";
				
			}
			echo "</tr><tr><td>Revisit Charges</td>";
			for($i=0;$i<$count;$i=$i+1)
				{
				$c="r".$i;
				echo "<td><input type='text' style='margin-left:0px;margin-right:0px;border:0px;' name='".$c."'></td>";
				
			}
			
			echo" </tr></table></fieldset>";	 
			?>

	</form>
</body>
</html>