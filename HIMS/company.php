<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset='utf-8'>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="styles.css">
   <script src="jquery-latest.min.js" type="text/javascript"></script>
   <script src="script.js"></script>
<link rel="stylesheet" type="text/css" href="css/menu.css" />
<link rel="stylesheet" type="text/css" href="css/default.css" />
<title>HOSPITAL CARE INFORMATION SYSTEM</title>
</head>
<body class="cen">
<?php include('menu.php'); ?>

		<form action="#" method="post" class="centers">
		<p>
		<div>
<ul class="drop_menu">

                <li><a href="view_company.php">View</a></li>
                <li>
                  <button class="button" type="submit">Save</button></li>
				  </ul>
				  </div>
</p>                	
			
		<div class="image">
              <img src="images/2.jpg" width="100%" height="100px"/>
        </div>
		<br><br><br><br><br><br><br>
					<div style="width:600px; margin:0 auto;">
				<p>
            <label for="hname">Hospital Name: </label>
			<input type="text" name="hname" style="width:185px; height:23px;" autocomplete="off" required>
			<label for="hcode">Hospital Code:</label>
			<input type="text" name="hcode" style="width:185px; height:23px;" autocomplete="off" required>
			</p><br><br><p>
			<label for="lcode">Location Code:</label>
			<input type="text" name="lcode" style="width:185px; height:23px;" autocomplete="off" required>
			
			<label for="lname">Location Name:</label>
			<input type="text" name="lname" style="width:185px; height:23px;" autocomplete="off" required>
			</p><br><br><p>
			<label for="lstno">LST Number:</label>
			<input type="text" name="lstno" style="width:185px; height:23px;" autocomplete="off" required>
			<label for="cstno">CST Number:</label>
			<input type="text" name="cstno" style="width:185px; height:23px;" autocomplete="off" required>
			</p><br><br>
			<p>
			<label for="panno">PAN Number:</label>
			<input type="text" name="panno" style="width:185px; height:23px;" autocomplete="off" required>
			<label for="vatno">VAT Number:</label>
			<input type="text" name="vatno" style="width:185px; height:23px;" autocomplete="off" required>
			</p><br><br><p>
			<label for="add1">Address 1:</label>
			<input type="text" name="add1" style="width:470px; height:23px;" autocomplete="off" required>
			
			</p><br><br><p>
			<label for="add2">Address 2:</label>
			<input type="text" name="add2" style="width:470px; height:23px;" autocomplete="off">
			</p><br><br><p>
			<label for="add3">Address 3:</label>
			<input type="text" name="add3" style="width:470px; height:23px;" autocomplete="off">
			</p><br><br><p>
			<label for="pin">Pincode:</label>
			<input type="text" name="pin" style="width:470px; height:23px;" autocomplete="off" required></p></center>
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


		// Create connection
		$conn = new mysqli($servername, $username, $password, $dbname);
		// Check connection
		if ($conn->connect_error)
		 	{
		    	die("Connection failed: " . $conn->connect_error);
			} 

			$val1=$_POST['hname'];
			$val2=$_POST['hcode'];
			$val3=$_POST['lcode'];
			$val4=$_POST['lname'];
			$val5=$_POST['lstno'];
			$val6=$_POST['cstno'];
			$val7=$_POST['panno'];
			$val8=$_POST['vatno'];
			$val9=$_POST['add1'];
			$val10=$_POST['add2'];
			$val11=$_POST['add3'];
			$val12=$_POST['pin'];

			$str1="select * from company";
			$result=$conn->query($str1);
			if ($result->num_rows > 0) 
			{
				echo "<script>";
				echo "window.alert('Already Entered Company Details');";
				echo "window.location.href='company.php';";
				echo "</script>";
			}
			else
			{
				$str="insert into company (hospname,hospcode,loccode,locname,lstnum,cstnum,pannum,vatnum,add1,add2,add3,pincode,createdby,status) values('".$val1."','".$val2."','".$val3."','".$val4."','".$val5."','".$val6."','".$val7."','".$val8."','".$val9."','".$val10."','".$val11."','".$val12."','".$_SESSION['username']."',true)";
				if ($conn->query($str) == TRUE) 
				{
			    echo "<script>";
				echo "window.alert('Sucessfully Entered New Record');";
				echo "window.location.href='company.php';";
				echo "</script>";
				} 
				else 
				{
			    	echo "Error: " . $sql . "<br>" . $conn->error;
				}	
			}
}
?>