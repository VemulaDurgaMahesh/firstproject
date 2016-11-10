<html lang=''>
<head>
<title> Organisation / Insurance </title>   
</head>
<body>

<?php
	include('dbcon.php');
$val1=$_POST['orgin'];
$val2=$_POST['orcode'];
$val3=$_POST['orname'];
$val4=$_POST['cno'];
$val5=$_POST['cdate'];
$val6=$_POST['cperson'];
$val7=$_POST['effectf'];
$val8=$_POST['effectto'];
$val9=$_POST['aperson'];
$val10=(int)$_POST['oporgp'];
$val11=(int)$_POST['opempp'];
$val12=(int)$_POST['iporgp'];
$val13=(int)$_POST['ipempp'];
$val14=(int)$_POST['consulno'];
$val15=(int)$_POST['consulday'];
$val16=$_POST['tprifor'];
$val17=$_POST['tpriip'];
$val18=$_POST['tpridisip'];
$val19=$_POST['dtpriip'];
$val20=$_POST['dtpridisip'];
$val21=$_POST['tpriop'];
$val22=$_POST['tpridisop'];
$val23=$_POST['dtpriop'];
$val24=$_POST['dtpridisop'];
$val25=$_POST['remarks'];
$val26=$_POST['scpri'];
$val27=$_POST['defscp'];
$val28=$_POST['ccpri'];
$val29=$_POST['defccp'];
$val30=$_POST['pcpri'];
$val31=$_POST['defpcp'];
$val32=$_POST['icpri'];
$val33=$_POST['deficp'];
$val34=$_POST['prcpri'];
$val35=$_POST['defprcp'];
$val36=$_POST['wcpri'];
$val37=$_POST['defwcp'];
$val38=$_POST['phcpri'];
$val39=$_POST['defphcp'];
$t=time();
$str="insert into organisation values('".$val1."','".$val2."','".$val3."','".$val4."','".$val5."','".$val6."','".$val7."','".$val8."','".$val9."','".$val10."','".$val11."','".$val12."','".$val13."','".$val14."','".$val15."','".$val16."','".$val17."','".$val18."','".$val19."','".$val20."','".$val21."','".$val22."','".$val23."','".$val24."','".$val25."','".$val26."','".$val27."','".$val28."','".$val29."','".$val30."','".$val31."','".$val32."','".$val33."','".$val34."','".$val35."','".$val36."','".$val37."','".$val38."','".$val39."','prasana','".date('d-m-Y h:m:sa',$t)."',NULL,NULL,true)";

if ($conn->query($str) == TRUE) {
    echo "<script>";
	echo "window.alert('Sucessfully Entered New Record');";
	
	echo "</script>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

?>
</body>
<html>