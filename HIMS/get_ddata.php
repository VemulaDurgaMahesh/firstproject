<?php
session_start();
include('dbcon1.php');
if(isset($_POST['id']))
{
	
	$id=$_POST['id'];
		
	$stmt = $DB_con->prepare("SELECT DISTINCT soc_tariffname FROM soc_masters WHERE soc_type='".$_POST['id']."'");
	$stmt->execute();
	
	?><option selected="selected">Select Tariff :</option><?php
	while($row=$stmt->fetch(PDO::FETCH_ASSOC))
	{
		$stmt1 = $DB_con->prepare("SELECT tariff_name FROM tariff_master WHERE tariff_code='".$row['soc_tariffname']."'");
	$stmt1->execute();
	while($row1=$stmt1->fetch(PDO::FETCH_ASSOC))
	{
		?>
        <option value="<?php echo $row['soc_tariffname']; ?>"><?php echo $row1['tariff_name']; ?></option>
        <?php
		
	}
	}
}
?>
<?php
include('dbcon1.php');
if(isset($_POST['id1']))
{
	$id=$_POST['id1'];
	
	$stmt = $DB_con->prepare("SELECT * FROM soc_masters WHERE soc_tariffname=:id");
	$stmt->execute(array(':id' => $id));
	?><option selected="selected">Select Service :</option><?php
	while($row=$stmt->fetch(PDO::FETCH_ASSOC))
	{
		?>
		<option value="<?php echo $row['soc_servicecode']; ?>"><?php echo $row['soc_servicename']; ?></option>
		<?php
	}
}
?>
<?php
include('dbcon1.php');
if(isset($_POST['id2']))
{
	$id=$_POST['id2'];
	
	$stmt = $DB_con->prepare("SELECT * FROM tariff_master WHERE tariff_code=:id");
	$stmt->execute(array(':id' => $id));
	?><option selected="selected">Select Service :</option><?php
	while($row=$stmt->fetch(PDO::FETCH_ASSOC))
	{
		?>
		<input type="text" value="<?php echo $row['tariff_code'];?>" name="tn" class="tntxt">
		<?php
	}
}
?>
<?php
include('dbcon1.php');
if(isset($_POST['id3']))
{
	
	$id=$_POST['id3'];
	if($id=="Doctor")
	{
		$stmt = $DB_con->prepare("SELECT * FROM doctor");
	$stmt->execute();
	?><option selected="selected">Select Doctor :</option><?php
	while($row=$stmt->fetch(PDO::FETCH_ASSOC))
	{
		?>
        <option value="<?php echo $row['doc_drcode']; ?>"><?php echo $row['doc_drname']; ?></option>
        <?php
		
	}
	}
	else
	{
	$stmt = $DB_con->prepare("SELECT * FROM employee");
	$stmt->execute();
	?><option selected="selected">Select Employee :</option><?php
	while($row=$stmt->fetch(PDO::FETCH_ASSOC))
	{
		?>
        <option value="<?php echo $row['emp_ecode']; ?>"><?php echo $row['emp_ename']; ?></option>
        <?php
		
	}
	}
}
?>
<?php
include('dbcon1.php');
if(isset($_POST['id4']))
{
	
	$id=$_POST['id4'];
	
		$stmt = $DB_con->prepare("SELECT * FROM doctor where doc_drcode='".$_POST['id4']."'");
	$stmt->execute();
	?><?php
	while($row=$stmt->fetch(PDO::FETCH_ASSOC))
	{
		$stmt1=$DB_con->prepare("SELECT * FROM department_master where dept_code='".$row['doc_dept']."'");
		$stmt1->execute();
		while($row1=$stmt1->fetch(PDO::FETCH_ASSOC))
		{
		?>
        <option value="<?php echo $row1['dept_code']; ?>"><?php echo $row1['dept_name']; ?></option>
        <?php
		
	}}
	}
	?>
	<?php
	
	if(isset($_POST['id5']))
	{
	$stmt = $DB_con->prepare("SELECT * FROM employee where emp_ecode='".$_POST['id5']."'");
	$stmt->execute();
	?><?php
	while($row=$stmt->fetch(PDO::FETCH_ASSOC))
	{
		$stmt1=$DB_con->prepare("SELECT * FROM department_master where dept_code='".$row['emp_dept']."'");
		$stmt1->execute();
		while($row1=$stmt1->fetch(PDO::FETCH_ASSOC))
		{
		?>
        <option value="<?php echo $row1['dept_code']; ?>"><?php echo $row1['dept_name']; ?></option>
        <?php
		
	}}
	}
?>
<?php
	include('dbcon1.php');
	if(isset($_POST['id6']))
	{
		
	$stmt = $DB_con->prepare("select * from tarrif_master t, wardgrop_master w where w.TARIFF_APPL=t.tarrif_code and w.WARDGRP_CODE='".$_POST['id6']."'");
	$stmt->execute();
	?><?php
	while($row=$stmt->fetch(PDO::FETCH_ASSOC))
	{?>
		        <option value="<?php echo $row['tarrif_code']; ?>"><?php echo $row['tarrif_name']; ?></option>
        <?php
		
	}}
