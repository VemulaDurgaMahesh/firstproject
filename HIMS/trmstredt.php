<?php
session_start();
?>
<?php include('menu.php'); ?>
<html>
<style>
    .act { color:#F00; }
</style>
<body>
<form action="#" method="post">

<table border=1 class="act">
	<tr><td>TARRIF CODE</td><td>TARRIF NAME</td><td>TARRIF CONTACTPERSON</td><td>TARRIF EFFECTFROM</td><td>TARRIF EFFECTTO</td><td>TARRIF STATUS</td><td>TARRIF CREATED BY</td><td>TARRIF CREATED DATE</td><td>TARRIF MODIFIED BY</td><td>TARRIF MODIFIED DATE</td><td>DELETE STATUS</td><td>EDIT</td></form></tr>
     <?php
	echo "<tr><form action='#' method='post'><td><input type='text' name='t1' id='t1' value='".$_GET['t1']."' readonly='readonly'></td><td><input type='text' name='t2' id='t2' value='".$_GET['t2']."'></td><td><input name='t3' id='t3' value='".$_GET['t3']."'></td><td><input type='text' name='t4' id='t4' value='".$_GET['t4']."'></td><td><input type='text' name='t5' id='t5' value='".$_GET['t5']."'></td><td><input type='text' name='t6' id='t6' value='".$_GET['t6']."' readonly='readonly'></td><td><input type='text' name='t7' id='t7' value='".$_GET['t7']."' readonly='readonly'></td><td><input type='text' name='t8' id='t8' value='".$_GET['t8']."' readonly='readonly'></td><td><input type='text' name='t9' id='t9' value='".$_GET['t9']."' readonly='readonly'></td><td><input type='text' name='t10' id='t10' value='".$_GET['t10']."' readonly='readonly'></td><td><input type='text' name='t11' id='t11' value='".$_GET['t11']."' readonly='readonly'></td><td><input type='submit' name='ed' value='edit'></td></td></form></tr>";?>
</table>
</form>

<?php
if($_SERVER['REQUEST_METHOD']=='POST')
{
	$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hospital";
$count=1;

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
if(isset($_POST['ed']))
{
	$str="UPDATE tarrif_master SET tarrif_name='".$_POST['t2']."',tarrif_contactperson='".$_POST['t3']."',tarrif_effectfrom='".$_POST['t4']."',tarrif_effectto='".$_POST['t5']."', tarrif_status='".$_POST['t6']."',tarrif_createdby='".$_POST['t7']."',tarrif_creteddate='".$_POST['t8']."',tarrif_modifiedby='".$_POST['t9']."',tarrif_modifieddate='".$_POST['t10']."',delete_status='".$_POST['t11']."' WHERE tarrif_code='".$_POST['t1']."'";
	$result=$conn->query($str);
	?>
	<script>
	window.lotarrifion.href='tarrifmastertable.php';
	</script>
	<?php
}

}
?>
</body>
</html>