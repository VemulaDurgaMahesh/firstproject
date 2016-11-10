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
              <a href="roommaster_search.php">
                Search
              </a>
              </li>
                <li><a href="roommastertable.php">View</a></li>
          		<li>
                <a> <button name="export_excel" formaction="roommaster_excel.php" >Export</button></a>
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
 $str="SELECT * from room_master WHERE ROOM_CREATEDATE between '$appdate' and '$appdate1'";
       $result=mysql_query($str);
       if(mysql_num_rows($result) > 0)
       {
        echo "<table border='1' class='act'>";
  echo "<tr><td>EDIT</td><td>WARD CODE</td><td>WARD NAME</td><td>ROOM CODE</td><td>ROOM BLOCK</td><td>ROOM BEDNUMBER</td><td>ROOM LEVEL</td><td>ROOM EXTEN</td><td>ROOM NURSE</td><td>CREATED BY</td><td>CREATED DATE</td><td>MODIFIED BY</td><td>MODIFIED DATE</td><td>ROOM STATUS</td></form></tr>";
    while($row = mysql_fetch_array($result)) {
  echo "<tr><form action='roommaster_edit.php' method='GET'><td><input type='submit' value='Edit'></td><td><input type='text' name='t1' id='t1' value='".$row['ROOM_WARDCODE']."' readonly='readonly'></td><td><input type='text' name='t2' id='t2' value='".$row['ROOM_WARDNAME']."'></td><td><input name='t3' id='t3' value='".$row['ROOM_CODE']."'></td><td><input name='t4' id='t4' value='".$row['ROOM_BLOCK']."'></td><td><input name='t5' id='t5' value='".$row['ROOM_BEDNO']."'></td><td><input type='text' name='t6' id='t6' value='".$row['ROOM_LEVEL']."'></td><td><input type='text' name='t7' id='t7' value='".$row['ROOM_EXTEN']."'></td><td><input type='text' name='t8' id='t8' value='".$row['ROOM_NURSE']."'></td><td><input type='text' name='t9' id='t9' value='".$row['ROOM_CREATEBY']."' readonly='readonly'></td><td><input type='text' name='t10' id='t10' value='".$row['ROOM_CREATEDATE']."' readonly='readonly'></td><td><input type='text' name='t11' id='t11' value='".$row['ROOM_MODIFYBY']."' readonly='readonly'></td><td><input type='text' name='t12' id='t12' value='".$row['ROOM_MODIFYDATE']."' readonly='readonly'></td><td><input type='text' name='t13' id='t13' value='".$row['ROOM_STATUS']."' readonly='readonly'></td></form></tr>";
}
echo "</table>";
}
  else
  {
    ?>
        <script>alert('No data Found');window.location.href='roommastertable.php';</script>
        <?php
  }
  
}
else 
{ 
$connect = mysql_connect ("localhost","root","") or die();
          mysql_select_db("hospital")or die(); 
      $str="SELECT * from room_master";
      $result=mysql_query($str);
echo "<table border='1' class='act'>";
	echo "<tr><td>EDIT</td><td>WARD CODE</td><td>WARD NAME</td><td>ROOM CODE</td><td>ROOM BLOCK</td><td>ROOM BEDNUMBER</td><td>ROOM LEVEL</td><td>ROOM EXTEN</td><td>ROOM NURSE</td><td>CREATED BY</td><td>CREATED DATE</td><td>MODIFIED BY</td><td>MODIFIED DATE</td><td>ROOM STATUS</td></form></tr>";
    while($row = mysql_fetch_array($result)) {
	echo "<tr><form action='roommaster_edit.php' method='GET'><td><input type='submit' value='Edit'></td><td><input type='text' name='t1' id='t1' value='".$row['ROOM_WARDCODE']."' readonly='readonly'></td><td><input type='text' name='t2' id='t2' value='".$row['ROOM_WARDNAME']."'></td><td><input name='t3' id='t3' value='".$row['ROOM_CODE']."'></td><td><input name='t4' id='t4' value='".$row['ROOM_BLOCK']."'></td><td><input name='t5' id='t5' value='".$row['ROOM_BEDNO']."'></td><td><input type='text' name='t6' id='t6' value='".$row['ROOM_LEVEL']."'></td><td><input type='text' name='t7' id='t7' value='".$row['ROOM_EXTEN']."'></td><td><input type='text' name='t8' id='t8' value='".$row['ROOM_NURSE']."'></td><td><input type='text' name='t9' id='t9' value='".$row['ROOM_CREATEBY']."' readonly='readonly'></td><td><input type='text' name='t10' id='t10' value='".$row['ROOM_CREATEDATE']."' readonly='readonly'></td><td><input type='text' name='t11' id='t11' value='".$row['ROOM_MODIFYBY']."' readonly='readonly'></td><td><input type='text' name='t12' id='t12' value='".$row['ROOM_MODIFYDATE']."' readonly='readonly'></td><td><input type='text' name='t13' id='t13' value='".$row['ROOM_STATUS']."' readonly='readonly'></td></form></tr>";
}
echo "</table>";
}
?>  
</body>
</html>