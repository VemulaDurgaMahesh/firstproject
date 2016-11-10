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
?>
<?php include('menu.php'); ?>
<style>
    .act { color:#F00; }
</style>
<p>
		<div>
<ul class="drop_menu">
               <li>
              <a href="packagemastersearch.php">
                Search
              </a>
              </li>
                <li><a href="packageMastersView.php">View</a></li>          
				  </ul>
				  </div>
</p>
<html>
<body>

<?php 

	$str="select * from package_master";
	$result=$conn->query($str);
	echo "<form action='packagemastersearch.php' method='post'>";
	echo "<table border='1' class='act'>";
	$row = $result->fetch_assoc();
	echo "<tr>";
	$thead=array_keys($row);
	for($i=0; $i <count($thead); $i++)
	{
		$th=$thead[$i];
		echo "<td border='1'> $th </td>";
	}
	echo "</tr>";
	
			
			echo "<tr border='1'>";
			
			foreach($row as $k => $v)
			{
				echo "<td border='1'><input type='text' name=$k /></td>";
			}
			echo "</tr></table>";
			echo "<input type='submit' value='search'/><br></form>";
	
	
?> 

<?php
		function quote_smart($str)
		{
			if(is_string($str))
			{
				$str="'".$str."'";
				return $str;
			}
			else
			{
				return $str;
			}
		}
if(($_SERVER['REQUEST_METHOD'] == 'POST'))
{
	foreach($_POST as $k => $v)
	{
		$v=quote_smart($v);
		$stmt = "select * from package_master where $k=$v";
		$result=$conn->query($stmt);
		
		if($row = $result->fetch_assoc())
		{
			echo "<table border='1' class='act'><tr borde='1'> ";
			for($i=0; $i <count($thead); $i++)
			{
				$th=$thead[$i];
				echo "<td border='1'> $th </td>";
			}
			echo "</tr>";
			do
			{
				echo "<tr border='1'>";
				foreach($row as $key => $val)
				{
					echo "<td border='1'>$val</td>";
				}
			echo "</tr>";
			}while($row = $result->fetch_assoc());
			echo "</table>";
			break;
		}
	}
}
?>

</form>
</body>
</html>