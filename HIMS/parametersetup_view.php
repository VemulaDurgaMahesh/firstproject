<?php include('menu.php'); ?>
<html>
<style>
    .act { color:#F00; }
    .act1 {color:#2E2EFE;} 
</style>
<body>
<form action="" method="post">
<p>
	<ul class="drop_menu">
               <li>
              <a href="parametersetup_search.php">
                Search
              </a>
              </li>
                <li><a href="parametersetup_view.php">View</a></li>
                <li>
                    <a> <button name="export_excel" formaction="parametersetup_excel.php" >Export</button></a>
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
  $servername = "localhost";
$username = "root";
$password = "";
$dbname = "hospital";


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
 $appdate=$_POST['fromdate'];  
     $appdate1=$_POST['todate']; 
$str="SELECT * from parameter_master WHERE createdate between '$appdate' and '$appdate1'";
$result=$conn->query($str);
       if($result->num_rows > 0)
       {
       echo "<table border='1' class='act'>";
  echo "<tr><td>EDIT</t><td>LabGroup</td><td>Lab Group Code</td><td>ParameterCode</td><td>ParameterName</td><td>ParameterMethod</td><td>ParaMeterShortName</td><td>Parameter Text Size</td><td>Parameter Text Display</td><td>Accreditaion Needed</td><td>New Organism Interface</td><td>AntiBiotics</td><td>Units Only</td><td>Description Only</td><td>Normal Ranges</td><td>Critical ranges</td><td>Default Ranges</td><td>Gender</td><td>Min Age</td><td>UOM1</td><td>Max Age</td><td>UOM2</td><td>Description</td><td>Symbol</td><td>Min Range</td><td>Max Range</td><td>Units Normal Range</td><td>Min Critical</td><td>Max Critical</td><td>Min Default</td><td>Max Default</td><td>CreatedBy</td><td>CraetedDate</td><td>MoodifyBy</td><td>ModifiedDate</td></tr>";
    while($row = $result->fetch_assoc()) {
  echo "<tr><form action='parametersetup_edit.php' method='get'><td><input type='submit' name='edit' value='edit'></td><td><input type='text' name='t1' id='t1' value='".$row['p_labgroupname']."' readonly='readonly'></td><td><input type='text' name='t2' id='t2' value='".$row['p_labgroupcode']."' readonly='readonly'></td><td><input name='t3' id='t3' value='".$row['p_pcode']."' readonly='readonly'></td><td><input type='text' name='t4' id='t4' value='".$row['p_pname']."' readonly='readonly'></td><td><input type='text' name='t5' id='t5' value='".$row['p_method']."' readonly='readonly'></td><td><input type='text' name='t6' id='t6' value='".$row['p_shortname']."' readonly='readonly'></td><td><input type='text' name='t7' id='t7' value='".$row['p_textsize']."' readonly='readonly'></td><td><input type='text' name='t8' id='t8' value='".$row['p_pdisplay']."' readonly='readonly'></td><td><input type='text' name='t9' id='t9' value='".$row['p_acrneed']."' readonly='readonly'></td><td><input type='text' name='t10' id='t10' value='".$row['p_neworgint']."' readonly='readonly'></td><td><input type='text' name='t11' id='t11' value='".$row['p_antibiotics']."' readonly='readonly'></td><td><input type='text' name='t12' id='t12' value='".$row['p_unitsonly']."' readonly='readonly'></td><td><input type='text' name='t13' id='t13' value='".$row['p_descriponly']."' readonly='readonly'></td><td><input type='text' name='t14' id='t14' value='".$row['p_normalranges']."' readonly='readonly'></td><td><input type='text' name='t15' id='t15' value='".$row['p_criticalranges']."' readonly='readonly'></td><td><input type='text' name='t16' id='t16' value='".$row['p_defaultranges']."' readonly='readonly'></td><td><input type='text' name='g' id='g' value='".$row['p_gender']."' readonly='readonly'></td><td><input type='text' name='t17' id='t17' value='".$row['p_minage']."' readonly='readonly'></td><td><input type='text' name='t18' id='t18' value='".$row['p_uom1']."' readonly='readonly'></td><td><input type='text' name='t19' id='t19' value='".$row['p_maxage']."' readonly='readonly'></td><td><input type='text' name='t20' id='t20' value='".$row['p_uom2']."' readonly='readonly'></td><td><input type='text' name='t21' id='t21' value='".$row['p_desc']."' readonly='readonly'></td><td><input type='text' name='t22' id='t22' value='".$row['p_symb']."' readonly='readonly'></td><td><input type='text' name='t23' id='t23' value='".$row['p_minrange']."' readonly='readonly'></td><td><input type='text' name='t24' id='t24' value='".$row['p_maxrange']."' readonly='readonly'></td><td><input type='text' name='t25' id='t25' value='".$row['p_unitsnormalrange']."' readonly='readonly'></td><td><input type='text' name='t26' id='t26' value='".$row['p_mincritical']."' readonly='readonly'></td><td><input type='text' name='t27' id='t27' value='".$row['p_maxcritical']."' readonly='readonly'></td><td><input type='text' name='t28' id='t28' value='".$row['p_mindefault']."' readonly='readonly'></td><td><input type='text' name='t29' id='t29' value='".$row['p_maxdefault']."' readonly='readonly'></td><td><input type='text' name='t30' id='t30' value='".$row['createdby']."' readonly='readonly'></td><td><input type='text' name='31' id='31' value='".$row['createdate']."' readonly='readonly'></td><td><input type='text' name='t32' id='t32' value='".$row['modifyby']."' readonly='readonly'></td><td><input type='text' name='t33' id='t33' value='".$row['modifydate']."' readonly='readonly'></td></form></tr>";
}
echo "</table>"; 
}
  else
  {
    ?>
        <script>alert('No data Found');window.location.href='parametersetup_view.php';</script>
        <?php
  }
  
}
else
{
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hospital";


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$str="select * from parameter_master";
$result=$conn->query($str);
echo "<table border='1' class='act'>";
	echo "<tr><td>EDIT</t><td>LabGroup</td><td>Lab Group Code</td><td>ParameterCode</td><td>ParameterName</td><td>ParameterMethod</td><td>ParaMeterShortName</td><td>Parameter Text Size</td><td>Parameter Text Display</td><td>Accreditaion Needed</td><td>New Organism Interface</td><td>AntiBiotics</td><td>Units Only</td><td>Description Only</td><td>Normal Ranges</td><td>Critical ranges</td><td>Default Ranges</td><td>Gender</td><td>Min Age</td><td>UOM1</td><td>Max Age</td><td>UOM2</td><td>Description</td><td>Symbol</td><td>Min Range</td><td>Max Range</td><td>Units Normal Range</td><td>Min Critical</td><td>Max Critical</td><td>Min Default</td><td>Max Default</td><td>CreatedBy</td><td>CraetedDate</td><td>MoodifyBy</td><td>ModifiedDate</td></tr>";
    while($row = $result->fetch_assoc()) {
	echo "<tr><form action='parametersetup_edit.php' method='get'><td><input type='submit' name='edit' value='edit'></td><td><input type='text' name='t1' id='t1' value='".$row['p_labgroupname']."' readonly='readonly'></td><td><input type='text' name='t2' id='t2' value='".$row['p_labgroupcode']."' readonly='readonly'></td><td><input name='t3' id='t3' value='".$row['p_pcode']."' readonly='readonly'></td><td><input type='text' name='t4' id='t4' value='".$row['p_pname']."' readonly='readonly'></td><td><input type='text' name='t5' id='t5' value='".$row['p_method']."' readonly='readonly'></td><td><input type='text' name='t6' id='t6' value='".$row['p_shortname']."' readonly='readonly'></td><td><input type='text' name='t7' id='t7' value='".$row['p_textsize']."' readonly='readonly'></td><td><input type='text' name='t8' id='t8' value='".$row['p_pdisplay']."' readonly='readonly'></td><td><input type='text' name='t9' id='t9' value='".$row['p_acrneed']."' readonly='readonly'></td><td><input type='text' name='t10' id='t10' value='".$row['p_neworgint']."' readonly='readonly'></td><td><input type='text' name='t11' id='t11' value='".$row['p_antibiotics']."' readonly='readonly'></td><td><input type='text' name='t12' id='t12' value='".$row['p_unitsonly']."' readonly='readonly'></td><td><input type='text' name='t13' id='t13' value='".$row['p_descriponly']."' readonly='readonly'></td><td><input type='text' name='t14' id='t14' value='".$row['p_normalranges']."' readonly='readonly'></td><td><input type='text' name='t15' id='t15' value='".$row['p_criticalranges']."' readonly='readonly'></td><td><input type='text' name='t16' id='t16' value='".$row['p_defaultranges']."' readonly='readonly'></td><td><input type='text' name='g' id='g' value='".$row['p_gender']."' readonly='readonly'></td><td><input type='text' name='t17' id='t17' value='".$row['p_minage']."' readonly='readonly'></td><td><input type='text' name='t18' id='t18' value='".$row['p_uom1']."' readonly='readonly'></td><td><input type='text' name='t19' id='t19' value='".$row['p_maxage']."' readonly='readonly'></td><td><input type='text' name='t20' id='t20' value='".$row['p_uom2']."' readonly='readonly'></td><td><input type='text' name='t21' id='t21' value='".$row['p_desc']."' readonly='readonly'></td><td><input type='text' name='t22' id='t22' value='".$row['p_symb']."' readonly='readonly'></td><td><input type='text' name='t23' id='t23' value='".$row['p_minrange']."' readonly='readonly'></td><td><input type='text' name='t24' id='t24' value='".$row['p_maxrange']."' readonly='readonly'></td><td><input type='text' name='t25' id='t25' value='".$row['p_unitsnormalrange']."' readonly='readonly'></td><td><input type='text' name='t26' id='t26' value='".$row['p_mincritical']."' readonly='readonly'></td><td><input type='text' name='t27' id='t27' value='".$row['p_maxcritical']."' readonly='readonly'></td><td><input type='text' name='t28' id='t28' value='".$row['p_mindefault']."' readonly='readonly'></td><td><input type='text' name='t29' id='t29' value='".$row['p_maxdefault']."' readonly='readonly'></td><td><input type='text' name='t30' id='t30' value='".$row['createdby']."' readonly='readonly'></td><td><input type='text' name='31' id='31' value='".$row['createdate']."' readonly='readonly'></td><td><input type='text' name='t32' id='t32' value='".$row['modifyby']."' readonly='readonly'></td><td><input type='text' name='t33' id='t33' value='".$row['modifydate']."' readonly='readonly'></td></form></tr>";
}
echo "</table>";
}
?>  
</body>
</html>