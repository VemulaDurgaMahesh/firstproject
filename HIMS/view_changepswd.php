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
              <a href="changepswd_search.php">
                Search
              </a>
              </li>
                <li><a href="view_changepswd.php">View</a></li>  
                 <li>                
              <a> <button name="export_excel" formaction="changepwd_excel.php" >Export</button></a>
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
 $str="SELECT * from user_changepass WHERE user_createdate between '$appdate' and '$appdate1'";
       $result=mysql_query($str);
       if(mysql_num_rows($result) > 0)
       {
echo "<table border=1 class='act'>";
	echo "<tr>
	
	<td>PasswordCode</td>
	<td>User id</td>
	<td>User Name </td>
	<td> Remarks</td>
	<td>CREATED BY</td>
	<td>CREATED DATE</td>
	<td>STATUS</td>
	</tr>";
    while($row = mysql_fetch_array($result)) {
    	$x=$row['user_id'];
    	$ottname = mysql_query("SELECT user_name FROM users_masters WHERE user_id = '$x'");
                         $optname1 = mysql_fetch_array($ottname);                         
	echo "<tr><form action='changepswd_edit.php' method='get'>
	
	<td><input type='text' name='t7' value='".$row['user_pwdno']."' readonly='readonly'></td>
	<td><input type='text' name='t1' value='".$row['user_id']."' readonly='readonly'></td>
	<td><input type='text' name='ottype' value='".$optname1['user_name']."' readonly='readonly'></td>
	<td><input type='text' name='t9' value='".$row['user_remarks']."' readonly='readonly'></td>
	<td><input type='text' name='t3' value='".$row['user_createdby']."' readonly='readonly'></td>
	<td><input type='text' name='t4'  value='".$row['user_createdate']."' readonly='readonly'></td>
	<td><input type='text' name='t5' value='".$row['user_status']."' readonly='readonly'></td>
	</form></tr>";
}
echo "</table>";
	}
	else
	{
		?>
        <script>alert('No data Found');window.location.href='view_changepswd.php';</script>
        <?php
	}
	
}
else
{
		  $connect = mysql_connect ("localhost","root","") or die();
          mysql_select_db("hospital")or die(); 
		  $str="SELECT * from user_changepass";
          $result=mysql_query($str);
echo "<table border=1 class='act'>";
	echo "<tr>
	
	<td>PasswordCode</td>
	<td>User id</td>
	<td>User Name </td>
	<td> Remarks</td>
	<td>CREATED BY</td>
	<td>CREATED DATE</td>
	<td>MODIFIED BY</td>
	<td>MODIFIED DATE</td>
	<td>STATUS</td>
	</tr>";
    while($row = mysql_fetch_array($result)) {
    	$x=$row['user_id'];
    	$ottname = mysql_query("SELECT user_name FROM users_masters WHERE user_id = '$x'");
                         $optname1 = mysql_fetch_array($ottname);                         
	echo "<tr><form action='changepswd_edit.php' method='get'>
	
	<td><input type='text' name='t7' value='".$row['user_pwdno']."' readonly='readonly'></td>
	<td><input type='text' name='t1' value='".$row['user_id']."' readonly='readonly'></td>
	<td><input type='text' name='ottype' value='".$optname1['user_name']."' readonly='readonly'></td>
	<td><input type='text' name='t9' value='".$row['user_remarks']."' readonly='readonly'></td>
	<td><input type='text' name='t3' value='".$row['user_createdby']."' readonly='readonly'></td>
	<td><input type='text' name='t4'  value='".$row['user_createdate']."' readonly='readonly'></td>
	<td><input type='text' name='t6' value='".$row['user_modifyby']."' readonly='readonly'></td>
	<td><input type='text' name='t8' value='".$row['user_modifydate']."' readonly='readonly'></td>
	<td><input type='text' name='t5' value='".$row['user_status']."' readonly='readonly'></td>
	</form></tr>";
}
echo "</table>";
}
?>  

</body>
</html>