?>
<?php
include('dbcon1.php');
if(isset($_POST['id7']))
{

	
	$stmt = $DB_con->prepare("SELECT * FROM city_master c, state_master s where c.state_code=s.state_code and c.city_code='".$_POST['id7']."'");
	$stmt->execute();
	while($row=$stmt->fetch(PDO::FETCH_ASSOC))
	{
		?>
        <option value="<?php echo $row['state_code']; ?>"><?php echo $row['state_name']; ?></option>
        <?php
	}
}
?>

<?php
include('dbcon1.php');
if(isset($_POST['id8']))
{
	$stmt = $DB_con->prepare("SELECT * FROM country_master c, state_master s where c.country_code=s.country_code and s.state_code='".$_POST['id8']."'");
	$stmt->execute();
	while($row=$stmt->fetch(PDO::FETCH_ASSOC))
	{
		?>
        <option value="<?php echo $row['country_code']; ?>"><?php echo $row['country_name']; ?></option>
        <?php
	}
}
?>
<?php
include('dbcon1.php');
if(isset($_POST['id9']))
{
	$count=1;
	$stmt = $DB_con->prepare("select * from soc_masters where soc_servicegroupname='".$_POST['id9']."'");
	$stmt->execute();
	while($row=$stmt->fetch(PDO::FETCH_ASSOC))
	{
		$count=$count+1;
	}
	$stmt = $DB_con->prepare("select * from servicegroup_master where servicegroup_code='".$_POST['id9']."'");
	$stmt->execute();
	while($row=$stmt->fetch(PDO::FETCH_ASSOC))
	{
		$val3=$row['servicegroup_name'];
	}
	$val6=$val3[0].$val3[1].$val3[2].$count;
	echo trim($val6);
}
?>
<?php
/*include('dbcon1.php');
if(isset($_POST['id10']))
{
	$id=$_POST['id10'];
	
	$stmt = $DB_con->prepare("SELECT * FROM soc_masters WHERE soc_servicecode='".$_POST['id10']."'");
	$stmt->execute();
	while($row=$stmt->fetch(PDO::FETCH_ASSOC))
	{
		$stmt1 = $DB_con->prepare("select * from servicegroup_master where servicegroup_code='".$row['soc_servicegroupname']."'");
	$stmt1->execute();
	while($row1=$stmt1->fetch(PDO::FETCH_ASSOC))
	{
		echo $row1['servicegroup_name'];
	}
	}
}*/
?>
<?php
include('dbcon1.php');
if(isset($_POST['id10']))
{
	
	$stmt = $DB_con->prepare("select * from soc_masters where soc_servicecode='".$_POST['id10']."'");
	$stmt->execute();
	while($row=$stmt->fetch(PDO::FETCH_ASSOC))
	{
		$_SESSION["scode"]=$row['soc_code'];
		$stmt1 = $DB_con->prepare("select * from servicegroup_master where servicegroup_code='".$row['soc_servicegroupname']."'");
	$stmt1->execute();
	$row1=$stmt1->fetch(PDO::FETCH_ASSOC);
			echo "<p class='agreement'>";
			echo "<label>Service Group</label><input type='text'  value=".$row1['servicegroup_name']." readonly>";
			echo"<p class='agreement'>";
			echo "<label>Charge:</label>";
			echo "<input type='text'  value=".$row['soc_charge']." readonly='readonly'>";
			echo "</p><p class='agreement'>";
			echo "<label>Hospital%:</label>";
			echo "<input type='text'  value=".$row['soc_hospitalper']." readonly='readonly'><input type='text' value=".$row['soc_hospitalcharge']." readonly='readonly'>";
			echo"</p><p class='agreement'>";
			echo "<label>Doctor%:</label>";
			echo "<input type='text'  value=".$row['soc_doctorper']." readonly='readonly'><input type='text' value=".$row['soc_doctorcharge']." readonly='readonly'>";
			echo "</p><p class='agreement'>";
			echo "<label>Application For</label>";
			echo "<input type='text' id='appfor' class='appfor' name='appfor' value=".$row['soc_applicationfor']." readonly='readonly'>";
			echo"</p>";
	}
}
?>
<?php
include('dbcon.php');
if(isset($_POST['c']))
{
	echo"<fieldset><legend>Ward Group Wise Charges</legend><table border=1><tr>";	 
			
			   
			   $count=0;
				$str="select * from wardgrop_master";
				$result=$conn->query($str);
				echo "<td><td>";
				while($row = $result->fetch_assoc()) {
				echo "<td>".$row['WARDGRP_NAME']."</td>";
				$count=$count+1;
				}
			
			echo "</tr></tr>";
			
			$str="select * from wardgrop_master";
				$result=$conn->query($str);
				echo "<td>Old Charge<td>";
				while($row = $result->fetch_assoc()) {
			$str1="select * from soc_masters where soc_servicecode='".$_POST['c']."'";
				$result1=$conn->query($str1);
				$row1=$result1->fetch_assoc();
				$valll=$row['WARDGRP_NAME'];
				echo "<td><input type='text' value='".$row1[$valll]."' style='margin-left:0px; border:none; margin-right:0px;' readonly='readonly'></td>";
			}
			
			echo "</tr></tr>";
			
			echo "<td>New Charge<td>";
			for($i=0;$i<$count;$i=$i+1)
				echo "<td><input type='text' name='".$i."' style='margin-left:0px; border:none; margin-right:0px;'></td>";
		
echo" </tr></table></fieldset>";
			echo "</fieldset>";
}
?>