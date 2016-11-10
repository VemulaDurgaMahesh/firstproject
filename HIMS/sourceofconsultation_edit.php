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
	<form action="sourceofconsultationp_edit.php" method="post" class="register">
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
             <h2>SOC consultation Charges</h2>
        </div><br><br>
				<p class="agreement">
				<label>Tariff Name</label>	
				<select id="tname" name="tname" class="tn">
			<?php 
				$str="select * from tariff_master where tariff_status=true";
				$result=$conn->query($str);
				//echo "<select name='cnames'>";
				$str1="select * from tariff_master where tariff_code='".$_GET['t1']."'";
				$result1=$conn->query($str1);
				$row1 = $result1->fetch_assoc();
				echo "<option value='".$_GET['t1']."'>".$row1['tariff_name']."</option>";
				while($row = $result->fetch_assoc()) {
				echo "<option value='".$row['tariff_code']."'>".$row['tariff_name']."</option>";
				}
			?>
			</select><input type="text" id="tn1" value=<?php echo $_GET['t1']; ?> disabled></p>
			<br><p class="agreement">
				<label>Consultant Code </label>
				<?php include('dbcon.php');
			$count=1;
			$str="select * from soc_consultation";
            $result=$conn->query($str);
            while($row = $result->fetch_assoc()) {
             $count=$count+1;
            }
			echo "<input type='text' name='concode' value=".$_GET['t2']." readonly='readonly'>";
			?>
			</p><br><p class="agreement">
				<label>Consultant Name</label><input type="text" value=<?php echo $_GET['t3']; ?> name="conname"/>
				</p><br><br><br><br><p class="agreement">
			<table> <thead> <tr><td></td><td>Charge</td><td> Hospital</td></tr></thead>
			 <tbody><tr><td> Normal</td><td><input type="text" value=<?php echo $_GET['t4']; ?> style="margin-left:0px;margin-right:0px; border:0px;" name="normch"/></td><td><input type="text" value=<?php echo $_GET['t5']; ?> style="margin-left:0px;margin-right:0px;" name="normhch"/>
			 <tr><td> Emergency</td><td><input type="text" value=<?php echo $_GET['t6']; ?> style="margin-left:0px;margin-right:0px;border:0px;" name="emch"/></td><td><input type="text" value=<?php echo $_GET['t7']; ?> style="margin-left:0px;margin-right:0px;" name="emhch"/>
			 <tr><td> Revisit </td><td><input type="text" value=<?php echo $_GET['t8']; ?> style="margin-left:0px;margin-right:0px;border:0px;" name="revch"/></td><td><input type="text" value=<?php echo $_GET['t9']; ?> style="margin-left:0px;margin-right:0px;" name="revhch"/>
			 </tbody>
			 </table>
			 </p><br><p class="agreement">
			 <label>Registration Fee</label><input type="text" value=<?php echo $_GET['t10']; ?> name="regfee"/>
			 </p><br><p class="agreement">
			 <label>Number of Days</label> <input type="text" value=<?php echo $_GET['t11']; ?> name="nodays"/>
			 </p><br><p class="agreement">
			 <label>Number of Visits</label><input type="text" value=<?php echo $_GET['t12']; ?> name="nov"/>
			 </p><br><br><br><p class="agreement">
			 <?php
			echo"<fieldset><legend>Ward Group Wise Charges</legend><table border=1><tr><td></td>";
			   
			   $count=0;
				$str="select * from wardgrop_master";
				$result=$conn->query($str);
				while($row = $result->fetch_assoc()) {
				echo "<td>".$row['WARDGRP_NAME']."</td>";
				$count=$count+1;
				}
			
			echo "</tr><tr><td>Normal Charges</td>";
			
			$i=0;
			$str="select * from normal_charge where con_code='".$_GET['t2']."'";
				$result=$conn->query($str);
				while($row = $result->fetch_assoc()) {
					$str1="select * from wardgrop_master";
				$result1=$conn->query($str1);
				while($row1 = $result1->fetch_assoc()) {
				$cc=$row1['WARDGRP_NAME'];
				$c="n".$i;
				echo "<td><input type='text' value='".$row[$cc]."'style='margin-left:0px;margin-right:0px;' name='".$c."'></td>";
				$i=$i+1;
				}
				}
			echo "</tr><tr><td>Emergency Charges</td>";
			$i=0;
			$str="select * from emerg_charges where con_code='".$_GET['t2']."'";
				$result=$conn->query($str);
				while($row = $result->fetch_assoc()) {
					$str1="select * from wardgrop_master";
				$result1=$conn->query($str1);
				while($row1 = $result1->fetch_assoc()) {
				$cc=$row1['WARDGRP_NAME'];
				$c="e".$i;
				echo "<td><input type='text' value='".$row[$cc]."'style='margin-left:0px;margin-right:0px;border:none;' name='".$c."'></td>";
				$i=$i+1;
				}
				}
			echo "</tr><tr><td>Revisit Charges</td>";
			$i=0;
			$str="select * from revisit_charges where con_code='".$_GET['t2']."'";
				$result=$conn->query($str);
				while($row = $result->fetch_assoc()) {
					$str1="select * from wardgrop_master";
				$result1=$conn->query($str1);
				while($row1 = $result1->fetch_assoc()) {
				$cc=$row1['WARDGRP_NAME'];
				$c="r".$i;
				echo "<td><input type='text' value='".$row[$cc]."'style='margin-left:0px;margin-right:0px;' name='".$c."'></td>";
				$i=$i+1;
				}		
				}				
			echo" </tr></table></fieldset>";	 
			echo "<br>";
			if($_GET['t17']=='1')
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