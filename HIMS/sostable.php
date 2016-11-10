<?php include('menu.php'); ?>
<html>
<style>
    .act { color:#F00;}
    .act1 {color:#2E2EFE;} 
</style>
<body>
<form action="" method="post">
<p>
	<ul class="drop_menu">
               <li>
              <a href="sostable_search.php">
                Search
              </a>
              </li>
                <li><a href="sostable.php">View</a></li>
                 <li>
                    <a> <button name="export_excel" formaction="sostable_excel.php" >Export</button></a>
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
 $str="SELECT * from soc_masters WHERE soc_createdtime between '$appdate' and '$appdate1'";
       $result=mysql_query($str);
       if(mysql_num_rows($result) > 0)
       {
        echo "<table border='1' class='act'>";
  echo "<tr><td>SERVICE TYPE</td>
  <td>CODE</td>
<td>TARRIF NAME</td>
<td>SERVICE GROUP NAME</td>
<td>SERVICE GROUP CODE BILLING HEAD</td>
<td>SERVICE NAME</td>
<td>SERVICE CODE</td>
<td>CHARGE</td>
<td>HOSPITAL PERCENTAGE</td>
<td>HOSPITAL CHARGE</td>
<td>DOCTOR PERCENTAGE</td>
<td>DOCTOR CHARGE</td>
<td>INSTRUCTIONS</td>
<td>APPLICATION FOR</td>
<td>CREATED BY</td>
<td>CREATED TIME</td>
<td>MODIFIED BY</td>
<td>MODIFIED TIME</td>
<td>STATUS</td>
</tr>";
    while($row = mysql_fetch_array($result)) 
    {
  echo "<tr>

<td><input type='text' name='t1' id='t1' value='".$row['soc_type']."' readonly='readonly'></td>
<td><input type='text' name='t2' id='t2' value='".$row['soc_code']."' readonly='readonly'></td>
<td><input type='text' name='t3' id='t3' value='".$row['soc_tariffname']."' readonly='readonly'></td>
<td><input type='text' name='t4' id='t4' value='".$row['soc_servicegroupname']."' readonly='readonly'></td>
<td><input type='text' name='t5' id='t5' value='".$row['soc_billinghead']."' readonly='readonly'></td>
<td><input type='text' name='t6' id='t6' value='".$row['soc_servicename']."' readonly='readonly'></td>
<td><input type='text' name='t7' id='t7' value='".$row['soc_servicecode']."' readonly='readonly'></td>
<td><input type='text' name='t8' id='t8' value='".$row['soc_charge']."' readonly='readonly'></td>
<td><input type='text' name='t9' id='t9' value='".$row['soc_hospitalper']."' readonly='readonly'></td>
<td><input type='text' name='t10' id='t10' value='".$row['soc_hospitalcharge']."' readonly='readonly'></td>
<td><input type='text' name='t11' id='t11' value='".$row['soc_doctorper']."' readonly='readonly'></td>
<td><input type='text' name='t12' id='t12' value='".$row['soc_doctorcharge']."' readonly='readonly'></td>
<td><input type='text' name='t13' id='t13' value='".$row['soc_instructions']."' readonly='readonly'></td>
<td><input type='text' name='t14' id='t14' value='".$row['soc_applicationfor']."' readonly='readonly'></td>
<td><input type='text' name='t15' id='t15' value='".$row['soc_createdby']."' readonly='readonly'></td>
<td><input type='text' name='t16' id='t16' value='".$row['soc_createdtime']."' readonly='readonly'></td>
<td><input type='text' name='t17' id='t17' value='".$row['soc_modifiedby']."' readonly='readonly'></td>
<td><input type='text' name='t18' id='t18' value='".$row['soc_modifiedtime']."' readonly='readonly'></td>
<td><input type='text' name='t19' id='t19' value='".$row['soc_status']."' readonly='readonly'></td>
</tr>";
}
echo "</table>";
}
else
  {
  ?>
        <script>alert('No data Found');window.location.href='sostable.php';</script>
        <?php
  }
}
else
{ 
$connect = mysql_connect ("localhost","root","") or die();
          mysql_select_db("hospital")or die(); 
      $str="SELECT * from soc_masters";
      $result=mysql_query($str);
echo "<table border='1' class='act'>";
	echo "<tr>
  <td>SERVICE TYPE</td>
	<td>CODE</td>
<td>TARRIF NAME</td>
<td>SERVICE GROUP NAME</td>
<td>SERVICE GROUP CODE BILLING HEAD</td>
<td>SERVICE NAME</td>
<td>SERVICE CODE</td>
<td>CHARGE</td>
<td>HOSPITAL PERCENTAGE</td>
<td>HOSPITAL CHARGE</td>
<td>DOCTOR PERCENTAGE</td>
<td>DOCTOR CHARGE</td>
<td>INSTRUCTIONS</td>
<td>APPLICATION FOR</td>
<td>CREATED BY</td>
<td>CREATED TIME</td>
<td>MODIFIED BY</td>
<td>MODIFIED TIME</td>
<td>STATUS</td>
</tr>";
    while($row = mysql_fetch_array($result)) {
	echo "<tr>
<td><input type='text' name='t1' id='t1' value='".$row['soc_type']."' readonly='readonly'></td>
<td><input type='text' name='t2' id='t2' value='".$row['soc_code']."' readonly='readonly'></td>
<td><input type='text' name='t3' id='t3' value='".$row['soc_tariffname']."' readonly='readonly'></td>
<td><input type='text' name='t4' id='t4' value='".$row['soc_servicegroupname']."' readonly='readonly'></td>
<td><input type='text' name='t5' id='t5' value='".$row['soc_billinghead']."' readonly='readonly'></td>
<td><input type='text' name='t6' id='t6' value='".$row['soc_servicename']."' readonly='readonly'></td>
<td><input type='text' name='t7' id='t7' value='".$row['soc_servicecode']."' readonly='readonly'></td>
<td><input type='text' name='t8' id='t8' value='".$row['soc_charge']."' readonly='readonly'></td>
<td><input type='text' name='t9' id='t9' value='".$row['soc_hospitalper']."' readonly='readonly'></td>
<td><input type='text' name='t10' id='t10' value='".$row['soc_hospitalcharge']."' readonly='readonly'></td>
<td><input type='text' name='t11' id='t11' value='".$row['soc_doctorper']."' readonly='readonly'></td>
<td><input type='text' name='t12' id='t12' value='".$row['soc_doctorcharge']."' readonly='readonly'></td>
<td><input type='text' name='t13' id='t13' value='".$row['soc_instructions']."' readonly='readonly'></td>
<td><input type='text' name='t14' id='t14' value='".$row['soc_applicationfor']."' readonly='readonly'></td>
<td><input type='text' name='t15' id='t15' value='".$row['soc_createdby']."' readonly='readonly'></td>
<td><input type='text' name='t16' id='t16' value='".$row['soc_createdtime']."' readonly='readonly'></td>
<td><input type='text' name='t17' id='t17' value='".$row['soc_modifiedby']."' readonly='readonly'></td>
<td><input type='text' name='t18' id='t18' value='".$row['soc_modifiedtime']."' readonly='readonly'></td>
<td><input type='text' name='t19' id='t19' value='".$row['soc_status']."' readonly='readonly'></td>
</form></tr>";
}
echo "</table>";
}
?>  
</body>
</html>