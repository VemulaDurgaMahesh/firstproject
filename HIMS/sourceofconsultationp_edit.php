<html lang=''>
<head>
   
</head>
<body>

<?php
	include('dbcon.php');
	session_start();
$_SESSION['userid']="Kishore";
	
$val1=$_POST['tname'];
$val2=$_POST['concode'];
$val3=$_POST['conname'];
$val4=(int)$_POST['normch'];
$val5=(int)$_POST['normhch'];
$val6=(int)$_POST['emch'];
$val7=(int)$_POST['emhch'];
$val8=(int)$_POST['revch'];
$val9=(int)$_POST['revhch'];
$val10=$_POST['regfee'];
$val11=$_POST['nodays'];
$val12=$_POST['nov'];
$t=time();
if (isset($_POST['stat'])) {
    $val13=true;
}
else
{
	$val13=false;
}

$str="UPDATE soc_consultation set soc_tname='".$val1."', soc_conname='".$val3."', soc_nch='".$val4."', soc_nchch='".$val5."', soc_emch='".$val6."', soc_emhch='".$val7."', soc_rech='".$val8."', soc_rehch='".$val9."', soc_regfee='".$val10."', soc_nod='".$val11."', soc_nov='".$val12."', soc_modifiedby='".$_SESSION['userid']."', soc_modifieddate='".date("d-m-Y h:m:sa",$t)."', soc_status='".$val13."'  where soc_concode='".$val2."'";
if ($conn->query($str) == TRUE) {
    echo "<h1>New record created successfully</h1>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
	$str1="select * from wardgrop_master";
				$result=$conn->query($str1);
				$i=0;
				while($row = $result->fetch_assoc()) {
					$c="n".$i;
					$str1="UPDATE normal_charge SET ".$row['WARDGRP_NAME']."='".$_POST[$c]."' where con_code='".$val2."'";
				$conn->query($str1);
				$i=$i+1;
				}
				$str1="select * from wardgrop_master";
				$result=$conn->query($str1);
				$i=0;
				while($row = $result->fetch_assoc()) {
					$c="e".$i;
					$str1="UPDATE emerg_charges SET ".$row['WARDGRP_NAME']."='".$_POST[$c]."' where con_code='".$val2."'";
				$conn->query($str1);
				$i=$i+1;
				}
				$str1="select * from wardgrop_master";
				$result=$conn->query($str1);
				$i=0;
				while($row = $result->fetch_assoc()) {
					$c="r".$i;
					$str1="UPDATE revisit_charges SET ".$row['WARDGRP_NAME']."='".$_POST[$c]."' where con_code='".$val2."'";
				$conn->query($str1);
				$i=$i+1;
				}

				

?>
</body>
<html>
