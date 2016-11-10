<?php include('menu.php'); ?>
<html>
<style>
    .act { color:#F00;}
    .act1 {color:#2E2EFE;} 
</style>

<body>
<form action="" method="post">
<p>
		<div>
<ul class="drop_menu">
               <li>
              <a href="healthcardholder_search.php">
                Search
              </a>
              </li>
                <li><a href="healthcardholdertable.php">View</a></li>
                <li>                
              <a> <button name="export_excel" formaction="healthcardholdertable_excel.php" >Export</button></a>
              </li> 
               <li>                
              <a> <button name="" formaction="" >Print</button></a>
              </li> 
              <li>
              <p> <a><label  for="titlecode" class="act1">&nbsp;&nbsp;&nbsp;&nbsp;From Date</label>
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
  $connect = mysql_connect ("localhost","root","") or die();
       mysql_select_db("hospital")or die(); 
       $appdate=$_POST['fromdate'];  
     $appdate1=$_POST['todate'];                                           
 $str="SELECT * from healthcardholder WHERE createddate between '$appdate' and '$appdate1'";
       $result=mysql_query($str);
       if(mysql_num_rows($result) > 0)
       {
       	echo "<table border='1' class='act'>";
	echo "<tr><td>EDIT</td><td>CHONo</td><td>CARD TYPE CODE</td><td>CARD NO</td><td>CARD VALID FROM</td><td>CARD VALID TO</td><td>ADDRESS</td><td>CREATED BY</td><td>CREATED DATE</td><td>MODIFIED BY</td><td>MODIFIED DATE</td><td>STATUS</td></tr>";
    while($row = mysql_fetch_array($result)) {
	echo "<tr><form action='healthcardtype_edit.php' method='GET'><td>
	<input type='submit' name='edit' value='edit'></td>
	<td><input type='text' name='t1' id='t1' value='".$row['chono']."' readonly='readonly'></td>
	<td><input type='text' name='t2' id='t2' value='".$row['card_type1']."' readonly='readonly'></td>
	<td><input type='text'name='t3' id='t3' value='".$row['cardno']."' readonly='readonly'></td>
	<td><input type='text' name='t4' id='t4' value='".$row['cardvalidfrom']."' readonly='readonly'></td>
	<td><input type='text' name='t5' id='t5' value='".$row['cardvalidto']."' readonly='readonly'></td>
	<td><input type='text' name='t6' id='t6' value='".$row['address']."' readonly='readonly'></td>
	<td><input type='text' name='t7' id='t7' value='".$row['createdby']."' readonly='readonly'></td>
	<td><input type='text' name='t8' id='t8' value='".$row['createddate']."' readonly='readonly'></td>
	<td><input type='text' name='t9' id='t9' value='".$row['modifiedby']."' readonly='readonly'></td>
	<td><input type='text' name='t10' id='t10' value='".$row['modifieddate']."' readonly='readonly'></td>
	<td><input type='text' name='t11' id='t11' value='".$row['status']."' readonly='readonly'></td></form></tr>";
}
echo "</table>";
 }
  else
  {
    ?>
        <script>alert('No data Found');window.location.href='healthcardholdertable.php';</script>
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
$str="select * from healthcardholder";
$result=$conn->query($str);
echo "<table border='1' class='act'>";
	echo "<tr><td>EDIT</td><td>CHONo</td><td>CARD TYPE CODE</td><td>CARD NO</td><td>CARD VALID FROM</td><td>CARD VALID TO</td><td>ADDRESS</td><td>CREATED BY</td><td>CREATED DATE</td><td>MODIFIED BY</td><td>MODIFIED DATE</td><td>STATUS</td></tr>";
    while($row = $result->fetch_assoc()) {
	echo "<tr><form action='healthcardtype_edit.php' method='GET'><td>
	<input type='submit' name='edit' value='edit'></td>
	<td><input type='text' name='t1' id='t1' value='".$row['chono']."' readonly='readonly'></td>
	<td><input type='text' name='t2' id='t2' value='".$row['card_type1']."' readonly='readonly'></td>
	<td><input name='t3' id='t3' value='".$row['cardno']."' readonly='readonly'></td>
	<td><input name='t4' id='t4' value='".$row['cardvalidfrom']."' readonly='readonly'></td>
	<td><input name='t5' id='t5' value='".$row['cardvalidto']."' readonly='readonly'></td>
	<td><input name='t6' id='t6' value='".$row['address']."' readonly='readonly'></td>
	<td><input name='t7' id='t7' value='".$row['createdby']."' readonly='readonly'></td>
	<td><input name='t8' id='t8' value='".$row['createddate']."' readonly='readonly'></td>
	<td><input name='t9' id='t9' value='".$row['modifiedby']."' readonly='readonly'></td>
	<td><input name='t10' id='t10' value='".$row['modifieddate']."' readonly='readonly'></td>
	<td><input name='t11' id='t11' value='".$row['status']."' readonly='readonly'></td></form></tr>";
}
echo "</table>";
}
?>  
</body>
</html>