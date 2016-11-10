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
              <a href="usermaster_search.php">Search</a>
              </li>
                <li><a href="view_usermaster.php">View</a></li>
                <li>                
              <a> <button name="export_excel" formaction="usermaster_excel.php" >Export</button></a>
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
 $str="SELECT * from users_masters WHERE user_createdate between '$appdate' and '$appdate1'";
       $result=mysql_query($str);
       if(mysql_num_rows($result) > 0)
       {
echo "<table border=1 class='act'>";
  echo "
  <td>EDIT</td>
  <td>User Name</td>
    <td>User ID</td>
    <td>Designation</td>
    <td>Designation Code</td>     
    <td>Department Code</td>
    <td>Department Name</td>
    <td>Profile Code</td>   
    <td>Profile Name</td> 
  <td>CREATED BY</td>
  <td>CREATED DATE</td>
  <td>MODIFIED BY</td>
  <td>MODIFIED DATE</td>
  <td>STATUS</td>
  <td></td>
  </tr>";
    while($row = mysql_fetch_array($result)) {
        $sg_dept = $row['user_deptcode'];
        $stde = mysql_query("SELECT dept_name From department_master WHERE dept_code='$sg_dept'");
        $stdep = mysql_fetch_array($stde); 
        $profilena = $row['user_profilecode'];
        $profilenam = mysql_query("SELECT profile_name  From profile WHERE profile_code='$profilena'");
        $profilename = mysql_fetch_array($profilenam);              
?>
  <tr><form action='usermaster_edit.php' method='get'>
  <td><input type='submit' name='edit' value='edit'></td>
  <td><input type='text' name='t1' value='<?php echo $row['user_name']?>' readonly='readonly'></td>
  <td><input type='text' name='t2' value='<?php echo $row['user_id']?>' readonly='readonly'></td>
  <td><input type='text' name='t3' value='<?php echo $row['user_designation']?>' readonly='readonly'></td>
  <td><input type='text' name='t4' value='<?php echo $row['user_designationcode']?>' readonly='readonly'></td>
  <td><input type='text' name='t6' value='<?php echo $row['user_deptcode']?>' readonly='readonly'></td>
  <td><input type='text' name='t7' value='<?php echo $stdep['dept_name']?>' readonly='readonly'></td>
  <td><input type='text' name='t8' value='<?php echo $row['user_profilecode']?>' readonly='readonly'></td>
  <td><input type='text' name='t9' value='<?php echo $profilename['profile_name']?>' readonly='readonly'></td>
  <td><input type='text' name='t12' value='<?php echo $row['user_createby']?>' readonly='readonly'></td>  
  <td><input type='text' name='t13' value='<?php echo $row['user_createdate']?>' readonly='readonly'></td>
  <td><input type='text' name='t14' value='<?php echo $row['user_modifyby']?>' readonly='readonly'></td>
  <td><input type='text' name='t15' value='<?php echo $row['user_modifydate']?>' readonly='readonly'></td>
  <td><input type='text' name='t16' value='<?php echo $row['user_status']?>' readonly='readonly'></td>
  <td><input type='hidden' name='t17' value='<?php echo $row['id']?>'></td>
  <td><input type='hidden' name='t18' value='<?php echo $row['user_sign']?>'></td>
  <td><input type='hidden' name='t19' value='<?php echo $row['user_password']?>'></td>
    <td><input type='hidden' name='t20' value='<?php echo $row['user_scode']?>'></td>
  </form></tr>
  <?php
}
echo "</table>";
  }
  else
  {
    ?>
        <script>alert('No data Found');window.location.href='view_usermaster.php';</script>
        <?php
  }
  
}
else
{

		  $connect = mysql_connect ("localhost","root","") or die();
          mysql_select_db("hospital")or die(); 
		  $str="SELECT * from users_masters";
          $result=mysql_query($str);
echo "<table border=1 class='act'>";
	echo "
	<td>EDIT</td>
	<td>User Name</td>
    <td>User ID</td>
    <td>Designation</td>
    <td>Designation Code</td>     
    <td>Department Code</td>
    <td>Department Name</td>
    <td>Profile Code</td>   
    <td>Profile Name</td> 
	<td>CREATED BY</td>
	<td>CREATED DATE</td>
	<td>MODIFIED BY</td>
	<td>MODIFIED DATE</td>
	<td>STATUS</td>
  <td></td>
	</tr>";
    while($row = mysql_fetch_array($result)) {
    //	$sg_procedure=$row['user_designation'];
   //   if($sg_procedure=='Doctor')
   //   {
    //    $dsgnam = mysql_query("SELECT doc_drname as 'dsg' From doctor WHERE doc_drcode='$sg_procedure'");
   //     $dsgname = mysql_fetch_array($dsgnam);
    //  }
   //   elseif($sg_procedure=='Employee')
   //   {

   //    $dsgnam = mysql_query("SELECT emp_ename as 'dsg' From employee WHERE emp_ecode='$sg_procedure'");
    //    $dsgname = mysql_fetch_array($dsgnam);        
   //   }
    //  else
    //  {
    //    $dsgname=$row['user_designation'];
     // }
        $sg_dept = $row['user_deptcode'];
        $stde = mysql_query("SELECT dept_name From department_master WHERE dept_code='$sg_dept'");
        $stdep = mysql_fetch_array($stde); 
        $profilena = $row['user_profilecode'];
        $profilenam = mysql_query("SELECT profile_name  From profile WHERE profile_code='$profilena'");
        $profilename = mysql_fetch_array($profilenam);              
?>
	<tr><form action='usermaster_edit.php' method='get'>
	<td><input type='submit' name='edit' value='edit'></td>
	<td><input type='text' name='t1' value='<?php echo $row['user_name']?>' readonly='readonly'></td>
	<td><input type='text' name='t2' value='<?php echo $row['user_id']?>' readonly='readonly'></td>
	<td><input type='text' name='t3' value='<?php echo $row['user_designation']?>' readonly='readonly'></td>
	<td><input type='text' name='t4' value='<?php echo $row['user_designationcode']?>' readonly='readonly'></td>
	<td><input type='text' name='t6' value='<?php echo $row['user_deptcode']?>' readonly='readonly'></td>
	<td><input type='text' name='t7' value='<?php echo $stdep['dept_name']?>' readonly='readonly'></td>
	<td><input type='text' name='t8' value='<?php echo $row['user_profilecode']?>' readonly='readonly'></td>
	<td><input type='text' name='t9' value='<?php echo $profilename['profile_name']?>' readonly='readonly'></td>
	<td><input type='text' name='t12' value='<?php echo $row['user_createby']?>' readonly='readonly'></td>	
	<td><input type='text' name='t13' value='<?php echo $row['user_createdate']?>' readonly='readonly'></td>
	<td><input type='text' name='t14' value='<?php echo $row['user_modifyby']?>' readonly='readonly'></td>
	<td><input type='text' name='t15' value='<?php echo $row['user_modifydate']?>' readonly='readonly'></td>
	<td><input type='text' name='t16' value='<?php echo $row['user_status']?>' readonly='readonly'></td>
  <td><input type='hidden' name='t17' value='<?php echo $row['id']?>'></td>
  <td><input type='hidden' name='t18' value='<?php echo $row['user_sign']?>'></td>
  <td><input type='hidden' name='t19' value='<?php echo $row['user_password']?>'></td>
    <td><input type='hidden' name='t20' value='<?php echo $row['user_scode']?>'></td>
	</form></tr>
  <?php
}
echo "</table>";
}
?>  

</body>
</html>