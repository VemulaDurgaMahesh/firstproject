
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
	<script type="text/javascript" src="jquery-1.4.1.min.js"></script>
<script type="text/javascript">
	$(document).ready(function()
{
	
	$(".wg").change(function()
	{
		var id=$(this).val();
		$("#wg1").val(id);
          var dataString = 'id6='+id;
	
		$.ajax
		({
			type: "POST",
			url: "get_data.php",
			data: dataString,
			cache: false,
			success: function(html)
			{
				
				$(".tarapp").html(html);
				var val1=$( "#tarapp option:selected").val();
				$("#tarapp1").val(val1);
			} 
		});
	});

	
});
</script>
</head>

<body>
<?php include('menu.php');
include('dbcon.php'); ?>
<form action="#" method="post" class="register">
<p>
		<div>
<ul class="drop_menu">
               <li>
              <a href="specimentable_search.php">
                Search
              </a>
              </li>
                <li><a href="specimentable.php">View</a></li>
                <li>
                  <button class="button" type="submit">Save</button></li>
				  </ul>
				  </div></p>
<div class="image">
              <img src="images/4.jpg" width="100%" height="100px"/>
				<h2> Specimen Master </h2>
				</div>


<br>
<br>
<br><br><br><br><br><br><br>

			<div style="width:500px; margin:0 auto;">
			<p class="agreement">
			<label>Specimen Cd. </label>
			<?php include('dbcon.php');
			$count=1;
			$str="select * from specimen_master";
            $result=$conn->query($str);
            while($row = $result->fetch_assoc()) {
             $count=$count+1;
            }
			echo "<input type='text' name='Specimencd' value=SPC".$count." readonly style='width:185px; height:23px;''>";
			?>
			</p><br><br>
			<p class="agreement">
			<label>Specimen Name </label>
			<input type='text' id='Specimenname' name='Specimenname'  required style="width:185px; height:23px;"></p>
		</div>	</form>
			
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
$val1=$_POST['Specimencd'];
$val2=$_POST['Specimenname'];
$t=time();
$str="INSERT into specimen_master(specimen_code,specimen_name,specimen_creatdby) values('".$val1."','".$val2."','".$_SESSION['username']."')";
if ($conn->query($str) == TRUE) {
    echo "<script>alert('success');window.location.href='specimenmaster.php';</script>";
}
else
{
	echo "Error: " . $sql . "<br>" . $conn->error;
}
}
?>