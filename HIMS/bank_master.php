<!DOCTYPE html>
<html lang="en">

<head>
<meta charset='utf-8'>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="styles.css">
   <script src="jquery-latest.min.js" type="text/javascript"></script>
   <script src="script.js"></script>
<link rel="stylesheet" type="text/css" href="css/menu.css" />
<link rel="stylesheet" type="text/css" href="css/default.css" />
<title>    header </title>
	<title>HOSPITAL CARE INFORMATION SYSTEM</title>
	
</head>

<body>
<?php include('menu.php'); ?>
	<form action="#" method="post" class="register">
	<p>
		<div>
<ul class="drop_menu">
               <li>
              <a href="bankmaster_search.php">
                Search
              </a>
              </li>
                <li><a href="banktable.php">View</a></li>
                <li>
                  <button class="button" type="submit">Save</button></li>
				  </ul>
				  </div>
</p>                	
		
		<div class="image">
              <img src="images/2.jpg" width="100%" height="100px"/>
              <h2>  Bank Master </h2>
        </div><BR><BR><BR><BR><BR><BR>
		<div style="width:600px; margin:0 auto;">
        <p class="agreement">
			<label for="hname">Bank Code: </label>
			
			<?php
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
			$str="select * from bank_master";
			$result=$conn->query($str);
			$count=1;
				while($row = $result->fetch_assoc()) {
					$count=$count+1;
				}
			echo "<input type='text' name='wc' value=BANK".$count." readonly required style='width:225px; height:23px;'>";
?>
			
			</p><BR><BR><p class="agreement">
			<label for="hcode">Bank Name:</label>
			<input type="text" name="wn" required style="width:225px; height:23px;">
			</p><BR><BR><p class="agreement">
		
            <label for="bank_branch">Branch Name</label>
            <input type="text" class="form-control" name="b_branch" placeholder="Branch Name" style="width:225px; height:23px;">
            </p><BR><BR><p class="agreement">
            <label for="bank_address">Address</label>
            <textarea  class="form-control" name="b_address" placeholder="Address" style="width:225px; height:45px;"></textarea>
               </p><p class="agreement">
                      <label for="bank_acctype">Account Type</label>
                      <input type="text" class="form-control" name="b_acctype" placeholder="Account Type" style="width:225px; height:23px;">
                   </p><BR><BR><p class="agreement">
                      <label for="bank_accno">Account No</label>
                      <input type="text" class="form-control" name="b_accno" placeholder="Account Number" style="width:225px; height:23px;">
                    </p><BR><BR><p class="agreement">
                      <label for="bank_micr">MICR Code</label>
                      <input type="text" class="form-control" name="b_micr" placeholder="MICR Core" style="width:225px; height:23px;">
                  </p><BR><BR><p class="agreement">
                      <label for="bank_ifsc">IFSC Code</label>
                      <input type="text" class="form-control" name="b_ifsc" placeholder="IFSC Code" style="width:225px; height:23px;">
                     </p><BR><BR><p class="agreement">
                      <label for="bank_bsr">BSR Code</label>
                      <input type="text" class="form-control" name="b_bsr" placeholder="BSR Code" style="width:225px; height:23px;">
			</p>
                    
		
		</div>
	</div>
	</form>
</body>
</html>
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
$val1=$_POST['wc'];
$val2=$_POST['wn'];
$val3=$_POST['b_branch'];
$val4=$_POST['b_address'];
$val5=$_POST['b_acctype'];
$val6=$_POST['b_accno'];
$val7=$_POST['b_micr'];
$val8=$_POST['b_ifsc'];
$val9=$_POST['b_bsr'];

$str="INSERT into bank_master(bank_code,bank_name,bank_branch,bank_address,bank_createdby,bank_acctype,bank_accno, 	bank_micr,bank_ifsc,bank_bsr) values('".$val1."','".$val2."','".$val3."','".$val4."','".$_SESSION['username']."','".$val5."','".$val6."','".$val7."','".$val8."','".$val9."')";
if ($conn->query($str) == TRUE) {
   echo "<script>";
	echo "window.alert('Sucess');";
	echo "window.location.href='bank_master.php'";
	echo "</script>";
}
else
{
	echo "Not inserted";
}
}
?>