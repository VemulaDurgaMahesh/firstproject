
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
              <a href="userprofile_search.php">
                Search
              </a>
              </li>
                <li><a href="view_userprofile.php">View</a></li>   <li>                
              <a> <button name="export_excel" formaction="userprofile_excel.php" >Export</button></a>
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
 $str="SELECT * from profile WHERE createdate between '$appdate' and '$appdate1'";
       $result=mysql_query($str);
       if(mysql_num_rows($result) > 0)
       {
       	echo "<table border=1 class='act'>";
	echo "<tr>
	<td>EDIT</td>
	<td>Profile code</td>
	<td>Profile Name</td>
	<td>User Group Code</td>
	<td>User Group Name</td>
	<td>Depaetment Code</td>
	<td>Depaetment Name</td>
	<td>CREATED BY</td>
	<td>CREATED DATE</td>
	<td>MODIFIED BY</td>
	<td>MODIFIED DATE</td>
	<td>STATUS</td>
	</tr>";
    while($row = mysql_fetch_array($result)) {
    	$x1=$row['profile_code'];
    	$str1="SELECT DISTINCT * FROM profile WHERE profile_code='$x1'";
          $result1=mysql_query($str1);
          $row1 = mysql_fetch_array($result1);
    	$x=$row1['dept_code'];
    	$y=$row1['user_groupcode'];
    	$ottname = mysql_query("SELECT dept_name FROM department_master WHERE dept_code = '$x'");
         $optname1 = mysql_fetch_array($ottname);  
        $usergname = mysql_query("SELECT user_categoryname FROM user_groupmaster WHERE user_categorycode = '$y'");
        $usergname1 = mysql_fetch_array($usergname);                       
	echo "<tr><form action='userprofile_edit.php' method='get'>
	<td><input type='submit' name='edit' value='edit'></td>
	<td><input type='text' name='t7' value='".$row['profile_code']."' readonly='readonly'></td>
	<td><input type='text' name='t1' value='".$row1['profile_name']."' readonly='readonly'></td>
	<td><input type='text' name='ottype' value='".$row1['user_groupcode']."' readonly='readonly'></td>	
	<td><input type='text' name='t9' value='".$usergname1['user_categoryname']."' readonly='readonly'></td>
	<td><input type='text' name='ottype1' value='".$row1['dept_code']."' readonly='readonly'></td>
	<td><input type='text' name='t10' value='".$optname1['dept_name']."' readonly='readonly'></td>
	<td><input type='text' name='t3' value='".$row1['createby']."' readonly='readonly'></td>
	<td><input type='text' name='t4'  value='".$row1['createdate']."' readonly='readonly'></td>
	<td><input type='text' name='t6' value='".$row1['modifyby']."' readonly='readonly'></td>
	<td><input type='text' name='t8' value='".$row1['modifydate']."' readonly='readonly'></td>
	<td><input type='text' name='t5' value='".$row1['status']."' readonly='readonly'></td>
	</form></tr>";
}
echo "</table>";
}
else
{
?>  
 <script>alert('No data Found');window.location.href='view_usergroup.php';</script>
        <?php
  }
  
}
else 
{	
 
		  $connect = mysql_connect ("localhost","root","") or die();
          mysql_select_db("hospital")or die(); 
		  $str="SELECT DISTINCT profile_code FROM profile";
          $result=mysql_query($str);
echo "<table border=1 class='act'>";
	echo "<tr>
	<td>EDIT</td>
	<td>Profile code</td>
	<td>Profile Name</td>
	<td>User Group Code</td>
	<td>User Group Name</td>
	<td>Depaetment Code</td>
	<td>Depaetment Name</td>
	<td>CREATED BY</td>
	<td>CREATED DATE</td>
	<td>MODIFIED BY</td>
	<td>MODIFIED DATE</td>
	<td>STATUS</td>
	</tr>";
    while($row = mysql_fetch_array($result)) {
    	$x1=$row['profile_code'];
    	$str1="SELECT DISTINCT * FROM profile WHERE profile_code='$x1'";
          $result1=mysql_query($str1);
          $row1 = mysql_fetch_array($result1);
    	$x=$row1['dept_code'];
    	$y=$row1['user_groupcode'];
    	$ottname = mysql_query("SELECT dept_name FROM department_master WHERE dept_code = '$x'");
                         $optname1 = mysql_fetch_array($ottname);  
        $usergname = mysql_query("SELECT user_categoryname FROM user_groupmaster WHERE user_categorycode = '$y'");
                         $usergname1 = mysql_fetch_array($usergname);                       
	echo "<tr><form action='userprofile_edit.php' method='get'>
	<td><input type='submit' name='edit' value='edit'></td>
	<td><input type='text' name='t7' value='".$row['profile_code']."' readonly='readonly'></td>
	<td><input type='text' name='t1' value='".$row1['profile_name']."' readonly='readonly'></td>
	<td><input type='text' name='ottype' value='".$row1['user_groupcode']."' readonly='readonly'></td>	
	<td><input type='text' name='t9' value='".$usergname1['user_categoryname']."' readonly='readonly'></td>
	<td><input type='text' name='ottype1' value='".$row1['dept_code']."' readonly='readonly'></td>
	<td><input type='text' name='t10' value='".$optname1['dept_name']."' readonly='readonly'></td>
	<td><input type='text' name='t3' value='".$row1['createby']."' readonly='readonly'></td>
	<td><input type='text' name='t4'  value='".$row1['createdate']."' readonly='readonly'></td>
	<td><input type='text' name='t6' value='".$row1['modifyby']."' readonly='readonly'></td>
	<td><input type='text' name='t8' value='".$row1['modifydate']."' readonly='readonly'></td>
	<td><input type='text' name='t5' value='".$row1['status']."' readonly='readonly'></td>
	</form></tr>";
}
echo "</table>";
}
?>  

</body>
</html>