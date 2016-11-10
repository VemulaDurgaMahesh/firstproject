<?php include('menu.php'); ?>
<html>
<style>
    .act { color:#F00; }
    .act1 {color:#2E2EFE;} 
</style>
<body>
<form action="" method="POST">
<p>
		<div>
<ul class="drop_menu">
               <li>
              <a href="orginsurance_search.php">
                Search
              </a>
              </li>
                <li><a href="orginsurancetable.php">View</a></li>
                <li> 
                <a> <button name="export_excel" formaction="orginsurance_excel.php" >Export</button></a>
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
$str="SELECT * from organisation WHERE org_createdate between '$appdate' and '$appdate1'";
$result=$conn->query($str);
       if($result->num_rows > 0)
       { 
echo "<table border='1' class='act'>";
  echo "<tr><td>EDIT</td><td>ORGANISATION ORIGIN</td><td>ORGANISATION CODE</td><td>ORGANISATION NAME</td><td>ORGANISATION CONTRACT NO</td><td>ORGANISATION CONTRACTDATE</td><td>ORGANISATION CONTRACT PERSON</td><td>ORGANISATION EFFECTFROM</td><td>ORGANISATION EFFECTTO</td><td>ORGANISATION AUTHORISEDPERSON</td><td>ORGANISATION OPORG</td><td>ORGANISATION OPEMP</td><td>ORGANISATION IPORG</td><td>ORGANISATION IPEMP</td><td>ORGANISATION CONSULTAIONNO</td><td>ORGANISATION CONSULTAIONDATES</td><td>ORGANISATION TARRIFPRIORITYFOR</td><td>ORGANISATION TARRIFPRIORITYIP</td><td>ORGANISATION TARRIFPRIORITYIPDISCOUNT</td><td>ORGANISATION TARRIFPRIORITYIPDEFAULT</td><td>ORGANISATION TARRIFPRIORITYIPDEFAULTDISCOUNT</td><td>ORGANISATION TARRIFPRIORITYOP</td><td>ORGANISATION TARRIFPRIORITYOPDISCOUNT</td><td>ORGANISATION TARRIFPRIORITYOPDEFAULT</td><td>ORGANISATION TARRIFPRIORITYOPDEFAULTDISCOUNT</td><td>ORGANISATION REMARKS</td><td>ORGANISATION SERVICEPRIORITY</td><td>ORGANISATION DEFAULTSERVICE</td><td>ORGANISATION CONSULATATIONPRIORITY</td><td>ORGANISATION CONSULATATIONDEFAULT</td><td>ORGANISATION PROFESSIONALPRIORITY</td><td>ORGANISATION PROFESSIONALDEFAULT</td><td>ORGANISATION INVESTIGATIONPRIORITY</td><td>ORGANISATION INVESTIGATIONDEFAULT</td><td>ORGANISATION PROCEDUREPRIORITY</td><td>ORGANISATION PROCEDUREDEFAULT</td><td>ORGANISATION WARDPRIORITY</td><td>ORGANISATION WARDDEFAULT</td><td>ORGANISATION PHARMACYPRIORITY</td><td>ORGANISATION PHARMACYDEFAULT</td><td>ORGANISATION CREATEDBY</td><td>ORGANISATION CREATEDATE</td><td>ORGANISATION MODIFIEDBY</td><td>ORGANISATION MODIFIEDDATE</td><td>ORGANISATION STATUS</td></tr>";
    while($row = $result->fetch_assoc()) {
  echo "<tr><form action='orginsurance_edit.php' method='GET'><td><input type='submit' name='edit' value='edit'></td><td><input type='text' name='t1' id='t1' value='".$row['org_origin']."'><td><input type='text' name='t2' id='t2' value='".$row['org_orcode']."' readonly='readonly'></td><td><input name='t3' id='t3' value='".$row['org_orname']."'><td><input name='t4' id='t4' value='".$row['org_cno']."'></td><td><input name='t5' id='t5' value='".$row['org_cdate']."'></td><td><input name='t6' id='t6' value='".$row['org_cperson']."'></td><td><input name='t7' id='t7' value='".$row['org_effectf']."'></td><td><input name='t8' id='t8' value='".$row['org_effectt']."'></td><td><input name='t9' id='t9' value='".$row['org_aperson']."'></td><td><input name='t10' id='t10' value='".$row['org_oporgp']."'></td><td><input name='t11' id='t11' value='".$row['org_opempp']."'></td><td><input name='t12' id='t12' value='".$row['org_iporgp']."'></td><td><input name='t13' id='t13' value='".$row['org_ipempp']."'></td><td><input name='t14' id='t14' value='".$row['org_consulno']."'></td><td><input name='t15' id='t15' value='".$row['org_consulday']."'></td><td><input name='t16' id='t16' value='".$row['org_tarriffpriorityfor']."'></td><td><input name='t17' id='t17' value='".$row['org_tarifpri_IP']."'></td><td><input name='t18' id='t18' value='".$row['org_tarifpri_disc_IP']."'></td><td><input name='t19' id='t19' value='".$row['org_tarifdepri_IP']."'></td><td><input name='t20' id='t20' value='".$row['org_tarifdefault_disc_IP']."'></td><td><input name='t21' id='t21' value='".$row['org_tpriop']."'></td><td><input name='t22' id='t22' value='".$row['org_tpridisop']."'></td><td><input name='t23' id='t23' value='".$row['org_dtpriop']."'></td><td><input name='t24' id='t24' value='".$row['org_dtpridisop']."'></td><td><input name='t25' id='t25' value='".$row['org_remarks']."'></td><td><input name='t26' id='t26' value='".$row['org_scpri']."'></td><td><input name='t27' id='t27' value='".$row['org_defscp']."'></td><td><input name='t28' id='t28' value='".$row['org_ccpri']."'></td><td><input name='t29' id='t29' value='".$row['org_defccp']."'></td><td><input name='t30' id='t30' value='".$row['org_pcpri']."'></td><td><input name='t31' id='t31' value='".$row['org_defpcp']."'></td><td><input name='t32' id='t32' value='".$row['org_icpri']."'></td><td><input name='t33' id='t33' value='".$row['org_deficp']."'></td><td><input name='t34' id='t34' value='".$row['org_prcpri']."'></td><td><input name='t35' id='t35' value='".$row['org_defprcp']."'></td><td><input name='t36' id='t36' value='".$row['org_wcpri']."'></td><td><input name='t37' id='t37' value='".$row['org_defwcp']."'></td><td><input name='t38' id='t38' value='".$row['org_phpri']."'></td><td><input name='t39' id='t39' value='".$row['org_defphcp']."'></td><td><input name='t40' id='t40' value='".$row['org_createdby']."'></td><td><input name='t41' id='t41' value='".$row['org_createdate']."'></td><td><input name='t42' id='t42' value='".$row['org_modifyby']."'></td><td><input name='t43' id='t43' value='".$row['org_modifydate']."'></td><td><input name='t44' id='t44' value='".$row['org_status']."'></td></form></tr>";
}
echo "</table>";
}
  else
  {
    ?>
        <script>alert('No data Found');window.location.href='orginsurancetable.php';</script>
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
$str="select * from organisation";
$result=$conn->query($str);
echo "<table border='1' class='act'>";
	echo "<tr><td>EDIT</td><td>ORGANISATION ORIGIN</td><td>ORGANISATION CODE</td><td>ORGANISATION NAME</td><td>ORGANISATION CONTRACT NO</td><td>ORGANISATION CONTRACTDATE</td><td>ORGANISATION CONTRACT PERSON</td><td>ORGANISATION EFFECTFROM</td><td>ORGANISATION EFFECTTO</td><td>ORGANISATION AUTHORISEDPERSON</td><td>ORGANISATION OPORG</td><td>ORGANISATION OPEMP</td><td>ORGANISATION IPORG</td><td>ORGANISATION IPEMP</td><td>ORGANISATION CONSULTAIONNO</td><td>ORGANISATION CONSULTAIONDATES</td><td>ORGANISATION TARRIFPRIORITYFOR</td><td>ORGANISATION TARRIFPRIORITYIP</td><td>ORGANISATION TARRIFPRIORITYIPDISCOUNT</td><td>ORGANISATION TARRIFPRIORITYIPDEFAULT</td><td>ORGANISATION TARRIFPRIORITYIPDEFAULTDISCOUNT</td><td>ORGANISATION TARRIFPRIORITYOP</td><td>ORGANISATION TARRIFPRIORITYOPDISCOUNT</td><td>ORGANISATION TARRIFPRIORITYOPDEFAULT</td><td>ORGANISATION TARRIFPRIORITYOPDEFAULTDISCOUNT</td><td>ORGANISATION REMARKS</td><td>ORGANISATION SERVICEPRIORITY</td><td>ORGANISATION DEFAULTSERVICE</td><td>ORGANISATION CONSULATATIONPRIORITY</td><td>ORGANISATION CONSULATATIONDEFAULT</td><td>ORGANISATION PROFESSIONALPRIORITY</td><td>ORGANISATION PROFESSIONALDEFAULT</td><td>ORGANISATION INVESTIGATIONPRIORITY</td><td>ORGANISATION INVESTIGATIONDEFAULT</td><td>ORGANISATION PROCEDUREPRIORITY</td><td>ORGANISATION PROCEDUREDEFAULT</td><td>ORGANISATION WARDPRIORITY</td><td>ORGANISATION WARDDEFAULT</td><td>ORGANISATION PHARMACYPRIORITY</td><td>ORGANISATION PHARMACYDEFAULT</td><td>ORGANISATION CREATEDBY</td><td>ORGANISATION CREATEDATE</td><td>ORGANISATION MODIFIEDBY</td><td>ORGANISATION MODIFIEDDATE</td><td>ORGANISATION STATUS</td></tr>";
    while($row = $result->fetch_assoc()) {
	echo "<tr><form action='orginsurance_edit.php' method='GET'><td><input type='submit' name='edit' value='edit'></td><td><input type='text' name='t1' id='t1' value='".$row['org_origin']."'><td><input type='text' name='t2' id='t2' value='".$row['org_orcode']."' readonly='readonly'></td><td><input name='t3' id='t3' value='".$row['org_orname']."'><td><input name='t4' id='t4' value='".$row['org_cno']."'></td><td><input name='t5' id='t5' value='".$row['org_cdate']."'></td><td><input name='t6' id='t6' value='".$row['org_cperson']."'></td><td><input name='t7' id='t7' value='".$row['org_effectf']."'></td><td><input name='t8' id='t8' value='".$row['org_effectt']."'></td><td><input name='t9' id='t9' value='".$row['org_aperson']."'></td><td><input name='t10' id='t10' value='".$row['org_oporgp']."'></td><td><input name='t11' id='t11' value='".$row['org_opempp']."'></td><td><input name='t12' id='t12' value='".$row['org_iporgp']."'></td><td><input name='t13' id='t13' value='".$row['org_ipempp']."'></td><td><input name='t14' id='t14' value='".$row['org_consulno']."'></td><td><input name='t15' id='t15' value='".$row['org_consulday']."'></td><td><input name='t16' id='t16' value='".$row['org_tarriffpriorityfor']."'></td><td><input name='t17' id='t17' value='".$row['org_tarifpri_IP']."'></td><td><input name='t18' id='t18' value='".$row['org_tarifpri_disc_IP']."'></td><td><input name='t19' id='t19' value='".$row['org_tarifdepri_IP']."'></td><td><input name='t20' id='t20' value='".$row['org_tarifdefault_disc_IP']."'></td><td><input name='t21' id='t21' value='".$row['org_tpriop']."'></td><td><input name='t22' id='t22' value='".$row['org_tpridisop']."'></td><td><input name='t23' id='t23' value='".$row['org_dtpriop']."'></td><td><input name='t24' id='t24' value='".$row['org_dtpridisop']."'></td><td><input name='t25' id='t25' value='".$row['org_remarks']."'></td><td><input name='t26' id='t26' value='".$row['org_scpri']."'></td><td><input name='t27' id='t27' value='".$row['org_defscp']."'></td><td><input name='t28' id='t28' value='".$row['org_ccpri']."'></td><td><input name='t29' id='t29' value='".$row['org_defccp']."'></td><td><input name='t30' id='t30' value='".$row['org_pcpri']."'></td><td><input name='t31' id='t31' value='".$row['org_defpcp']."'></td><td><input name='t32' id='t32' value='".$row['org_icpri']."'></td><td><input name='t33' id='t33' value='".$row['org_deficp']."'></td><td><input name='t34' id='t34' value='".$row['org_prcpri']."'></td><td><input name='t35' id='t35' value='".$row['org_defprcp']."'></td><td><input name='t36' id='t36' value='".$row['org_wcpri']."'></td><td><input name='t37' id='t37' value='".$row['org_defwcp']."'></td><td><input name='t38' id='t38' value='".$row['org_phpri']."'></td><td><input name='t39' id='t39' value='".$row['org_defphcp']."'></td><td><input name='t40' id='t40' value='".$row['org_createdby']."'></td><td><input name='t41' id='t41' value='".$row['org_createdate']."'></td><td><input name='t42' id='t42' value='".$row['org_modifyby']."'></td><td><input name='t43' id='t43' value='".$row['org_modifydate']."'></td><td><input name='t44' id='t44' value='".$row['org_status']."'></td></form></tr>";
}
echo "</table>";
}
?>  
</body>
</html>