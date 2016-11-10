<?php
session_start();
?>
<html lang=''>
<head>
   
</head>
<body>

<?php
	include('dbcon.php');
$val1=$_POST['bhead'];
$val2=$_POST['stype'];
$count=1;
			$str="select * from billing";
            $result=$conn->query($str);
            while($row = $result->fetch_assoc()) {
             $count=$count+1;
            }
$t=time();
$val3="BH".$count;
$str="insert into billing values('".$val3."','".$val1."','".$val2."','prasana','".date('d-m-Y h:m:sa',$t)."',NULL,NULL,true)";

if ($conn->query($str) == TRUE) {
    echo "<script>";
	echo "window.alert('Sucessfully Entered New Record');";
	echo "window.location.href='billingheader.php'";
	echo "</script>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

?>
</body>
<html>