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
              <a href="ottype_search.php" >
                Search
              </a>
              </li>
                <li><a href="viewoperation_type.php" class="act1">View</a></li>
                <li>                
              <a> <button name="export_excel" formaction="ottype_excel.php" >Export</button></a>
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
	$connect = mysql_connect ("localhost","root","") or die();
       mysql_select_db("hospital")or die(); 
       $appdate=$_POST['fromdate'];  
     $appdate1=$_POST['todate'];                                     			 
 $str="SELECT * from operation_theatertype WHERE ott_createddate between '$appdate' and '$appdate1'";
       $result=mysql_query($str);
       if(mysql_num_rows($result) > 0)
       {
echo "<table border=1 class='act'>";
	echo "<tr>
	<td>EDIT</td>
	<td>OT Type Code</td>
	<td>OT Type Name</td>
	<td>CREATED BY</td>
	<td>CREATED DATE</td>
	<td>MODIFIED BY</td>
	<td>MODIFIED DATE</td>
	<td>STATUS</td>
	</tr>";
    while($row = mysql_fetch_array($result)) {
	echo "<tr><form action='ottype_edit.php' method='get'>
	<td><input type='submit' name='edit' value='edit'></td>
	<td><input type='text' name='t7' value='".$row['ott_code']."' readonly='readonly'></td>
	<td><input type='text' name='t1' value='".$row['ott_name']."' readonly='readonly'></td>
	<td><input type='text' name='t3' value='".$row['ott_createdby']."' readonly='readonly'></td>
	<td><input type='text' name='t4'  value='".$row['ott_createddate']."' readonly='readonly'></td>
	<td><input type='text' name='t6' value='".$row['ott_modifyby']."' readonly='readonly'></td>
	<td><input type='text' name='t8' value='".$row['ott_modifydate']."' readonly='readonly'></td>
	<td><input type='text' name='t5' value='".$row['ott_status']."' readonly='readonly'></td>
	</form></tr>";
	}
	echo "</table>";
	}
	else
	{
		?>
        <script>alert('No data Found');window.location.href='viewoperation_type.php';</script>
        <?php
	}
	
}
else
{
 $connect = mysql_connect ("localhost","root","") or die();
       mysql_select_db("hospital")or die(); 
 $str="SELECT * from operation_theatertype";
       $result=mysql_query($str);
echo "<table border=1 class='act'>";
	echo "<tr>
	<td>EDIT</td>
	<td>OT Type Code</td>
	<td>OT Type Name</td>
	<td>CREATED BY</td>
	<td>CREATED DATE</td>
	<td>MODIFIED BY</td>
	<td>MODIFIED DATE</td>
	<td>STATUS</td>
	</tr>";
    while($row = mysql_fetch_array($result)) {
	echo "<tr><form action='ottype_edit.php' method='get'>
	<td><input type='submit' name='edit' value='edit'></td>
	<td><input type='text' name='t7' value='".$row['ott_code']."' readonly='readonly'></td>
	<td><input type='text' name='t1' value='".$row['ott_name']."' readonly='readonly'></td>
	<td><input type='text' name='t3' value='".$row['ott_createdby']."' readonly='readonly'></td>
	<td><input type='text' name='t4'  value='".$row['ott_createddate']."' readonly='readonly'></td>
	<td><input type='text' name='t6' value='".$row['ott_modifyby']."' readonly='readonly'></td>
	<td><input type='text' name='t8' value='".$row['ott_modifydate']."' readonly='readonly'></td>
	<td><input type='text' name='t5' value='".$row['ott_status']."' readonly='readonly'></td>
	</form></tr>";
}
echo "</table>";
}
?>  
</body>
</html>