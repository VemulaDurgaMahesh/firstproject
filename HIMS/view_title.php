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
              <a href="title_search.php">
                Search
              </a>
              </li>
                <li><a href="view_title.php">View</a></li>
                 <li>                
              <a> <button name="export_excel" formaction="title_excel.php" >Export</button></a>
              </li> 
              <li>
			<p>	<a><label  for="titlecode" class="act1">&nbsp;&nbsp;&nbsp;&nbsp;From Date</label>
                 <input name="fromdate" type="date"  id="popupDatepicker" placeholder="Pick from date" class="form-control">
                <label for="titlecode" class="act1" >To Date</label>
                <input name="todate" type="date"  id="popupDatepicker1" placeholder="Pick to date" class="form-control">
                <button type="submit" name="submit" class="act1">submit</button></a>
			</p>
			</li>
                </li>                
          </ul>
          </div>
</p>
<?php 
if(isset($_POST['submit']))
{
	$connect = mysql_connect ("localhost","root","") or die();
       mysql_select_db("hospital")or die(); 
       $appdate=$_POST['fromdate'];  
     $appdate1=$_POST['todate'];                                     			 
 $str="SELECT * from title_master WHERE title_createddate between '$appdate' and '$appdate1'";
       $result=mysql_query($str);
       if(mysql_num_rows($result) > 0)
       {
echo "<table border=1 class='act'>";
	echo "<tr>
	<td>EDIT</td>
	<td>Title Code</td>
	<td>Title Name</td>
	<td>CREATED BY</td>
	<td>CREATED DATE</td>
	<td>MODIFIED BY</td>
	<td>MODIFIED DATE</td>
	<td>STATUS</td>
	</tr>";
    while($row = mysql_fetch_array($result)) {
	echo "<tr><form action='title_edit.php' method='get'>
	<td><input type='submit' name='edit' value='edit'></td>
	<td><input type='text' name='t7' value='".$row['title_code']."' readonly='readonly'></td>
	<td><input type='text' name='t1' value='".$row['title_title']."' readonly='readonly'></td>
	<td><input type='text' name='t3' value='".$row['title_createdby']."' readonly='readonly'></td>
	<td><input type='text' name='t4'  value='".$row['title_createddate']."' readonly='readonly'></td>
	<td><input type='text' name='t6' value='".$row['title_modifyby']."' readonly='readonly'></td>
	<td><input type='text' name='t8' value='".$row['title_modifydate']."' readonly='readonly'></td>
	<td><input type='text' name='t5' value='".$row['title_status']."' readonly='readonly'></td>
	</form></tr>";
}
echo "</table>";
	}
	else
	{
		?>
        <script>alert('No data Found');window.location.href='view_title.php';</script>
        <?php
	}
	
}
else
{
		  $connect = mysql_connect ("localhost","root","") or die();
          mysql_select_db("hospital")or die(); 
		  $str="SELECT * from title_master";
          $result=mysql_query($str);
echo "<table border=1 class='act'>";
	echo "<tr>
	<td>EDIT</td>
	<td>Title Code</td>
	<td>Title Name</td>
	<td>CREATED BY</td>
	<td>CREATED DATE</td>
	<td>MODIFIED BY</td>
	<td>MODIFIED DATE</td>
	<td>STATUS</td>
	</tr>";
    while($row = mysql_fetch_array($result)) {
	echo "<tr><form action='title_edit.php' method='get'>
	<td><input type='submit' name='edit' value='edit'></td>
	<td><input type='text' name='t7' value='".$row['title_code']."' readonly='readonly'></td>
	<td><input type='text' name='t1' value='".$row['title_title']."' readonly='readonly'></td>
	<td><input type='text' name='t3' value='".$row['title_createdby']."' readonly='readonly'></td>
	<td><input type='text' name='t4'  value='".$row['title_createddate']."' readonly='readonly'></td>
	<td><input type='text' name='t6' value='".$row['title_modifyby']."' readonly='readonly'></td>
	<td><input type='text' name='t8' value='".$row['title_modifydate']."' readonly='readonly'></td>
	<td><input type='text' name='t5' value='".$row['title_status']."' readonly='readonly'></td>
	</form></tr>";
}
echo "</table>";
}
?>  
</form>
</body>
</html>