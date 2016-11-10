<?php
session_start();
//$_SESSION['userid']="mahendra";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script type="text/javascript">
$(document).ready(function()
{
	$(".tar").change(function() {
		var id=$(this).val();
          $("#tn").val(id);
        })
     });
</script>
<meta charset='utf-8'>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="styles.css">
   <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
   <script src="script.js"></script>
<link rel="stylesheet" type="text/css" href="css/menu.css" />
<link rel="stylesheet" type="text/css" href="css/default.css" />
	
<title> User Group Master </title>

</head>

<body>
<?php include('menu.php'); ?>
	<form action="#" method="post">
	<p>
		<div>
<ul class="drop_menu">
               <li>
              <a href="usergrptable_search.php">
                Search
              </a>
              </li>
                <li><a href="usergrptable.php">View</a></li>
                <li>
                  <button class="button" type="submit">Save</button></li>
				  </ul>
				  </div>
</p>
		<div class="image">
              <img src="images/2.jpg" width="100%" height="100px"/>
             <h2>User Group Master</h2>
        </div>

<br /> <br /> <br />
<label for="hname">User Group Code: </label>
			<?php
			$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hospital";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$str="select * from user_groupmaster";
$result=$conn->query($str);
$count=1;
    while($row = $result->fetch_assoc()) {
        $count=$count+1;
    }
			echo "<input type='text' name='ugc' value=UGM".$count." readonly='readonly'>";
			?>
			<br />
			</br>
			<label for="lcode">User Group Name:</label>
			<input type="text" name="ugn">
			</br><br/>
			<label for="mcode"> Department Name: </label>
			<select id="dname" name="dname" class="tar" required>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hospital";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}				
$str="select * from department_master";
$result=$conn->query($str);
echo "<option value='NULL'>--Select department name --</option>";
    while($row = $result->fetch_assoc()) {
	echo "<option value='".$row['dept_code']."'>".$row['dept_name']."</option>";
	}
	
?>
</select>
<input type="text" id="tn" name="tn" class="tntxt" disabled>
	</form>
</body>
</html>
<?php
if($_SERVER['REQUEST_METHOD']=='POST')
{
	$val1=$_POST['ugc'];
	$val2=$_POST['ugn'];
	$val3=$_POST['dname'];
	$t=time();
	$str="insert into user_groupmaster values('".$val1."','".$val2."','".$val3."','".$_SESSION['userid']."','".date("d-m-Y h:m:sa",$t)."','NULL','NULL',true)";
	if ($conn->query($str) == TRUE) 
	  {
        echo "<center><h1>New record created successfully</h1></center>";
      }
  else
   {
    	echo "Error: " . $sql . "<br>" . $conn->error;
   }
}
?>