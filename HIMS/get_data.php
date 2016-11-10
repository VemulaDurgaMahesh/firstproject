<?php
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
		$stmt1 = $DB_con->prepare("select * from servicegroup_master where servicegroup_code='".$row['soc_servicegroupname']."'");
	$stmt1->execute();
	while($row1=$stmt1->fetch(PDO::FETCH_ASSOC))
	{
		echo "<p class='agreement'><label>Service Group</label><input type='text' name='sg' id='sg' value=".$row1['servicegroup_name']." style='width:185px; height:23px;'readonly>";
	}		echo"<p class='agreement'>";
			echo "<label>Service Group:</label>";
			echo "<input type='text' id='sg' class='sg' name='sg' value=".$row['soc_servicegroupname']." style='width:185px; height:23px;' readonly='readonly'><p class='agreement'>";
			echo "<label>Charge:</label>";
			echo "<input type='text' id='sg' class='sg' name='sg' value=".$row['soc_charge']." style='width:185px; height:23px;' readonly='readonly'>";
			echo "</p><p class='agreement'>";
			echo "<label>Hospital%:</label>";
			echo "<input type='text' id='sg' class='sg' name='sg' value=".$row['soc_hospitalper']." style='width:185px; height:23px;' readonly='readonly'><input type='text' id='sg' class='sg' name='sg' value=".$row['soc_hospitalcharge']." style='margin-left:7px;width:185px; height:23px;' readonly='readonly'>";
			echo"</p><p class='agreement'>";
			echo "<label>Doctor%:</label>";
			echo "<input type='text' id='sg' class='sg' name='sg' value=".$row['soc_doctorper']." style='width:185px; height:23px;' readonly='readonly'><input type='text' id='sg' class='sg' name='sg' value=".$row['soc_doctorcharge']." style='margin-left:7px;width:185px; height:23px;' readonly='readonly'>";
			echo "</p><p class='agreement'>";
			echo "<label>Application For</label>";
			echo "<input type='text' id='sg' class='sg' name='sg' value=".$row['soc_applicationfor']." style='width:185px; height:23px;'  readonly='readonly'>";
			echo"</p>";
	}
}
?>
<?php
	include('dbcon1.php');
	if(isset($_POST['id11']))
	{
		
	$stmt = $DB_con->prepare("select * from soc_masters where soc_servicegroupname='".$_POST['id11']."'");
	$stmt->execute();
	?><?php
	while($row=$stmt->fetch(PDO::FETCH_ASSOC))
	{?>
		        <option value="<?php echo $row['soc_servicecode']; ?>"><?php echo $row['soc_servicename']; ?></option>
        <?php
		
	}}
?>
<?php
	include('dbcon1.php');
	if(isset($_POST['id12']))
	{
		
	$stmt = $DB_con->prepare("select * from parameter_master where p_labgroupname='".$_POST['id12']."'");
	$stmt->execute();
	?><?php
	while($row=$stmt->fetch(PDO::FETCH_ASSOC))
	{?>
		        <option value="<?php echo $row['p_pcode']; ?>"><?php echo $row['p_pname']; ?></option>
        <?php
		
	}}
?>
<?php
include('dbcon1.php');
if(isset($_POST['id20']))
{

	
	$stmt = $DB_con->prepare("SELECT * FROM city_master where city_code='".$_POST['id20']."'");
	$stmt->execute();
	while($row=$stmt->fetch(PDO::FETCH_ASSOC))
	{
		echo $row['city_pin'];
	}
}
?>