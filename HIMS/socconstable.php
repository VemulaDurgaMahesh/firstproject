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
              <a href="sourceofconsultation_search.php">
                Search
              </a>
              </li>
                <li><a href="socconstable.php">View</a></li>
                <li>
                <a> <button name="export_excel" formaction="socconstable_excel.php" >Export</button></a>
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
 $str="SELECT * from soc_consultation WHERE soc_createddate between '$appdate' and '$appdate1'";
       $result=mysql_query($str);
       if(mysql_num_rows($result) > 0)
       {
        echo "<table border=1 class='act'>";
  echo "<tr><td>EDIT</td>
  <td>TARRIF NAME</td>
<td>CONSULTANT CODE</td>
<td>CONSULTANCY NAME</td>
<td>NORMAL CHARGES </td>
<td>NORMAL HOSPITAL CHARGES</td>
<td>EMEREGENCY CHARGES</td>
<td>EMEREGENCY HOSPITAL CHARGES</td>
<td>REVISIT CHARGES</td>
<td>REVISIT HOSPITAL CHAREGES</td>
<td>REGISTRATION FEE</td>
<td>NUMBER OF DAYS</td>
<td>NUMBER OF VISITS</td>
<td>CREATED BY</td>
<td>CREATED DATE</td>
<td>MODIFIED BY</td>
<td>MODIFIEDDATE</td>
<td>STATUS</td>
</tr>";
    while($row = mysql_fetch_array($result)) {
  echo "<tr><form action='sourceofconsultation_edit.php' method='GET'><td><input type='submit' value='Edit'></td><td><input type='text' name='t1' id='t1' value='".$row['soc_tname']."' readonly='readonly'></td>
<td><input type='text' name='t2' id='t2' value='".$row['soc_concode']."' readonly='readonly'></td>
<td><input type='text' name='t3' id='t3' value='".$row['soc_conname']."' readonly='readonly'></td>
<td><input type='text' name='t4' id='t4' value='".$row['soc_nch']."' readonly='readonly'></td>
<td><input type='text' name='t5' id='t5' value='".$row['soc_nchch']."' readonly='readonly'></td>
<td><input type='text' name='t6' id='t6' value='".$row['soc_emch']."' readonly='readonly'></td>
<td><input type='text' name='t7' id='t7' value='".$row['soc_emhch']."' readonly='readonly'></td>
<td><input type='text' name='t8' id='t8' value='".$row['soc_rech']."' readonly='readonly'></td>
<td><input type='text' name='t9' id='t9' value='".$row['soc_rehch']."' readonly='readonly'></td>
<td><input type='text' name='t10' id='t10' value='".$row['soc_regfee']."' readonly='readonly'></td>
<td><input type='text' name='t11' id='t11' value='".$row['soc_nod']."' readonly='readonly'></td>
<td><input type='text' name='t12' id='t12' value='".$row['soc_nov']."' readonly='readonly'></td>
<td><input type='text' name='t13' id='t13' value='".$row['soc_createdby']."' readonly='readonly'></td>
<td><input type='text' name='t14' id='t14' value='".$row['soc_createddate']."' readonly='readonly'></td>
<td><input type='text' name='t15' id='t15' value='".$row['soc_modifiedby']."' readonly='readonly'></td>
<td><input type='text' name='t16' id='t16' value='".$row['soc_modifieddate']."' readonly='readonly'></td>
<td><input type='text' name='t17' id='t17' value='".$row['soc_status']."' readonly='readonly'></td>
</form></tr>";
}
echo "</table>";
  }
  else
  {
    ?>
        <script>alert('No data Found');window.location.href='socconstable.php';</script>
        <?php
  }
  
}
else 
{
$connect = mysql_connect ("localhost","root","") or die();
          mysql_select_db("hospital")or die(); 
      $str="SELECT * from soc_consultation";
          $result=mysql_query($str);
echo "<table border=1 class='act'>";
	echo "<tr><td>EDIT</td>
  <td>TARRIF NAME</td>
<td>CONSULTANT CODE</td>
<td>CONSULTANCY NAME</td>
<td>NORMAL CHARGES </td>
<td>NORMAL HOSPITAL CHARGES</td>
<td>EMEREGENCY CHARGES</td>
<td>EMEREGENCY HOSPITAL CHARGES</td>
<td>REVISIT CHARGES</td>
<td>REVISIT HOSPITAL CHAREGES</td>
<td>REGISTRATION FEE</td>
<td>NUMBER OF DAYS</td>
<td>NUMBER OF VISITS</td>
<td>CREATED BY</td>
<td>CREATED DATE</td>
<td>MODIFIED BY</td>
<td>MODIFIEDDATE</td>
<td>STATUS</td>
</tr>";
    while($row =  mysql_fetch_array($result)) {
	echo "<tr><form action='sourceofconsultation_edit.php' method='GET'><td><input type='submit' value='Edit'></td><td><input type='text' name='t1' id='t1' value='".$row['soc_tname']."' readonly='readonly'></td>
<td><input type='text' name='t2' id='t2' value='".$row['soc_concode']."' readonly='readonly'></td>
<td><input type='text' name='t3' id='t3' value='".$row['soc_conname']."' readonly='readonly'></td>
<td><input type='text' name='t4' id='t4' value='".$row['soc_nch']."' readonly='readonly'></td>
<td><input type='text' name='t5' id='t5' value='".$row['soc_nchch']."' readonly='readonly'></td>
<td><input type='text' name='t6' id='t6' value='".$row['soc_emch']."' readonly='readonly'></td>
<td><input type='text' name='t7' id='t7' value='".$row['soc_emhch']."' readonly='readonly'></td>
<td><input type='text' name='t8' id='t8' value='".$row['soc_rech']."' readonly='readonly'></td>
<td><input type='text' name='t9' id='t9' value='".$row['soc_rehch']."' readonly='readonly'></td>
<td><input type='text' name='t10' id='t10' value='".$row['soc_regfee']."' readonly='readonly'></td>
<td><input type='text' name='t11' id='t11' value='".$row['soc_nod']."' readonly='readonly'></td>
<td><input type='text' name='t12' id='t12' value='".$row['soc_nov']."' readonly='readonly'></td>
<td><input type='text' name='t13' id='t13' value='".$row['soc_createdby']."' readonly='readonly'></td>
<td><input type='text' name='t14' id='t14' value='".$row['soc_createddate']."' readonly='readonly'></td>
<td><input type='text' name='t15' id='t15' value='".$row['soc_modifiedby']."' readonly='readonly'></td>
<td><input type='text' name='t16' id='t16' value='".$row['soc_modifieddate']."' readonly='readonly'></td>
<td><input type='text' name='t17' id='t17' value='".$row['soc_status']."' readonly='readonly'></td>
</form></tr>";
}
echo "</table>";
}
?>  
</body>
</html>