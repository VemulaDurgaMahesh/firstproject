<html>
<body>
<?php include('menu.php'); ?>
<style>
    .act { color:#F00;}
    .act1 {color:#2E2EFE;} 
</style>
<form action="" method="post">
		<p>
		<div>
<ul class="drop_menu">
               <li>
              <a href="packagemastersearch.php" >
                Search
              </a>
              </li>
                <li><a href="packageMastersView.php" class="act1">View</a></li>
                <li>                
              <a> <button name="export_excel" formaction="packagemaster_excel.php" >Export</button></a>
              </li> 
              <li>
			<p>	<a><label  for="titlecode" class="act1">&nbsp;&nbsp;&nbsp;&nbsp;From Date</label>
                 <input name="fromdate" type="date"  id="popupDatepicker" placeholder="Pick from date" class="form-control">
                <label for="titlecode" class="act1" >To Date</label>
                <input name="todate" type="date"  id="popupDatepicker1" placeholder="Pick to date" class="form-control">
                <button type="submit" name="submit" class="act1">Submit</button></a>
			</p>
			</li>
           </ul>
		</div>
</p>
</form>
<?php 
if(isset($_POST['submit']))
{
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
	 $appdate=$_POST['fromdate'];  
     $appdate1=$_POST['todate']; 
	$str="SELECT * from package_master WHERE pm_createdate between '$appdate' and '$appdate1'";
	$result=$conn->query($str);
	if($result->num_rows > 0)
       {
		echo "<table border='1' class='act'>";
	$row = $result->fetch_assoc();
	echo "<tr><td>     </td>";
	$thead=array_keys($row);
	for($i=0; $i <count($thead); $i++)
	{
		$th=$thead[$i];
		echo "<td border='1'> $th </td>";
	}
	echo "</tr>";
	
	do{
			
			echo "<tr border='1'>";
			echo "<form action='packageMasterEdit.php' method='post'><td><input type='submit' value='edit'/></td>";
			foreach($row as $k => $v)
			{
				echo "<td border='1'><input type='text' name=$k value=$v /></td>";
			}
			echo "</form></tr>";
		} while($row = $result->fetch_assoc());
	echo "</table>";
	}
	else
	{
		?>
        <script>alert('No data Found');window.location.href='packageMastersView.php';</script>
        <?php
	}

}
else
{
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
	$str="SELECT * from package_master";
	$result=$conn->query($str);
	echo "<table border='1' class='act'>";
	$row = $result->fetch_assoc();
	echo "<tr><td>     </td>";
	$thead=array_keys($row);
	for($i=0; $i <count($thead); $i++)
	{
		$th=$thead[$i];
		echo "<td border='1'> $th </td>";
	}
	echo "</tr>";
	
	do{
			
			echo "<tr border='1'>";
			echo "<form action='packageMasterEdit.php' method='post'><td><input type='submit' value='edit'/></td>";
			foreach($row as $k => $v)
			{
				echo "<td border='1'><input type='text' name=$k value=$v /></td>";
			}
			echo "</form></tr>";
		} while($row = $result->fetch_assoc());
	echo "</table>";
}
?>  
</body>
</html>