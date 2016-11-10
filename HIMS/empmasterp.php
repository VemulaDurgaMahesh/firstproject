<?php
session_start();
?>
<html lang=''>
<head>
   
</head>
<body>

<?php
include('dbcon.php');
$val1=$_POST['cat'];
$val2=$_POST['dob'];
$val3=$_POST['doj'];
$val4=$_POST['wod'];
$val5=$_POST['eshift'];
$val6=$_POST['en'].$_POST['ename'];
$val7=$_POST['ecode'];
$val8=$_POST['etype'];
$val9=$_POST['gen'];
$val10=$_POST['quali'];
$val11=$_POST['care'];
$val54=$_POST['efname'];
$val12=$_POST['dept'];
$val13=$_POST['desig'];
$val14=$_POST['pfno'];
$val15=$_POST['legno'];
$val16=$_POST['pmode'];
$val17=(int)$_POST['accno'];
$val18=$_POST['estatus'];
$val19=$_POST['permd'];
$val20=$_POST['resd'];
$val21=$_POST['bgroup'];
$val22=$_POST['deduc'];
$val23=$_POST['reg'];
$val24=$_POST['panno'];
$val25=$_POST['addr'];
$val26=$_POST['city'];
$val27=$_POST['state'];
$val28=$_POST['coun'];
$val29=(int)$_POST['pin'];
$val30=(int)$_POST['mob'];
$val31=$_POST['cperson'];
$val32=$_POST['email'];
$val33=(float)$_POST['gross'];
$val34=(float)$_POST['basic'];
$val35=(float)$_POST['da'];
$val36=(float)$_POST['hra'];
$val37=(float)$_POST['con'];
$val38=(float)$_POST['wash'];
$val39=(float)$_POST['med'];
$val40=(float)$_POST['cityinc'];
$val41=(float)$_POST['cca'];
$val42=(float)$_POST['othspe'];
$val43=(float)$_POST['lta'];
if (isset($_POST['pfs'])) {
    $val44=true;
}
else
{
	$val44=false;
}
$val45=(float)$_POST['ptax'];
$val46=(float)$_POST['pf'];
$val47=(float)$_POST['pfe'];
$val48=(float)$_POST['othe'];
$val49=(float)$_POST['esided'];
$val50=(float)$_POST['esiemp'];
$val51=(float)$_POST['hostel'];
$val52=(float)$_POST['tds'];
$val53=(float)$_POST['volun'];
$t=time();
$str="insert into employee values('".$val1."','".$val2."','".$val3."','".$val4."','".$val5."','".$val6."','".$val7."','".$val8."','".$val9."','".$val10."','".$val11."','".$val12."','".$val13."','".$val14."','".$val15."','".$val16."','".$val17."','".$val18."','".$val19."','".$val20."','".$val21."','".$val22."','".$val23."','".$val24."','".$val25."','".$val26."','".$val27."','".$val28."','".$val29."','".$val30."','".$val31."','".$val32."','".$val33."','".$val34."','".$val35."','".$val36."','".$val37."','".$val38."','".$val39."','".$val40."','".$val41."','".$val42."','".$val43."','".$val44."','".$val45."','".$val46."','".$val47."','".$val48."','".$val49."','".$val50."','".$val51."','".$val52."','".$val53."','".$_SESSION['userid']."','".date("d-m-Y h:m:sa",$t)."',NULL,NULL,true,'".$val54."')";
if ($conn->query($str) == TRUE) {
    echo "<h1>New record created successfully</h1>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
?>
</body>
<html>
