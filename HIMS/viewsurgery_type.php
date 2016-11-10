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
              <a href="surgerytype_search.php">
                Search
              </a>
              </li>
                <li><a href="viewsurgery_type.php">View</a></li>
                <li>
                <a> <button name="export_excel" formaction="surgerytype_excel.php" >Export</button></a>
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
<?php
$connect = mysql_connect ("localhost","root","") or die();
      mysql_select_db("hospital")or die();  
if(isset($_POST['submit']))
{
	 $appdate=$_POST['fromdate'];  
     $appdate1=$_POST['todate'];  	
	 $str="SELECT * from surgerytype_master WHERE st_createddate between '$appdate' and '$appdate1'";
      $result=mysql_query($str);
      if(mysql_num_rows($result) > 0)
       {
	echo "<table border=1 class='act'>";
	echo "<tr>
	<td>EDIT</td>
	<td>surgery Type Code</td>
	<td>surgery Type Name</td>
	<td>CREATED BY</td>
	<td>CREATED DATE</td>
	<td>MODIFIED BY</td>
	<td>MODIFIED DATE</td>
	<td>STATUS</td>
	</tr>";
    while($row = mysql_fetch_array($result)) {
	echo "<tr><form action='surgerytype_edit.php' method='get'>
	<td><input type='submit' name='edit' value='edit'></td>
	<td><input type='text' name='t7' value='".$row['st_code']."' readonly='readonly'></td>
	<td><input type='text' name='t1' value='".$row['st_name']."' readonly='readonly'></td>
	<td><input type='text' name='t3' value='".$row['st_createdby']."' readonly='readonly'></td>
	<td><input type='text' name='t4'  value='".$row['st_createddate']."' readonly='readonly'></td>
	<td><input type='text' name='t6' value='".$row['st_modifyby']."' readonly='readonly'></td>
	<td><input type='text' name='t8' value='".$row['st_modifydate']."' readonly='readonly'></td>
	<td><input type='text' name='t5' value='".$row['st_status']."' readonly='readonly'></td>
	</form></tr>";
	}
	echo "</table>";
	}
	else
	{
		?>
        <script>alert('No data Found');window.location.href='viewsurgery_type.php';</script>
        <?php
	}
}
else
{
	$str="SELECT * from surgerytype_master";
      $result=mysql_query($str);
	echo "<table border=1 class='act'>";
	echo "<tr>
	<td>EDIT</td>
	<td>surgery Type Code</td>
	<td>surgery Type Name</td>
	<td>CREATED BY</td>
	<td>CREATED DATE</td>
	<td>MODIFIED BY</td>
	<td>MODIFIED DATE</td>
	<td>STATUS</td>
	</tr>";
    while($row = mysql_fetch_array($result)) {
	echo "<tr><form action='surgerytype_edit.php' method='get'>
	<td><input type='submit' name='edit' value='edit'></td>
	<td><input type='text' name='t7' value='".$row['st_code']."' readonly='readonly'></td>
	<td><input type='text' name='t1' value='".$row['st_name']."' readonly='readonly'></td>
	<td><input type='text' name='t3' value='".$row['st_createdby']."' readonly='readonly'></td>
	<td><input type='text' name='t4'  value='".$row['st_createddate']."' readonly='readonly'></td>
	<td><input type='text' name='t6' value='".$row['st_modifyby']."' readonly='readonly'></td>
	<td><input type='text' name='t8' value='".$row['st_modifydate']."' readonly='readonly'></td>
	<td><input type='text' name='t5' value='".$row['st_status']."' readonly='readonly'></td>
	</form></tr>";
}
echo "</table>";
	
}
?>  
</form>
</body>
</html>