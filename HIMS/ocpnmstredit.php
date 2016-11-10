<?php
session_start();
?>
<?php include('menu.php'); ?>
<html>
<body>
<form action="#" method="post">

<table border=1>
	<tr><td>OCCUPATION CODE</td><td>OCCUPATION NAME</td><td>OCCUPATION CREATEDBY</td><td>OCCUPATION CREATEDDATE</td><td>OCCUPATION MODIFIED BY</td><td>OCCUPATION MODIFIED DATE</td><td>OCCUPATION STATUS</td><td>DELETE STATUS</td><td>EDIT</td></form></tr>
    <?php
	echo "<tr><form action='#' method='post'><td><input type='text' name='t1' id='t1' value='".$_GET['t1']."' ></td><td><input type='text' name='t2' id='t2' value='".$_GET['t2']."' ></td><td><input type='text' name='t3' id='t3' value='".$_GET['t3']."' readonly='readonly'></td><td><input name='t4' id='t4' value='".$_GET['t4']."' readonly='readonly'></td><td><input type='text' name='t5' id='t5' value='".$_GET['t5']."' readonly='readonly'></td><td><input type='text' name='t6' id='t6' value='".$_GET['t6']."' readonly='readonly'></td><td><input type='text' name='t7' id='t7' value='".$_GET['t7']."' readonly='readonly'></td><td><input type='text' name='t8' id='t8' value='".$_GET['t8']."' readonly='readonly'></td><td><input type='text' name='t8' id='t8' value='".$_GET['t8']."'></td><td><input type='submit' name='ed' value='edit'></td></td></form></tr>";?>
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
	$str="UPDATE occupation_master SET occ_name='".$_POST['t2']."',occ_status='".$_POST['t7']."' WHERE occ_code='".$_POST['t1']."'";
	$result=$conn->query($str);
	?>
	<script>
	window.location.href='occupationmastertable.php';
	</script>
	<?php
}

}
?>
</body>
</html>