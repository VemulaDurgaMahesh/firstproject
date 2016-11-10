<?php
include('dbcon1.php');
if(isset($_POST['id10']))
{
	$id=$_POST['id10'];
	
	$stmt = $DB_con->prepare("SELECT * FROM soc_masters WHERE soc_servicecode='".$_POST['id10']."'");
	$stmt->execute();
	
	while($row=$stmt->fetch(PDO::FETCH_ASSOC))
	{
		echo $row['soc_charge'];
	}
}
?>
<?php
include('dbcon1.php');
if(isset($_POST['id12']))
{
	$id=$_POST['id12'];
	
	$stmt = $DB_con->prepare("SELECT * FROM soc_masters WHERE soc_servicecode='".$_POST['id12']."'");
	$stmt->execute();
	
	while($row=$stmt->fetch(PDO::FETCH_ASSOC))
	{
		echo $row['soc_charge'];
	}
}
?>
<?php
include('dbcon1.php');
if(isset($_POST['id13']))
{
	$id=$_POST['id13'];
	
	$stmt = $DB_con->prepare("SELECT * FROM soc_consultation WHERE soc_concode='".$_POST['id13']."'");
	$stmt->execute();
	
	while($row=$stmt->fetch(PDO::FETCH_ASSOC))
	{
		echo $row['soc_nch'];
	}
}
?>