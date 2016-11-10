
<?php
include('dbcon1.php');
if($_POST['id11'])
{
	
	$id=$_POST['id11'];
	 if($id=="OTCharges")
	{
	$stmt = $DB_con->prepare("SELECT * FROM soc_masters where (soc_type='services' OR soc_type='miscellaneous') and  	soc_status='1' ");
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

