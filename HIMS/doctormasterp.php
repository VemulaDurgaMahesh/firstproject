<html>
<head>
   
</head>
<body>
<?php include('menu.php'); ?>
<?php
	include('dbcon.php');
$val1=$_POST['ctype'];
$val2=$_POST['dtype'];
$val3=$_POST['drcode'];
$val4=$_POST['dname'].$_POST['drname'];
$val5=$_POST['aname'];
$val6=$_POST['speci'];
$val7=$_POST['desig'];
$val8=$_POST['dept'];
$val9=$_POST['reg'];
$val10=$_POST['quali'];
$val11=$_POST['dob'];
$val12=$_POST['cgtype'];
$val13=$_POST['ptype'];
$val14=$_POST['panno'];
$val15=$_POST['appno'];
$val16=(int)$_POST['accno'];
$val17=$_POST['addr'];
$val18=$_POST['city'];
$val19=$_POST['state'];
$val20=$_POST['coun'];
$val21=(int)$_POST['pin'];
$val22=(int)$_POST['mob'];
$val23=$_POST['cperson'];
$val24=$_POST['email'];
$t=time();
$str="insert into doctor values('".$val1."','".$val2."','".$val3."','".$val4."','".$val5."','".$val6."','".$val7."','".$val8."','".$val9."','".$val10."','".$val11."','".$val12."','".$val13."','".$val14."','".$val15."','".$val16."','".$val17."','".$val18."','".$val19."','".$val20."','".$val21."','".$val22."','".$val23."','".$val24."','".$_SESSION['username']."','".date('Y-m-d h:i:s',$t)."','xxxx','yyyy',true)";

if ($conn->query($str) == TRUE) {
    echo "<script>";
	echo "window.alert('Sucessfully Entered New Record');";
	echo "window.location.href='doctormaster.php';";
	echo "</script>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
?>
</body>
<html>