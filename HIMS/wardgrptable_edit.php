<?php
session_start();
?>
<?php include('menu.php'); ?>
<html>
<body>
<form action="#" method="post">

<table border=1>
	<tr><td>WARD GROUP CODE</td><td>WARD GROUP NAME</td><td>TARIFF APPLICATION</td><td>CREATED BY</td><td>CREATED DATE</td><td>MODIFIED BY</td><td>MODIFIED DATE</td><td>STATUS</td><td>EDIT</td></form></tr>
    <?php
	echo "<tr><form action='#' method='post'><td><input type='text' name='t7' id='t7' value='".$_GET['t7']."' readonly='readonly'><td><input type='text' name='t1' id='t1' value='".$_GET['t1']."' ></td><td><input name='t2' id='t2' value='".$_GET['t2']."' readonly='readonly'></td><td><input type='text' name='t3' id='t3' value='".$_GET['t3']."' readonly='readonly'></td><td><input type='text' name='t4' id='t4' value='".$_GET['t4']."' readonly='readonly'></td><td><input type='text' name='t6' id='t6' value='".$_GET['t6']."' readonly='readonly'></td><td><input type='text' name='t8' id='t8' value='".$_GET['t8']."' readonly='readonly'></td><td><input type='text' name='t5' id='t5' value='".$_GET['t5']."' readonly='readonly'></td><td><input type='submit' name='ed' value='edit'></td></td></form></tr>";?>
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
	$str="UPDATE wardgrop_master SET WARDGRP_NAME='".$_POST['t1']."', Status='".$_POST['t5']."' WHERE WARDGRP_CODE='".$_POST['t7']."'";
	$result=$conn->query($str);
	?>
	<script>
	window.location.href='wardgrptable.php';
	</script>
	<?php
}

}
?>
</body>
</html>