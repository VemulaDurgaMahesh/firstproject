<html lang=''>
<head>
   
</head>
<body>

<?php
	include('dbcon.php');
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

$str="insert into soc_consultation values('".$val1."','".$val2."','".$val3."','".$val4."','".$val5."','".$val6."','".$val7."','".$val8."','".$val9."','".$val10."','".$val11."','".$val12."','prasanna','".date("d-m-Y h:m:sa",$t)."',NULL,NULL,true)";
if ($conn->query($str) == TRUE) {
    echo "<h1>New record created successfully</h1>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$str="insert into normal_charge (con_code) values('".$val2."')";
if ($conn->query($str) == TRUE) {
    echo "<h1>New record created successfully</h1>";
}
$str="insert into emerg_charges (con_code) values('".$val2."')";
if ($conn->query($str) == TRUE) {
    echo "<h1>New record created successfully</h1>";
}
$str="insert into revisit_charges (con_code) values('".$val2."')";
if ($conn->query($str) == TRUE) {
    echo "<h1>New record created successfully</h1>";
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
