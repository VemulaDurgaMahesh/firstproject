
<?php
include('dbcon1.php');
if($_POST['id11'])
{
	
	$id=$_POST['id11'];
	if($id=="Consultations")
	{
		$stmt = $DB_con->prepare("SELECT * FROM soc_consultation");
	$stmt->execute();
	?><option value = 'NULL'>Select Doctor :</option><?php
	while($row=$stmt->fetch(PDO::FETCH_ASSOC))
	{
		?>
        <option value="<?php echo $row['soc_concode']; ?>"><?php echo $row['soc_conname']; ?></option>
        <?php
		
	}
	}
	else if($id=="Services")
	{
	$stmt = $DB_con->prepare("SELECT * FROM soc_masters where soc_type='services' OR soc_type='miscellaneous'");
	$stmt->execute();
	?><option selected="selected" value = 'NULL'>Select Services :</option><?php
	while($row=$stmt->fetch(PDO::FETCH_ASSOC))
	{
		?>
        <option value="<?php echo $row['soc_servicecode']; ?>"><?php echo $row['soc_servicename']; ?></option>
        <?php
		
	}
	}
	else
	{
		$stmt = $DB_con->prepare("SELECT * FROM soc_masters where soc_type='investigations'");
	$stmt->execute();
	?><option selected="selected" value = 'NULL'>Select Services :</option><?php
	while($row=$stmt->fetch(PDO::FETCH_ASSOC))
	{
		?>
        <option value="<?php echo $row['soc_servicecode']; ?>"><?php echo $row['soc_servicename']; ?></option>
        <?php
		
	}
	}
}
?>

