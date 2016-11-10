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
              <a href="usergroup_search.php">
                Search
              </a>
              </li>
                <li><a href="view_usergroup.php">View</a></li>    <li>                
              <a> <button name="export_excel" formaction="usergroup_excel.php" >Export</button></a>
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
 $str="SELECT * from user_groupmaster WHERE user_groupcreatedate between '$appdate' and '$appdate1'";
       $result=mysql_query($str);
       if(mysql_num_rows($result) > 0)
       {
       	echo "<table border=1 class='act'>";
	echo "<tr>
	<td>EDIT</td>	
	<td>User Category Code</td>
	<td>User Category Name</td>
	<td>Dept Name </td>
	<td>Dept code</td>
	<td>CREATED BY</td>
	<td>CREATED DATE</td>
	<td>MODIFIED BY</td>
	<td>MODIFIED DATE</td>
	<td>STATUS</td>
	</tr>";
	while($row = mysql_fetch_array($result)) {
    	$x=$row['user_categorydeptcode'];
    	$ottname = mysql_query("SELECT dept_name FROM department_master WHERE dept_code = '$x'");
         $optname1 = mysql_fetch_array($ottname);
   echo"
    <tr><form action='usergroup_edit.php' method='get'>
	<td><input type='submit' name='edit' value='edit'></td>
	<td><input type='hidden' name='ed' value='".$row['id']."'></td>
	<td><input type='text' name='t7' value='".$row['user_categorycode']."' readonly='readonly'></td>
	<td><input type='text' name='t1' value='".$row['user_categoryname']."' readonly='readonly'></td>
	<td><input type='text' name='ottype' value='".$optname1['dept_name']."' readonly='readonly'></td>
	<td><input type='text' name='t9' value='".$row['user_categorydeptcode']."' readonly='readonly'></td>
	<td><input type='text' name='t3' value='".$row['user_groupcreateby']."' readonly='readonly'></td>
	<td><input type='text' name='t4'  value='".$row['user_groupcreatedate']."' readonly='readonly'></td>
	<td><input type='text' name='t6' value='".$row['user_groupmodifyby']."' readonly='readonly'></td>
	<td><input type='text' name='t8' value='".$row['user_groupmodifydate']."' readonly='readonly'></td>
	<td><input type='text' name='t5' value='".$row['user_categorystatus']."' readonly='readonly'></td>
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
		  $str="SELECT * from user_groupmaster";
          $result=mysql_query($str);
echo "<table border=1 class='act'>";
	echo "<tr>
	<td>EDIT</td>
	<td></td>
	<td>User Category Code</td>
	<td>User Category Name</td>
	<td>Dept Name </td>
	<td>Dept code</td>
	<td>CREATED BY</td>
	<td>CREATED DATE</td>
	<td>MODIFIED BY</td>
	<td>MODIFIED DATE</td>
	<td>STATUS</td>
	</tr>";
    while($row = mysql_fetch_array($result)) {
    	$x=$row['user_categorydeptcode'];
    	$ottname = mysql_query("SELECT dept_name FROM department_master WHERE dept_code = '$x'");
                         $optname1 = mysql_fetch_array($ottname);  
          echo"                      
	<tr><form action='usergroup_edit.php' method='get'>
	<td><input type='submit' name='edit' value='edit'></td>
	<td><input type='hidden' name='ed' value='".$row['id']."'></td>
	<td><input type='text' name='t7' value='".$row['user_categorycode']."' readonly='readonly'></td>
	<td><input type='text' name='t1' value='".$row['user_categoryname']."' readonly='readonly'></td>
	<td><input type='text' name='ottype' value='".$optname1['dept_name']."' readonly='readonly'></td>
	<td><input type='text' name='t9' value='".$row['user_categorydeptcode']."' readonly='readonly'></td>
	<td><input type='text' name='t3' value='".$row['user_groupcreateby']."' readonly='readonly'></td>
	<td><input type='text' name='t4'  value='".$row['user_groupcreatedate']."' readonly='readonly'></td>
	<td><input type='text' name='t6' value='".$row['user_groupmodifyby']."' readonly='readonly'></td>
	<td><input type='text' name='t8' value='".$row['user_groupmodifydate']."' readonly='readonly'></td>
	<td><input type='text' name='t5' value='".$row['user_categorystatus']."' readonly='readonly'></td>
	</form></tr>";

}
echo "</table>";
}
?>  
</body>
</html>