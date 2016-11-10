<?php include('menu.php');
echo "<p>
    <div>
<ul class='drop_menu'>
               <li>
              <a href='surgerytemplate_search.php'>
                Search
              </a>
              </li>
                <li><a href='view_surgerytemplate.php'>View</a></li>                
          </ul>
          </div>
</p>";
 ?>
<html>
<style>
    .act { color:#F00; }
</style>
<body>
<?php 
$connect = mysql_connect ("localhost","root","") or die();
          mysql_select_db("hospital")or die(); 
      $str="SELECT * from surgery_template where st_name like '%".$_GET['t1']."%' ";
          $result=mysql_query($str);
echo "<table border=1 class='act'>";
  echo "<tr>
  <td>EDIT</td>
  <td>Template Code</td>
  <td>Template Name</td>
  <td>Surgery Code</td>
  <td>Surgery Name</td>
  <td>Surgery Procedure</td>
  <td>CREATED BY</td>
  <td>CREATED DATE</td>
  <td>MODIFIED BY</td>
  <td>MODIFIED DATE</td>
  <td>STATUS</td>
  </tr>";
     while($row = mysql_fetch_array($result)) {
      $x=$row['st_sgcode'];       
      $sgname3=mysql_query("SELECT * FROM soc_masters WHERE soc_servicecode='$x'");
      $sgname4=mysql_fetch_array($sgname3);
  echo "<tr><form action='surgerytemp_edit.php' method='get'><td>
  <input type='submit' name='edit' value='edit'></td>
  <td><input type='text' name='t7' id='t7' value='".$row['st_code']."' readonly='readonly'></td>
  <td><input type='text' name='t1' id='t1' value='".$row['st_name']."' readonly='readonly'></td>
  <td><input type='text' name='t2' id='t2' value='".$row['st_sgcode']."' readonly='readonly'></td>
  <td><input type='text' name='t9' id='t9' value='".$sgname4['soc_servicename']."'readonly='readonly'></td>
  <td><input type='text' name='t10' id='t10' value='".$row['st_procedure']."' readonly='readonly'></td>
  <td><input type='text' name='t3' id='t3' value='".$row['st_createdby']."' readonly='readonly'></td>
  <td><input type='text' name='t4' id='t4' value='".$row['st_createddate']."' readonly='readonly'></td>
  <td><input type='text' name='t6' id='t6' value='".$row['st_modifyby']."' readonly='readonly'></td>
  <td><input type='text' name='t8' id='t8' value='".$row['st_modifydate']."' readonly='readonly'></td>
  <td><input type='text' name='t5' id='t5' value='".$row['st_status']."' readonly='readonly'></td></form></tr>";
}
echo "</table>";
?>  
</body>
</html>
