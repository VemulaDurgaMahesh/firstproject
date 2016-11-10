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
              <a href="wardmaster_search.php">
                Search
              </a>
              </li>
                <li><a href="wardmastertable.php">View</a></li>
                <li>
                <a> <button name="export_excel" formaction="wardmaster_excel.php" >Export</button></a>
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
 $str="SELECT * from ward_master WHERE WARD_CREATEDTIME between '$appdate' and '$appdate1'";
       $result=mysql_query($str);
       if(mysql_num_rows($result) > 0)
       {
       echo "<table border=1 class='act'>";
  echo "<tr><td>EDIT</td><td>WARD CODE</td><td>WARD NAME</td><td>WARD GROUP CODE</td><td>WARD GROUP NAME</td><td>WARD TARIFF</td><td>CREATED BY</td><td>CREATED DATE</td><td>MODIFIED BY</td><td>MODIFIED DATE</td><td>WARD ACTIVE</td></form></tr>";
    while($row = mysql_fetch_array($result)) {
  echo "<tr><form action='wardmaster_edit1.php' method='GET'><td><input type='submit' name='edit' value='edit'></td><td><input type='text' name='t1' id='t1' value='".$row['WARD_CODE']."'></td><td><input type='text' name='t2' id='t2' value='".$row['WARD_NAME']."'></td><td><input name='t3' id='t3' value='".$row['WARD_GRPCODE']."'></td><td><input name='t4' id='t4' value='".$row['WARD_GRPNAME']."'></td><td><input name='t5' id='t5' value='".$row['WARD_TARIFF']."' readonly='readonly'></td><td><input type='text' name='t6' id='t6' value='".$row['WARD_CREATEDBY']."' readonly='readonly'></td><td><input type='text' name='t7' id='t7' value='".$row['WARD_CREATEDTIME']."' readonly='readonly'></td><td><input type='text' name='t8' id='t8' value='".$row['WARD_MODIFIEDBY']."' readonly='readonly'></td><td><input type='text' name='t9' id='t9' value='".$row['WARD_MODIFIEDTIME']."' readonly='readonly'></td><td><input type='text' name='t10' id='t10' value='".$row['WARD_ACTIVE']."' ></td></td></form></tr>";
}
echo "</table>";
  }
  else
  {
    ?>
        <script>alert('No data Found');window.location.href='wardmastertable.php';</script>
        <?php
  }
  
}
else 
{ 
      $connect = mysql_connect ("localhost","root","") or die();
          mysql_select_db("hospital")or die(); 
      $str="SELECT * from ward_master";
          $result=mysql_query($str);
echo "<table border=1 class='act'>";
	echo "<tr><td>EDIT</td><td>WARD CODE</td><td>WARD NAME</td><td>WARD GROUP CODE</td><td>WARD GROUP NAME</td><td>WARD TARIFF</td><td>CREATED BY</td><td>CREATED DATE</td><td>MODIFIED BY</td><td>MODIFIED DATE</td><td>WARD ACTIVE</td></form></tr>";
    while($row = mysql_fetch_array($result)) {
	echo "<tr><form action='wardmaster_edit1.php' method='GET'><td><input type='submit' name='edit' value='edit'></td><td><input type='text' name='t1' id='t1' value='".$row['WARD_CODE']."'></td><td><input type='text' name='t2' id='t2' value='".$row['WARD_NAME']."'></td><td><input name='t3' id='t3' value='".$row['WARD_GRPCODE']."'></td><td><input name='t4' id='t4' value='".$row['WARD_GRPNAME']."'></td><td><input name='t5' id='t5' value='".$row['WARD_TARIFF']."' readonly='readonly'></td><td><input type='text' name='t6' id='t6' value='".$row['WARD_CREATEDBY']."' readonly='readonly'></td><td><input type='text' name='t7' id='t7' value='".$row['WARD_CREATEDTIME']."' readonly='readonly'></td><td><input type='text' name='t8' id='t8' value='".$row['WARD_MODIFIEDBY']."' readonly='readonly'></td><td><input type='text' name='t9' id='t9' value='".$row['WARD_MODIFIEDTIME']."' readonly='readonly'></td><td><input type='text' name='t10' id='t10' value='".$row['WARD_ACTIVE']."' ></td></td></form></tr>";
}
echo "</table>";
}
?>  
</body>
</html>