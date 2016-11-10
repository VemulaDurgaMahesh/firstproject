<html lang=''>
<head>
   
</head>
<body>
<?php include("menu.php");?>
<?php
	include('dbcon.php');
$val1=$_POST['rtype'];
$val2=$_POST['rfcode'];
$val3=$_POST['rn'];
$val4=$_POST['rname'];
$val5=$_POST['aname'];
$val6=$_POST['speci'];
$val7=$_POST['desig'];
$val8=$_POST['dept'];
$val9=$_POST['reg'];
$val10=$_POST['quali'];
$val11=$_POST['dob'];
$val12=$_POST['procode'];
$val13=(int)$_POST['inpat'];
$val14=(int)$_POST['inv'];
$val15=(int)$_POST['op'];
$val16=$_POST['panno'];
$val17=(int)$_POST['accno'];
$val18=$_POST['addr'];
$val19=$_POST['city'];
$val20=$_POST['state'];
$val21=$_POST['coun'];
$val22=(int)$_POST['pin'];
$val23=(int)$_POST['mob'];
$val24=$_POST['cperson'];
$val25=$_POST['email'];
$t=time();
$str="insert into referral values('".$val1."','".$val2."','".$val3."','".$val4."','".$val5."','".$val6."','".$val7."','".$val8."','".$val9."','".$val10."','".$val11."','".$val12."','".$val13."','".$val14."','".$val15."','".$val16."','".$val17."','".$val18."','".$val19."','".$val20."','".$val21."','".$val22."','".$val23."','".$val24."','".$val25."','".$_SESSION['username']."','".date("Y-m-d h:m:s",$t)."',NULL,NULL,true)";
if ($conn->query($str) == TRUE) {
   echo "<script>";
	echo "window.alert('Sucessfully Entered New Record');";
	echo "window.location.href='referralmaster.php';";
	echo "</script>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

?>
</body>
<html>
