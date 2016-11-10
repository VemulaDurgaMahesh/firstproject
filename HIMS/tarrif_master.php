
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
<?php include('menu.php');?>
	<form action="#" method="post" class="register">
	<p>
		<div>
<ul class="drop_menu">
               <li>
         <a href="tarrifmaster_search.php">
                Search
              </a>
              </li>
                <li><a href="tarrifmastertable.php">View</a></li>
                <li>
                  <button class="button" type="submit">Save</button></li>
				  </ul>
				  </div>
</p>
		<div class="image">
              <img src="images/2.jpg" width="100%" height="100px"/>
              <h2>  Tarrif Master </h2>
        </div><BR><BR><BR><BR><br><br>
		<div style="width:600px; margin:0 auto;">
		<p class="agreement">
			<label for="hname">Tarrif Code: </label>
			
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
			$str="select * from tariff_master";
			$result=$conn->query($str);
			$count=1;
				while($row = $result->fetch_assoc()) {
					$count=$count+1;
				}
			echo "<input type='text' name='wc' value=TR".$count." readonly required style='width:185px; height:23px;'>";
?>
			
		</p><br><br><p class="agreement" >
			<label>Tarrif Name</label>
			<input type="text" name="wn" required placeholder="Tarrif Name" style="width:185px; height:23px;">
		</p><br><br><p class="agreement">
			<label> Contact Person</label>
            <input type="text"  name="trperson" placeholder="Contact person" style="width:185px; height:23px;">
			</p><br><br><p class="agreement">
            <label> Effect From</label>
             <input type="date"  name="treffectfrom" placeholder="Effect From" required style="width:185px; height:23px;">
             </p><br><br>
             <p class="agreement">
             <label>Effect To</label>
             <input type="date"  name="treffectto" placeholder="Effect To" required style="width:185px; height:23px;">  
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
$val3=$_POST['trperson'];
$val4=$_POST['treffectfrom'];
$val5=$_POST['treffectto'];

$str="INSERT into tariff_master (tariff_code,tariff_name,tariff_contactperson,tariff_effectfrom,tariff_effectto,tariff_createdby) values ('".$val1."','".$val2."','".$val3."','".$val4."','".$val5."','".$_SESSION['username']."')";
if ($conn->query($str) == TRUE) 
{
   	?>
    <script>alert('Sucess'); window.location.href='tarrif_master.php';</script>                       
   <?php
}
else
{
	echo "Not inserted";
	echo "Error: " . $sql . "<br>" . $conn->error;
}
}
?>