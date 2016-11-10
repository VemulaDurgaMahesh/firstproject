<?php
include('dbcon1.php');
if(isset($_POST['id13']))
{
	
	$id=$_POST['id13'];
	if($id=="Service")
	{		
	$stmt = $DB_con->prepare("SELECT * FROM soc_masters WHERE soc_status=true");
	$stmt->execute();
	?><option value="NULL">Select Services :</option><?php
	while($row=$stmt->fetch(PDO::FETCH_ASSOC))
	{
		?><option value="<?php echo $row['soc_servicecode']; ?>"><?php echo $row['soc_servicename']; ?></option>";
<?php		
	}
	}
	else
	{
		$stmt = $DB_con->prepare("SELECT * FROM servicegroup_master WHERE servicegroup_status=true");
	$stmt->execute();
	?><option value="NULL">Select Service Group :</option><?php
	while($row=$stmt->fetch(PDO::FETCH_ASSOC))
	{
		?><option value="<?php echo $row['servicegroup_code']; ?>"><?php echo $row['servicegroup_name']; ?></option>";
	<?php		
	}
	}
	
}
?>