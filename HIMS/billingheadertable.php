<?php include('menu.php'); ?>
<html>
<style>
    .act { color:#F00; }
    .act1 {color:#2E2EFE;} 
</style>
<body>
<form action="" method="post">
<p>
    <div>
<ul class="drop_menu">
               <li>
              <a href="billing_search.php">
                Search
              </a>
              </li>
                <li><a href="billingheadertable.php">View</a></li> 
                <li>                
              <a> <button name="export_excel" formaction="billing_excel.php" >Export</button></a>
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
</p></form>

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
$str="SELECT * from billing WHERE billing_createdate between '$appdate' and '$appdate1'";
$result=$conn->query($str);
       if($result->num_rows > 0)
       {
echo "<br>";
echo "<table border=1 class='act'>";
	echo "<tr><td><input type='hidden'></td><td>BILLING HEADER</td><td>SERVICE TYPE</td><td>Created by</td><td>Created date</td><td>DELETE</td></tr>";
    while($row = $result->fetch_assoc()) {
	echo "<tr><form action='#' method='post'><td><input type='hidden' name='t8' id='t8' value='".$row['billing_sno']."' visibility='hidden' ></td><td><input type='text' name='t1' id='t1' value='".$row['billing_header']."' ></td><td><input type='text' name='t2' id='t2' value='".$row['billing_servicetype']."' ></td>
	<td><input type='text' name='t2' id='t3' value='".$row['billing_createdby']."' ></td>
	<td><input type='text' name='t2' id='t4' value='".$row['billing_createdate']."' ></td>
	<td><input type='submit' value='delete' name='del'></td></form></tr>";
}
echo "</table>";
	}
	else
	{
		?>
        <script>alert('No data Found');window.location.href='billingheadertable.php';</script>
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
$str="select * from billing";
$result=$conn->query($str);
echo "<br>";
echo "<table border=1 class='act'>";
	echo "<tr><td><input type='hidden'></td><td>BILLING HEADER</td><td>SERVICE TYPE</td><td>Created by</td><td>Created date</td><td>DELETE</td></tr>";
    while($row = $result->fetch_assoc()) {
	echo "<tr><form action='#' method='post'><td><input type='hidden' name='t8' id='t8' value='".$row['billing_sno']."' visibility='hidden' ></td><td><input type='text' name='t1' id='t1' value='".$row['billing_header']."' ></td><td><input type='text' name='t2' id='t2' value='".$row['billing_servicetype']."' ></td>
	<td><input type='text' name='t2' id='t3' value='".$row['billing_createdby']."' ></td>
	<td><input type='text' name='t2' id='t4' value='".$row['billing_createdate']."' ></td>
	<td><input type='submit' value='delete' name='del'></td></form></tr>";
}
echo "</table>";
}
?>  

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
if(isset($_POST['del']))
{
	$str="UPDATE billing SET billing_status= false WHERE billing_sno='".$_POST['t8']."'";
	 echo "<script>";
	echo "window.alert('Deleted Sucessfully');";
	echo "window.location.href='billingheadertable.php';";
	echo "</script>";
	$result=$conn->query($str);
	//header("location:doctortable.php");
	
}
}
?>