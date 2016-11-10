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
              <a href="authorization_search.php">
                Search
              </a>
              </li>
                <li><a href="authorization_table.php">View</a></li>
                <li>                
              <a> <button name="export_excel" formaction="authorization_excel.php" >Export</button></a>
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
 $str="SELECT * from author_master WHERE createddate between '$appdate' and '$appdate1'";
       $result=mysql_query($str);
       if(mysql_num_rows($result) > 0)
       {
echo "<table border=1 class='act'>";
  echo "<tr><td>EDIT</td><td>designtn</td><td>am_code</td><td>refcode</td><td>athname</td><td>opcnscn</td><td>ipcnscn</td><td>vocherapproval</td><td>opcrdt</td><td>ipcrdt</td><td>mfdapdtrans</td><td>opcncln</td><td>ipcncln</td><td>dscgewostlmnt</td><td>opphcnscn</td><td>patntbillcnvrsn</td><td>fnbdue</td><td>opphdue</td><td>fnbcnscn</td><td>createdby</td><td>createddate</td><td>modifyby</td><td>modifydate</td><td>status</td></form></tr>";
     while($row = mysql_fetch_array($result)) {
  echo "<tr><form action='authorizationmaster_edit.php' method='GET'><td><input type='submit' name='edit' value='edit'></td>
  <td><input type='text' name='t1' id='t1' value='".$row['designtn']."' readonly='readonly'></td><td><input type='text' name='t2' id='t2' value='".$row['am_code']."' readonly='readonly'></td><td><input type='text' name='t3' id='t3' value='".$row['refcode']."' readonly='readonly'></td><td><input type='text' name='t4' id='t4' value='".$row['athname']."' readonly='readonly'></td><td><input type='text' name='t5' id='t5' value='".$row['opcnscn']."' readonly='readonly'></td><td><input type='text' name='t6' id='t6' value='".$row['ipcnscn']."' readonly='readonly'></td><td><input type='text' name='t7' id='t7' value='".$row['vocherapproval']."' readonly='readonly'></td><td><input type='text' name='t8' id='t8' value='".$row['opcrdt']."' readonly='readonly'></td><td><input type='text' name='t9' id='t9' value='".$row['ipcrdt']."' readonly='readonly'></td><td><input type='text' name='t10' id='t10' value='".$row['mfdapdtrans']."' readonly='readonly'></td><td><input type='text' name='t11' id='t11' value='".$row['opcncln']."' readonly='readonly'></td><td><input type='text' name='t12' id='t12' value='".$row['ipcncln']."' readonly='readonly'></td>
    <td><input type='text' name='t13' id='t13' value='".$row['dscgewostlmnt']."' readonly='readonly'></td><td><input type='text' name='t14' id='t14' value='".$row['opphcnscn']."' readonly='readonly'></td><td><input type='text' name='t15' id='t15' value='".$row['patntbillcnvrsn']."' readonly='readonly'></td><td><input type='text' name='t16' id='t16' value='".$row['fnbdue']."' readonly='readonly'></td><td><input type='text' name='t17' id='t17' value='".$row['opphdue']."' readonly='readonly'></td><td><input type='text' name='t18' id='t18' value='".$row['fnbcnscn']."' readonly='readonly'></td><td><input type='text' name='t19' id='t19' value='".$row['createdby']."' readonly='readonly'></td><td><input type='text' name='t20' id='t20' value='".$row['createddate']."' readonly='readonly'></td><td><input type='text' name='t21' id='t21' value='".$row['modifyby']."' readonly='readonly'></td><td><input type='text' name='t22' id='t22' value='".$row['modifydate']."' readonly='readonly'></td><td><input type='text' name='t23' id='t23' value='".$row['status']."' readonly='readonly'></td></form></tr>";
}
echo "</table>";
  }
  else
  {
    ?>
        <script>alert('No data Found');window.location.href='authorization_table.php';</script>
        <?php
  }
  
}
else
{
  $connect = mysql_connect ("localhost","root","") or die();
  mysql_select_db("hospital")or die(); 
$str="SELECT * from author_master ";
$result=mysql_query($str);
echo "<table border=1 class='act'>";
	echo "<tr><td>EDIT</td><td>designtn</td><td>am_code</td><td>refcode</td><td>athname</td><td>opcnscn</td><td>ipcnscn</td><td>vocherapproval</td><td>opcrdt</td><td>ipcrdt</td><td>mfdapdtrans</td><td>opcncln</td><td>ipcncln</td><td>dscgewostlmnt</td><td>opphcnscn</td><td>patntbillcnvrsn</td><td>fnbdue</td><td>opphdue</td><td>fnbcnscn</td><td>createdby</td><td>createddate</td><td>modifyby</td><td>modifyddate</td><td>status</td></form></tr>";
     while($row = mysql_fetch_array($result)) {
	echo "<tr><form action='authorizationmaster_edit.php' method='GET'><td><input type='submit' name='edit' value='edit'></td><td><input type='text' name='t1' id='t1' value='".$row['designtn']."' readonly='readonly'></td><td><input type='text' name='t2' id='t2' value='".$row['am_code']."'></td><td><input type='text' name='t3' id='t3' value='".$row['refcode']."'></td><td><input type='text' name='t4' id='t4' value='".$row['athname']."' readonly='readonly'></td><td><input type='text' name='t5' id='t5' value='".$row['opcnscn']."' readonly='readonly'></td><td><input type='text' name='t6' id='t6' value='".$row['ipcnscn']."' readonly='readonly'></td><td><input type='text' name='t7' id='t7' value='".$row['vocherapproval']."' readonly='readonly'></td><td><input type='text' name='t8' id='t8' value='".$row['opcrdt']."' readonly='readonly'></td><td><input type='text' name='t9' id='t9' value='".$row['ipcrdt']."' readonly='readonly'></td><td><input type='text' name='t10' id='t10' value='".$row['mfdapdtrans']."' readonly='readonly'></td><td><input type='text' name='t11' id='t11' value='".$row['opcncln']."' readonly='readonly'></td><td><input type='text' name='t12' id='t12' value='".$row['ipcncln']."' readonly='readonly'></td>
    <td><input type='text' name='t13' id='t13' value='".$row['dscgewostlmnt']."' readonly='readonly'></td><td><input type='text' name='t14' id='t14' value='".$row['opphcnscn']."' readonly='readonly'></td><td><input type='text' name='t15' id='t15' value='".$row['patntbillcnvrsn']."' readonly='readonly'></td><td><input type='text' name='t16' id='t16' value='".$row['fnbdue']."' readonly='readonly'></td><td><input type='text' name='t17' id='t17' value='".$row['opphdue']."' readonly='readonly'></td><td><input type='text' name='t18' id='t18' value='".$row['fnbcnscn']."' readonly='readonly'></td><td><input type='text' name='t19' id='t19' value='".$row['createdby']."' readonly='readonly'></td><td><input type='text' name='t20' id='t20' value='".$row['createddate']."' readonly='readonly'></td><td><input type='text' name='t21' id='t21' value='".$row['modifyby']."' readonly='readonly'></td><td><input type='text' name='t22' id='t22' value='".$row['modifydate']."' readonly='readonly'></td><td><input type='text' name='t23' id='t23' value='".$row['status']."' readonly='readonly'></td></form></tr>";
}
echo "</table>";
}
?>  
</body>
</html>