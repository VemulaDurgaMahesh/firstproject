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
              <a href="categorymaster_search.php">
                Search
              </a>
              </li>
                <li><a href="categorymastertable.php">View</a></li>
                <li>                
              <a> <button name="export_excel" formaction="category_excel.php" >Export</button></a>
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
<?php 

if(isset($_POST['submit']))
{
  $connect = mysql_connect ("localhost","root","") or die();
       mysql_select_db("hospital")or die(); 
       $appdate=$_POST['fromdate'];  
     $appdate1=$_POST['todate'];                                           
 $str="SELECT * from category_master WHERE cat_createddate between '$appdate' and '$appdate1'";
       $result=mysql_query($str);
       if(mysql_num_rows($result) > 0)
       {
echo "<table border=1 class='act'>";
  echo "<tr><td>EDIT</td><td>CATEGORY CODE</td><td>CATEGORY NAME</td><td>CATEGORY WOD</td><td>CATEGORY STATUS</td><td>CATEGORY CREATED BY</td><td>CATEGORY CREATED DATE</td><td>CATEGORY MODIFIED BY</td><td>CATEGORY MODIFIED DATE</td></form></tr>";
     while($row = mysql_fetch_array($result)) {
  echo "<tr><form action='categorymaster_edit.php' method='GET'><td><input type='submit' name='edit' value='edit'></td><td><input type='text' name='t1' id='t1' value='".$row['cat_code']."' readonly='readonly'></td><td><input type='text' name='t2' id='t2' value='".$row['cat_name']."'></td><td><input type='text' name='t3' id='t3' value='".$row['cat_wod']."'></td><td><input type='text' name='t4' id='t4' value='".$row['cat_status']."' readonly='readonly'></td><td><input type='text' name='t5' id='t5' value='".$row['cat_createdby']."' readonly='readonly'></td><td><input type='text' name='t6' id='t6' value='".$row['cat_createddate']."' readonly='readonly'></td><td><input type='text' name='t7' id='t7' value='".$row['cat_modifiedby']."' readonly='readonly'></td><td><input type='text' name='t8' id='t8' value='".$row['cat_modifieddate']."' readonly='readonly'></td></form></tr>";
}
echo "</table>";
  }
  else
  {
    ?>
        <script>alert('No data Found');window.location.href='categorymastertable.php';</script>
        <?php
  }
  
}
else
{
  $connect = mysql_connect ("localhost","root","") or die();
  mysql_select_db("hospital")or die(); 
$str="SELECT * from category_master ";
$result=mysql_query($str);
echo "<table border=1 class='act'>";
	echo "<tr><td>EDIT</td><td>CATEGORY CODE</td><td>CATEGORY NAME</td><td>CATEGORY WOD</td><td>CATEGORY STATUS</td><td>CATEGORY CREATED BY</td><td>CATEGORY CREATED DATE</td><td>CATEGORY MODIFIED BY</td><td>CATEGORY MODIFIED DATE</td></form></tr>";
     while($row = mysql_fetch_array($result)) {
	echo "<tr><form action='categorymaster_edit.php' method='GET'><td><input type='submit' name='edit' value='edit'></td><td><input type='text' name='t1' id='t1' value='".$row['cat_code']."' readonly='readonly'></td><td><input type='text' name='t2' id='t2' value='".$row['cat_name']."'></td><td><input type='text' name='t3' id='t3' value='".$row['cat_wod']."'></td><td><input type='text' name='t4' id='t4' value='".$row['cat_status']."' readonly='readonly'></td><td><input type='text' name='t5' id='t5' value='".$row['cat_createdby']."' readonly='readonly'></td><td><input type='text' name='t6' id='t6' value='".$row['cat_createddate']."' readonly='readonly'></td><td><input type='text' name='t7' id='t7' value='".$row['cat_modifiedby']."' readonly='readonly'></td><td><input type='text' name='t8' id='t8' value='".$row['cat_modifieddate']."' readonly='readonly'></td></form></tr>";
}
echo "</table>";
}
?>  
</form>
</body>
</html>