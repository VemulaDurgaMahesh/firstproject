<?php include('menu.php'); ?>
<html>
<style>
    .act { color:#F00; } 
</style>
<body>
<p>
		<div>
<ul class="drop_menu">
               <li>
              <a href="emptable_search.php">
                Search
              </a>
              </li>
                <li><a href="emptable.php">View</a></li>               
				  </ul>
				  </div>
</p>
<?php 
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
$str="select * from employee where emp_ename like'%".$_GET['t6']."%' ";
$result=$conn->query($str);
echo "<table border='1' class='act'>";
	echo "<tr>
<td>EDIT</td>
<td>EMPLOYEE CATEGORY</td>
<td>EMPLOYEE DATE OF BIRTH</td>
<td>EMPLOYEE DATE OF JOINING</td>
<td>EMPLOYEE WEEK OF DAY</td>
<td>EMPLOYEE SHIFT</td>
<td>EMPLOYEE NAME</td>
<td>EMPLOYEE CODE</td>
<td>EMPLOYEE TYPE</td>
<td>EMPLOYEE GENDER</td>
<td>EMPLOYEE QUALIFICATION</td>
<td>EMPLOYEE CARE OF</td>
<td>EMPLOYEE DEPARTMENT</td>
<td>EMPLOYEE DESIGNATION </td>
<td>EMPLOYEE PF NUMBER</td>
<td>EMPLOYEE LEDGER NUMBER</td>
<td>EMPLOYEE PAYMENT MODE</td>
<td>EMPLOYEE ACCOUNT NUMBER</td>
<td>EMPLOYEE STATUS</td>
<td>EMPLOYEE PERMANENT DATE</td>
<td>EMPLOYEE RESIGNED DATE</td>
<td>EMPLOYEE BLOOD GROUP</td>
<td>EMPLOYEE DEDUCTIONS </td>
<td>EMPLOYEE REGISTRATION NUMBER</td>
<td>EMPLOYEE PAN NUMBER</td>
<td>EMPLOYEE ADDRESS</td>
<td>EMPLOYEE CITY</td>
<td>EMPLOYEE STATE</td>
<td>EMPLOYEE COUNTRY</td>
<td>EMPLOYEE PINCODE NUMBER</td>
<td>EMPLOYEE MOBILE NUMBER</td>
<td>EMPLOYEE CONTACT PERSON</td>
<td>EMPLOYEE EMAIL ID</td>
<td>EMPLOYEE GROSS</td>
<td>EMPLOYEE BASIC</td>
<td>EMPLOYEE DA</td>
<td>EMPLOYEE HRA</td>
<td>EMPLOYEE CONVEYANCE</td>
<td>EMPLOYEE WASH</td>
<td>EMPLOYEE MEDICAL</td>
<td>EMPLOYEE CITY/INCHARGE</td>
<td>EMPLOYEE CCA</td>
<td>EMPLOYEE OTHERS/SPECIAL</td>
<td>EMPLOYEE LTA/WARD</td>
<td>EMPLOYEE PF</td>
<td>EMPLOYEE PTAX</td>
<td>EMPLOYEE PF NUMBER</td>
<td>EMPLOYEE PF EMPLOYER</td>
<td>EMPLOYEE OTHERS</td>
<td>EMPLOYEE ESI DED</td>
<td>EMPLOYEE ESI EMPLOYER</td>
<td>EMPLOYEE HOSTEL</td>
<td>EMPLOYEE TDS</td>
<td>EMPLOYEE VOLUNTARY PF</td>
<td>EMPLOYEE CREATEDBY</td>
<td>EMPLOYEE CREATEDTIME</td>
<td>EMPLOYEE MODIFIEDBY</td>

<td>EMPLOYEE MODIFIEDTIME</td>
<td>EMPLOYEE STATUS</td>

</form></tr>";
    while($row = $result->fetch_assoc()) {
	echo "<tr><form action='empmaster_edit1.php' method='get'>
<td><input type='submit' name='edit' value='edit'></td>
<td><input type='text' name='t1' id='t1' value='".$row['emp_cat']."' readonly='readonly'></td>
<td><input type='text' name='t2' id='t2' value='".$row['emp_dob']."' readonly='readonly'></td>
<td><input type='text' name='t3' id='t3' value='".$row['emp_doj']."' readonly='readonly'></td>
<td><input type='text' name='t4' id='t4' value='".$row['emp_wod']."' readonly='readonly'></td>
<td><input type='text' name='t5' id='t5' value='".$row['emp_eshift']."' readonly='readonly'></td>
<td><input type='text' name='t6' id='t6' value='".$row['emp_ename']."' readonly='readonly'></td>
<td><input type='text' name='t7' id='t7' value='".$row['emp_ecode']."' readonly='readonly'></td>
<td><input type='text' name='t8' id='t8' value='".$row['emp_etype']."' readonly='readonly'></td>
<td><input type='text' name='t9' id='t9' value='".$row['emp_gen']."' readonly='readonly'></td>
<td><input type='text' name='t10' id='t10' value='".$row['emp_quali']."' readonly='readonly'></td>
<td><input type='text' name='t11' id='t11' value='".$row['emp_care']."' readonly='readonly'></td>
<td><input type='text' name='t12' id='t12' value='".$row['emp_dept']."' readonly='readonly'></td>
<td><input type='text' name='t13' id='t13' value='".$row['emp_desig']."' readonly='readonly'></td>
<td><input type='text' name='t14' id='t14' value='".$row['emp_pfno']."' readonly='readonly'></td>
<td><input type='text' name='t15' id='t15' value='".$row['emp_legno']."' readonly='readonly'></td>
<td><input type='text' name='t16' id='t16' value='".$row['emp_pmode']."' readonly='readonly'></td>
<td><input type='text' name='t17' id='t17' value='".$row['emp_accno']."' readonly='readonly'></td>
<td><input type='text' name='t18' id='t18' value='".$row['emp_estatus']."' readonly='readonly'></td>
<td><input type='text' name='t19' id='t19' value='".$row['emp_permd']."' readonly='readonly'></td>
<td><input type='text' name='t20' id='t20' value='".$row['emp_resd']."' readonly='readonly'></td>
<td><input type='text' name='t21' id='t21' value='".$row['emp_bgroup']."' readonly='readonly'></td>
<td><input type='text' name='t22' id='t22' value='".$row['emp_deduc']."' readonly='readonly'></td>
<td><input type='text' name='t23' id='t23' value='".$row['emp_reg']."' readonly='readonly'></td>
<td><input type='text' name='t24' id='t24' value='".$row['emp_panno']."' readonly='readonly'></td>
<td><input type='text' name='t25' id='t25' value='".$row['emp_addr']."' readonly='readonly'></td>
<td><input type='text' name='t26' id='t26' value='".$row['emp_city']."' readonly='readonly'></td>
<td><input type='text' name='t27' id='t27' value='".$row['emp_state']."' readonly='readonly'></td>
<td><input type='text' name='t28' id='t28' value='".$row['emp_country']."' readonly='readonly'></td>
<td><input type='text' name='t29' id='t29' value='".$row['emp_pin']."' readonly='readonly'></td>
<td><input type='text' name='t30' id='t30' value='".$row['emp_mob']."' readonly='readonly'></td>
<td><input type='text' name='t31' id='t31' value='".$row['emp_cperson']."' readonly='readonly'></td>
<td><input type='text' name='t32' id='t32' value='".$row['emp_email']."' readonly='readonly'></td>
<td><input type='text' name='t33' id='t33' value='".$row['emp_gross']."' readonly='readonly'></td>
<td><input type='text' name='t34' id='t34' value='".$row['emp_basic']."' readonly='readonly'></td>
<td><input type='text' name='t35' id='t35' value='".$row['emp_da']."' readonly='readonly'></td>
<td><input type='text' name='t36' id='t36' value='".$row['emp_hra']."' readonly='readonly'></td>
<td><input type='text' name='t37' id='t37' value='".$row['emp_con']."' readonly='readonly'></td>
<td><input type='text' name='t38' id='t38' value='".$row['emp_wash']."' readonly='readonly'></td>
<td><input type='text' name='t39' id='t39' value='".$row['emp_med']."' readonly='readonly'></td>
<td><input type='text' name='t40' id='t40' value='".$row['emp_cityinc']."' readonly='readonly'></td>
<td><input type='text' name='t41' id='t41' value='".$row['emp_cca']."' readonly='readonly'></td>
<td><input type='text' name='t42' id='t42' value='".$row['emp_othspec']."' readonly='readonly'></td>
<td><input type='text' name='t43' id='t43' value='".$row['emp_lta']."' readonly='readonly'></td>
<td><input type='text' name='t44' id='t44' value='".$row['emp_pfs']."' readonly='readonly'></td>
<td><input type='text' name='t45' id='t45' value='".$row['emp_ptax']."' readonly='readonly'></td>
<td><input type='text' name='t46' id='t46' value='".$row['emp_pf']."' readonly='readonly'></td>
<td><input type='text' name='t47' id='t47' value='".$row['emp_pfe']."' readonly='readonly'></td>
<td><input type='text' name='t48' id='t48' value='".$row['emp_othe']."' readonly='readonly'></td>
<td><input type='text' name='t49' id='t49' value='".$row['emp_esided']."' readonly='readonly'></td>
<td><input type='text' name='t50' id='t50' value='".$row['emp_esiemp']."' readonly='readonly'></td>
<td><input type='text' name='t51' id='t51' value='".$row['emp_hostel']."' readonly='readonly'></td>
<td><input type='text' name='t52' id='t52' value='".$row['emp_tds']."' readonly='readonly'></td>
<td><input type='text' name='t53' id='t53' value='".$row['emp_volun']."' readonly='readonly'></td>
<td><input type='text' name='t54' id='t54' value='".$row['emp_createdby']."' readonly='readonly'></td>
<td><input type='text' name='t55' id='t55' value='".$row['emp_createdtime']."' readonly='readonly'></td>
<td><input type='text' name='t56' id='t56' value='".$row['emp_modifiedby']."' readonly='readonly'></td>
<td><input type='text' name='t57' id='t57' value='".$row['emp_modifiedtime']."' readonly='readonly'></td>
<td><input type='text' name='t58' id='t58' value='".$row['emp_status']."' readonly='readonly'></td></form></tr>";
}
echo "</table>";
?>  
</body>
</html>
